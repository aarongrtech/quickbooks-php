<?php

/**
 * QuickBooks Payments class
 *
 * Copyright (c) {2010-04-16} {Keith Palmer / ConsoliBYTE, LLC.
 * All rights reserved. This program and the accompanying materials
 * are made available under the terms of the Eclipse Public License v1.0
 * which accompanies this distribution, and is available at
 * http://www.opensource.org/licenses/eclipse-1.0.php
 *
 * QuickBooks Merchant Service enables online stores to charge credit cards and
 * debit cards via simple HTTPS POSTs to the QuickBooks Merchant Service
 * payment gateway. This class simplifies the process and wraps it in a nice
 * OOP interface.
 *
 * @author Keith Palmer <keith@consolibyte.com>
 * @license LICENSE.txt
 *
 * @package QuickBooks
 * @subpackage MerchantAccount
 */

/**
 * Utilities class (for masking and some other misc things)
 */
QuickBooks_Loader::load('/QuickBooks/Utilities.php');

/**
 * HTTP connection class
 */
QuickBooks_Loader::load('/QuickBooks/HTTP.php');

/**
 * QuickBooks driver factory for database logging
 */
QuickBooks_Loader::load('/QuickBooks/Driver/Factory.php');

/**
 * QuickBooks credit card class
 */
QuickBooks_Loader::load('/QuickBooks/Payments/CreditCard.php');

/**
 * QuickBooks merchant service transaction class
 */
QuickBooks_Loader::load('/QuickBooks/Payments/Transaction.php');

/**
 * Token class
 */
QuickBooks_Loader::load('/QuickBooks/Payments/Token.php');

/**
 * QuickBooks Merchant Service implementation
 */
class Quickbooks_Payments
{
    public $_last_intuittid;

    /**
     * No error occurred
     * @var integer
     */
    public const OK = QUICKBOOKS_ERROR_OK;

    /**
     * No error occurred
     * @var integer
     */
    public const ERROR_OK = QUICKBOOKS_ERROR_OK;

    public const ERROR_AUTH = -2000;
    
    public const ERROR_HTTP = -2001;

    public const ERROR_DECLINE = -2002;

    public const STATUS_DECLINED = 'DECLINED';

    public const URL_CHARGE = '/quickbooks/v4/payments/charges';
    
    public const URL_TOKEN = '/quickbooks/v4/payments/tokens';
    
    //const URL_ACCOUNT = '/quickbooks/v4/customers/<id>/bank-accounts';
    public const URL_CARD = '/quickbooks/v4/customers/<id>/cards';
    
    public const URL_ECHECK = '/quickbooks/v4/payments/echecks';
    
    public const URL_REFUND = '/quickbooks/v4/payments/charges/<id>/refunds';

    public const BASE_SANDBOX = 'https://sandbox.api.intuit.com';
    
    public const BASE_PRODUCTION = 'https://api.intuit.com';

    protected $_sandbox = false;
    
    protected $_debug = false;
    
    protected $_driver;
    
    protected $_masking = false;

    protected $_oauth_consumer_key;
    
    protected $_oauth_consumer_secret;

    protected $_last_request;
    
    protected $_last_response;
    
    protected $_last_httpinfo;

    protected $_last_errnum;
    
    protected $_last_errmsg;
    
    protected $_last_errdetail;
    
    protected $_last_errtype;
    
    protected $_last_errinfolink;

    public function __construct($oauth_consumer_key, $oauth_consumer_secret, $sandbox = false, $dsn = null, $log_level = QUICKBOOKS_LOG_NORMAL)
    {
        $this->_oauth_consumer_key = $oauth_consumer_key;
        $this->_oauth_consumer_secret = $oauth_consumer_secret;

        $this->_sandbox = (bool) $sandbox;

        if ($dsn) {
            $this->_driver = QuickBooks_Driver_Factory::create($dsn, [], $log_level);
            $this->_driver->setLogLevel($log_level);
        }
    }

    protected function _getBaseURL()
    {
        if ($this->_sandbox) {
            return Quickbooks_Payments::BASE_SANDBOX;
        }

        return Quickbooks_Payments::BASE_PRODUCTION;
    }

    public function debit($Context, $Object_or_token, $amount, $description = '')
    {
        $payload = [
            'amount' => sprintf('%01.2f', $amount),
            'paymentMode' => 'WEB',
            ];
        if ($Object_or_token instanceof QuickBooks_Payments_CreditCard) {
            $this->_setError();
            return false;
        }

        if ($Object_or_token instanceof QuickBooks_Payments_BankAccount) {
            $payload['bankAccount'] = $Object_or_token->toArray();
        } elseif ($Object_or_token instanceof QuickBooks_Payments_Token) {
            // It's a token
            $payload['token'] = $Object_or_token->toString();
        }
        else {
            // It's a string token
            $payload['token'] = $Object_or_token;
        }

        //print('making request');
        //print_r($payload);

        // Sign the request
        $resp = $this->_http($Context, QuickBooks_Payments::URL_ECHECK, json_encode($payload));

        $data = json_decode($resp, true);

        if (empty($data)) {
            // If we didn't get anything back at all, it could be an HTTP
            // time-out which we will report as failure

            $this->_setError(self::ERROR_HTTP, 'Communication error while processing request.');
            return false;
        }

        if ($this->_handleError($data)) {
            return false;
        }

        return new QuickBooks_Payments_Transaction($data);
    }

    /**
     * Charge a credit card
     *
     * See also:
     * https://developer.intuit.com/docs/api/payments/charges
     *
     * @param  [type] $Context         [description]
     * @param  [type] $Object_or_token [description]
     * @param  [type] $amount          [description]
     * @param  string $currency        [description]
     * @param  string $description     [description]
     * @param  array  $context         [description]
     * @return [type]                  [description]
     */
    public function charge($Context, $Object_or_token, $amount, $currency = 'USD', $description = '', array $context = [])
    {
        $capture = true;
        return $this->_chargeOrAuth($Context, $Object_or_token, $amount, $currency, $capture, $description, $context);
    }

    /**
     * Authorize (but don't do a full charge/capture) a credit card
     *
     * See also:
     * https://developer.intuit.com/docs/api/payments/charges
     *
     * @param  [type] $Context         [description]
     * @param  [type] $Object_or_token [description]
     * @param  [type] $amount          [description]
     * @param  string $currency        [description]
     * @param  string $description     [description]
     * @param  array  $context         [description]
     * @return [type]                  [description]
     */
    public function authorize($Context, $Object_or_token, $amount, $currency = 'USD', $description = '', array $context = [])
    {
        $capture = false;
        return $this->_chargeOrAuth($Context, $Object_or_token, $amount, $currency, $capture, $description, $context);
    }

    public function _chargeOrAuth($Context, $Object_or_token, $amount, $currency, $capture, $description, array $context)
    {
        $payload = [
            'amount' => sprintf('%01.2f', $amount),
            'currency' => $currency,
            'context' => [
                'mobile' => false,
                'isEcommerce' => false,
                'recurring' => false,
                ]
            ];

        $payload['context'] = array_merge($payload['context'], $context);

        if ($Object_or_token instanceof QuickBooks_Payments_CreditCard) {
            $remove_empty_keys = true;
            $payload['card'] = $Object_or_token->toArray($remove_empty_keys);
        } elseif ($Object_or_token instanceof QuickBooks_Payments_BankAccount) {
            $this->_setError();
            return false;
        } elseif ($Object_or_token instanceof QuickBooks_Payments_Token) {
            // It's a token
            $payload['token'] = $Object_or_token->toString();
        } else {
            // It's a string card_id
            $payload['cardOnFile'] = $Object_or_token;
        }

        // Sign the request
        $resp = $this->_http($Context, QuickBooks_Payments::URL_CHARGE, json_encode($payload));

        $data = json_decode($resp, true);

        if (empty($data)) {
            // If we didn't get anything back at all, it could be an HTTP
            // time-out which we will report as failure

            $this->_setError(self::ERROR_HTTP, 'Communication error while processing request.');
            return false;
        }

        if ($this->_handleError($data)) {
            return false;
        }

        return new QuickBooks_Payments_Transaction($data);
    }

    public function tokenize($Context, $Object)
    {
        if ($Object instanceof QuickBooks_Payments_CreditCard) {
            $payload = [
                'card' => $Object->toArray()
                ];
        } elseif ($Object instanceof QuickBooks_Payments_BankAccount) {
            $payload = [
                'bankAccount' => $Object->toArray()
                ];
        } else {
            $this->_setError();
            return false;
        }

        $resp = $this->_http($Context, QuickBooks_Payments::URL_TOKEN, json_encode($payload));

        $data = json_decode($resp, true);

        if (isset($data['value'])) {
            return new QuickBooks_Payments_Token($data['value']);
        }

        // Error handling
        $this->_handleError($data);
        return false;
    }

    /**
     * Get information about a charge that was made previously
     *
     * @param  [type] $Context [description]
     * @param  [type] $id      [description]
     * @return [type]          [description]
     */
    public function getCharge($Context, $id)
    {
        $resp = $this->_http($Context, QuickBooks_Payments::URL_CHARGE . '/' . $id, null);

        $data = json_decode($resp, true);

        $ignore_declines = true;
        if ($this->_handleError($data, $ignore_declines)) {
            return false;
        }

        return new QuickBooks_Payments_Transaction($data);
    }

    /**
     * Get information about a debit that was made previously
     *
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getDebit($Context, $id)
    {
        $resp = $this->_http($Context, QuickBooks_Payments::URL_ECHECK . '/' . $id, null);

        $data = json_decode($resp, true);

        $ignore_declines = true;
        if ($this->_handleError($data, $ignore_declines)) {
            return false;
        }

        return new QuickBooks_Payments_Transaction($data);
    }

    /**
     * Refund a transaction
     *
     * @param  [type] $Context [description]
     * @param  [type] $id      [description]
     * @param  [type] $amount  [description]
     * @param  array  $context [description]
     * @return [type]          [description]
     */
    public function refund($Context, $id, $amount, $context = [])
    {
        $url = str_replace('<id>', $id, QuickBooks_Payments::URL_REFUND);

        $payload = [
            'amount' => $amount,
            'context' => [
                'mobile' => false,
                'isEcommerce' => false,
                'recurring' => false,
                ],
            ];

        $resp = $this->_http($Context, $url, json_encode($payload));

        $data = json_decode($resp, true);

        if ($this->_handleError($data)) {
            return false;
        }

        return new QuickBooks_Payments_Transaction($data);
    }

    public function getChargeRefund()
    {

    }

    public function getDebitRefund()
    {

    }

    /**
     * Store a card via the QuickBooks Payments API
     *
     * @return QuickBooks_Payments_CreditCard
     */
    public function storeCard($Context, $id, $Object)
    {
        $id = str_replace(['{', '}', '-'], '', $id);

        $url = str_replace('<id>', $id, QuickBooks_Payments::URL_CARD);

        if ($Object instanceof QuickBooks_Payments_CreditCard) {
            $payload = $Object->toArray();
        } else {
            $this->_setError();
            return false;
        }

        $resp = $this->_http($Context, $url, json_encode($payload));

        $data = json_decode($resp, true);

        if ($this->_handleError($data)) {
            return false;
        }

        return QuickBooks_Payments_CreditCard::fromArray($data);
    }

    /**
     * Store a card from a token via the QuickBooks Payments API
     *
     * @return QuickBooks_Payments_CreditCard
     */
    public function storeCardFromToken($Context, $id, $token)
    {
        $id = str_replace(['{', '}', '-'], '', $id);

        $url = str_replace('<id>', $id, QuickBooks_Payments::URL_CARD . '/createFromToken');

        $payload = [
            'value' => $token
            ];

        $resp = $this->_http($Context, $url, json_encode($payload));

        $data = json_decode($resp, true);

        if ($this->_handleError($data)) {
            return false;
        }

        return QuickBooks_Payments_CreditCard::fromArray($data);
    }

    /**
     * Get a card via the QuickBooks Payments API
     *
     * @return QuickBooks_Payments_CreditCard
     */
    public function getCard($Context, $id, $card_id)
    {
        $id = str_replace(['{', '}', '-'], '', $id);

        $url = str_replace('<id>', $id, QuickBooks_Payments::URL_CARD . '/' . $card_id);

        $resp = $this->_http($Context, $url);

        $data = json_decode($resp, true);

        if ($this->_handleError($data)) {
            return false;
        }

        return QuickBooks_Payments_CreditCard::fromArray($data);
    }

    /**
     * Get all cards associated with a customer via the
     * QuickBooks Payments API
     *
     * @return array of QuickBooks_Payments_CreditCard
     */
    public function getCards($Context, $id)
    {
        $id = str_replace(['{', '}', '-'], '', $id);

        $url = str_replace('<id>', $id, QuickBooks_Payments::URL_CARD);

        $resp = $this->_http($Context, $url, null);

        $data = json_decode($resp, true);

        if ($this->_handleError($data)) {
            return false;
        }

        $cards = [];

        foreach ($data as $card) {
            $cards[] = QuickBooks_Payments_CreditCard::fromArray($card);
        }

        return $cards;
    }

    /**
     * Delete a card via the QuickBooks Payments API
     *
     * @return boolean
     */
    public function deleteCard($Context, $id, $card_id)
    {
        $id = str_replace(['{', '}', '-'], '', $id);

        $url = str_replace('<id>', $id, QuickBooks_Payments::URL_CARD . '/' . $card_id);

        $resp = $this->_http($Context, $url, null, 'DELETE');

        $data = json_decode($resp, true);
        return !$this->_handleError($data);
    }

    /**
     * Handle an error, if set in the returned data
     *
     * @return boolean
     */
    protected function _handleError($data, $ignore_declines = false)
    {
        if (!$data) {
            // Check for 401/other errors
            $info = $this->_last_httpinfo;
            if ($info['http_code'] == QuickBooks_HTTP::HTTP_401) {
                $this->_setError($info['http_code'], 'Unauthorized.');
                return true;
            }

            if ($info['http_code'] == QuickBooks_HTTP::HTTP_404) {
                $this->_setError($info['http_code'], 'Not Found.');
                return true;
            }

            if ($info['http_code'] == QuickBooks_HTTP::HTTP_500) {
                $this->_setError($info['http_code'], 'Internal Server Error.');
                return true;
            }
        }

        if (isset($data['errors'])) {
            $err = array_merge([
                'code' => null,
                'message' => null,
                'type' => null,
                'detail' => null,
                'infoLink' => null,
                ], $data['errors'][0]);

            $this->_setError($err['code'], $err['message'], $err['type'], $err['detail'], $err['infoLink']);

            return true;
        }

        if (!$ignore_declines && (isset($data['status']) && $data['status'] == self::STATUS_DECLINED)) {
            $this->_setError(self::ERROR_DECLINE, 'This transaction was declined.');
            return true;
        }

        return false;
    }

    /**
     * Get the last raw XML response that was received
     *
     * @return string
     */
    public function lastResponse()
    {
        return $this->_last_response;
    }

    /**
     * Get the last raw XML request that was sent
     *
     * @return string
     */
    public function lastRequest()
    {
        return $this->_last_request;
    }

    /**
     * Get the last raw XML error that was returned
     *
     * @return string
     */
    public function lastError()
    {
        return $this->_last_errnum . ': ' . $this->_last_errmsg;
    }

    /**
     * Get the last raw HTTP info that was used
     *
     * @return string
     */
    public function lastHTTPInfo()
    {
        return $this->_last_httpinfo;
    }

    /**
     * Get the last "intuit_tid" HTTP header returned
     *
     * @return string
     */
    public function lastIntuitTid()
    {
        return $this->_last_intuittid;
    }

    /**
     * Set an error message
     *
     * @param integer $errnum	The error number/code
     * @param string $errmsg	The text error message
     * @param string $type
     * @param string $detail
     * @param string $infolink
     * @return void
     */
    protected function _setError($errnum, $errmsg = '', $type = null, $detail = null, $infolink = null)
    {
        $this->_last_errnum = $errnum;
        $this->_last_errmsg = $errmsg;

        $this->_last_errtype = $type;
        $this->_last_errdetail = $detail;
        $this->_last_errinfolink = $infolink;
    }

    /**
     *
     *
     *
     * @param string $message
     * @param integer $level
     * @return boolean
     */
    protected function _log($message, $level)
    {
        if ($this->_masking) {
            $message = QuickBooks_Utilities::mask($message);
        }

        if ($this->_debug) {
            print($message . QUICKBOOKS_CRLF);
        }

        if ($this->_driver) {
            // Send it to the driver to be logged
            $this->_driver->log($message, null, $level);
        }

        return true;
    }

    /**
     * Log a message
     *
     *
     */
    public function log($message, $level = QUICKBOOKS_LOG_NORMAL)
    {
        return $this->_log($message, $level);
    }

    /**
     * Perform a Quickbooks Payments operation via HTTP
     *
     * @param  $Context
     * @param  $url_path
     * @param  $raw_body
     * @param  $operation
     * @return boolean
     */
    protected function _http($Context, $url_path, $raw_body = null, $operation = null)
    {
        if ($operation !== null) {
            $method = $operation;
        } else {
            $method = 'GET';
            if ($raw_body) {
                $method = 'POST';
            }
        }

        $url = $this->_getBaseURL() . $url_path;

        $authcreds = $Context->authcreds();
        $authmode = $Context->authmode();

        $auth_str = '';
        if ($authmode == QuickBooks_IPP::AUTHMODE_OAUTHV2) {
            // Do we need to renew OAuth tokens?
            $Context->IPP()->handleRenewal();

            $authcreds = $Context->IPP()->authcreds();

            $auth_str = 'Bearer ' . $authcreds['oauth_access_token'];
        }

        $quickBooksHTTP = new QuickBooks_HTTP($url);

        $headers = [
            'Content-Type' => 'application/json',
            'Request-Id' => QuickBooks_Utilities::GUID(),
            'Authorization' => $auth_str,
            ];
        $quickBooksHTTP->setHeaders($headers);

        // Turn on debugging for the HTTP object if it's been enabled in the payment processor
        $quickBooksHTTP->useDebugMode($this->_debug);

        //
        $quickBooksHTTP->setRawBody($raw_body);

        $quickBooksHTTP->verifyHost(false);
        $quickBooksHTTP->verifyPeer(false);

        if ($method == 'POST') {
            $return = $quickBooksHTTP->POST();
        } elseif ($method == 'GET') {
            $return = $quickBooksHTTP->GET();
        } elseif ($method == 'DELETE') {
            $return = $quickBooksHTTP->DELETE();
        } else {
            $return = null;  // ERROR
        }

        $info = $quickBooksHTTP->lastInfo();
        $this->_last_httpinfo = $info;

        if ($info['http_code'] == 401) {
            // Auth tokens expired; automatically refresh and retry
            $Context->IPP()->forceRenewal();
            $authcreds = $Context->IPP()->authcreds();

            if (!empty($authcreds['oauth_access_token'])) {
                // Set the new header
                $headers['Authorization'] = 'Bearer ' . $authcreds['oauth_access_token'];
                $headers['Request-Id'] = QuickBooks_Utilities::GUID();                    // Generate a new unique Request-Id
                $quickBooksHTTP->setHeaders($headers);

                // Retry the request
                if ($method == 'POST') {
                    $return = $quickBooksHTTP->POST();
                } elseif ($method == 'GET') {
                    $return = $quickBooksHTTP->GET();
                } elseif ($method == 'DELETE') {
                    $return = $quickBooksHTTP->DELETE();
                }

                $info = $quickBooksHTTP->lastInfo();
                $this->_last_httpinfo = $info;
            }
        }

        $this->_last_request = $quickBooksHTTP->lastRequest();
        $this->_last_response = $quickBooksHTTP->lastResponse();

        //
        $this->log($quickBooksHTTP->getLog(), QUICKBOOKS_LOG_DEBUG);

        $this->_last_intuittid = '';
        $response_headers = $quickBooksHTTP->lastResponseHeaders();
        if (!empty($response_headers['intuit_tid'])) {
            $this->_last_intuittid = $response_headers['intuit_tid'];
        }

        $errnum = $quickBooksHTTP->errorNumber();
        $errmsg = $quickBooksHTTP->errorMessage();

        if ($errnum) {
            // An error occurred!
            $this->_setError(QuickBooks_Payments::ERROR_HTTP, $errnum . ': ' . $errmsg);
            return false;
        }

        if ($info['http_code'] == 401) {
            $this->_setError(QuickBooks_Payments::ERROR_AUTH, 'Payments return a 401 Unauthorized status.');
            return false;
        }

        // Everything is good, return the data!
        $this->_setError(QuickBooks_Payments::ERROR_OK, '');
        return $return;
    }
}
