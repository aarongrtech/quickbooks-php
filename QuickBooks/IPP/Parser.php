<?php

/**
 *
 *
 * Copyright (c) 2010 Keith Palmer / ConsoliBYTE, LLC.
 * All rights reserved. This program and the accompanying materials
 * are made available under the terms of the Eclipse Public License v1.0
 * which accompanies this distribution, and is available at
 * http://www.opensource.org/licenses/eclipse-1.0.php
 *
 * @author Keith Palmer <keith@ConsoliBYTE.com>
 *
 * @package QuickBooks
 * @subpackage IPP
 */

//
QuickBooks_Loader::load('/QuickBooks/IPP/Object.php');

//
QuickBooks_Loader::load('/QuickBooks/XML.php');

//
QuickBooks_Loader::load('/QuickBooks/XML/Parser.php');

/**
 *
 *
 */
class QuickBooks_IPP_Parser
{
    public function parseIPP($xml, $method, &$xml_errnum, &$xml_errmsg, &$err_code, &$err_desc, &$err_db)
    {
        // Massage it... *sigh*
        $xml = $this->_massageQBOXML($xml);

        //print($xml);

        $quickBooksXMLParser = new QuickBooks_XML_Parser($xml);

        // Initial to success
        $xml_errnum = QuickBooks_XML::ERROR_OK;
        $err_code = QuickBooks_IPP::ERROR_OK;

        // Try to parse the XML IDS response
        $errnum = QuickBooks_XML::ERROR_OK;
        $errmsg = null;
        if ($Doc = $quickBooksXMLParser->parse($errnum, $errmsg)) {
            $Root = $Doc->getRoot();

            //print_r($Root);

            switch ($method) {
                case QuickBooks_IPP::API_GETUSERINFO:
                    return $this->_parseIPPGetUserInfo($Root);
                case QuickBooks_IPP::API_GETUSERROLE:
                    return $this->_parseIPPGetUserRole($Root);
                case QuickBooks_IPP::API_GETENTITLEMENTVALUES:
                    return $this->_parseIPPGetEntitlementValues($Root);
                case QuickBooks_IPP::API_GETENTITLEMENTVALUESANDUSERROLE:
                    return $this->_parseIPPGetEntitlementValuesAndUserRole($Root);
                case QuickBooks_IPP::API_GETDBINFO:
                    return $this->_parseIPP_HashMap($Root);
                case QuickBooks_IPP::API_GETDBVAR:
                    return $this->_parseIPP_NodeValue($Root, 'qdbapi/value');
                case QuickBooks_IPP::API_GETIDSREALM:
                    return $this->_parseIPP_NodeValue($Root, 'qdbapi/realm');
                case QuickBooks_IPP::API_GETISREALMQBO:
                    return $this->_parseIPP_NodeValue($Root, 'qdbapi/IsQBO') == 'true';
                case QuickBooks_IPP::API_GETBASEURL:
                    return $this->_parseIPP_NodeValue($Root, 'qboQboUser/qboCurrentCompany/qboBaseURI') . '/resource';		// Oooh, that's probably bad...
            }
        }

        return false;
    }

    protected function _parseIPP_NodeValue($Root, $key)
    {
        return $Root->getChildDataAt($key);
    }

    protected function _parseIPP_HashMap($Root)
    {
        $info = [];

        foreach ($Root->children() as $Node) {
            $name = $Node->name();
            $data = $Node->data();
            if ($name == 'action') {
                continue;
            }

            if ($name == 'errcode') {
                continue;
            }

            if ($name == 'errtext') {
                continue;
            }

            $info[$name] = $data;
        }

        return $info;
    }

    protected function _parseIPPGetEntitlementValuesAndUserRole($Root)
    {
        // Parse out the metadata and entitlements
        $retr = $this->_parseIPPGetEntitlementValues($Root);

        $User = $Root->getChildAt('qdbapi/user');

        $retr[0]['userId'] = $User->getAttribute('id');
        $retr[0]['userName'] = $User->getChildDataAt('user/name');

        // Now append to that the user roles
        $Roles = $Root->getChildAt('qdbapi/user/roles');

        $list = [];
        foreach ($Roles->children() as $Node) {
            $Node2 = $Node->getChildAt('role/access');

            $list[] = new QuickBooks_IPP_Role(
                $Node->getAttribute('id'),
                $Node->getChildDataAt('role/name'),
                $Node2->getAttribute('id'),
                $Node2->data()
            );
        }

        $retr[] = $list;

        return $retr;
    }

    /**
     *
     *
     * IMPORTANT NOTE:
     * 	This code is re-used by GetEntitlementValuesAndUserRole(), so make sure
     * 	that if you change this code, you don't break anything in that method.
     *
     * @param object $Root
     * @return array
     */
    protected function _parseIPPGetEntitlementValues($Root)
    {
        $metadata = [];
        foreach ($Root->children() as $Node) {
            if (!$Node->hasChildren()) {
                $metadata[$Node->name()] = $Node->data();
            }
        }

        $list = [];
        $Entitlements = $Root->getChildAt('qdbapi/entitlements');
        foreach ($Entitlements->children() as $Node) {
            $Node2 = $Node->getChildAt('entitlement/term');

            $list[] = new QuickBooks_IPP_Entitlement(
                $Node->getAttribute('id'),
                $Node->getChildDataAt('entitlement/name'),
                $Node2->getAttribute('id'),
                $Node2->data()
            );
        }

        return [
            0 => $metadata,
            1 => $list,
            ];
    }

    protected function _parseIPPGetUserInfo($Root)
    {
        $Node = $Root->getChildAt('qdbapi/user');

        return new QuickBooks_IPP_User(
            $Node->getAttribute('id'),
            $Node->getChildDataAt('user/email'),
            $Node->getChildDataAt('user/firstName'),
            $Node->getChildDataAt('user/lastName'),
            $Node->getChildDataAt('user/login'),
            $Node->getChildDataAt('user/screenName'),
            $Node->getChildDataAt('user/isVerified'),
            $Node->getChildDataAt('user/externalAuth'),
            $Node->getChildDataAt('user/authid')
        );
    }

    protected function _parseIPPGetUserRole($Root)
    {
        $Roles = $Root->getChildAt('qdbapi/user/roles');
        $list = [];

        foreach ($Roles->children() as $Node) {
            $Node2 = $Node->getChildAt('role/access');

            $list[] = new QuickBooks_IPP_Role(
                $Node->getAttribute('id'),
                $Node->getChildDataAt('role/name'),
                $Node2->getAttribute('id'),
                $Node2->data()
            );
        }

        return $list;
    }

    protected function _massageQBOXML($xml)
    {
        if (false !== strpos($xml, '<qbo:')) {
            // BAD HACK: It's a QBO data set, we need to adjust some things
            return str_replace(
                [
                    '<qbo:',
                    '</qbo:'
                 ],
                [
                    '<qbo',
                    '</qbo'
                 ],
                $xml
            );
        }

        /*
        if ($optype == QuickBooks_IPP_IDS::OPTYPE_ADD or $optype == QuickBooks_IPP_IDS::OPTYPE_MOD)
        {
            //$xml = '<RestResponse>' . $xml . '</RestResponse>';
        }
        */

        return $xml;
    }

    public function parseIDS($xml, $optype, $flavor, $version, &$xml_errnum, &$xml_errmsg, &$err_code, &$err_desc, &$err_db)
    {
        switch ($version) {
            case QuickBooks_IPP_IDS::VERSION_2:
                return $this->_parseIDS_v2($xml, $optype, $flavor, $version, $xml_errnum, $xml_errmsg, $err_code, $err_desc, $err_db);
            case QuickBooks_IPP_IDS::VERSION_3:
                return $this->_parseIDS_v3($xml, $optype, $flavor, $version, $xml_errnum, $xml_errmsg, $err_code, $err_desc, $err_db);
        }

        return false;
    }

    protected function _parseIDS_v3($xml, $optype, $flavor, $version, &$xml_errnum, &$xml_errmsg, &$err_code, &$err_desc, &$err_db)
    {
        /*
        if ($optype == QuickBooks_IPP_IDS::OPTYPE_ENTITLEMENTS)
        {
            $xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><EntitlementsResponse><QboCompany>true</QboCompany><PlanName>QBWEBVAR1MO</PlanName><MaxUsers>3</MaxUsers><CurrentUsers>1</CurrentUsers><DaysRemainingTrial>0</DaysRemainingTrial><Entitlement id="7"><name>PayPal</name><term>Off</term></Entitlement><Entitlement id="8"><name>Merchant Service</name><term>Off</term></Entitlement><Entitlement id="50"><name>Adjusted Trial Balance Report</name><term>Off</term></Entitlement><Entitlement id="51"><name>Adjusting Journal Entries</name><term>Off</term></Entitlement><Entitlement id="52"><name>Accountant Menu</name><term>Off</term></Entitlement><Entitlement id="53"><name>Reconciliation Troubleshooting</name><term>Off</term></Entitlement><Entitlement id="54"><name>Reclassify Transactions</name><term>Off</term></Entitlement><Entitlement id="55"><name>Write Off Invoices</name><term>Off</term></Entitlement><Entitlement id="1"><name>Class Tracking</name><term>Off</term></Entitlement><Entitlement id="3"><name>Expense Tracking by Customer</name><term>Off</term></Entitlement><Entitlement id="4"><name>Time Tracking</name><term>Off</term></Entitlement><Entitlement id="5"><name>Budgets</name><term>Off</term></Entitlement><Entitlement id="6"><name>Custom Invoice Styles</name><term>On</term></Entitlement><Entitlement id="9"><name>1099 Forms for Vendors</name><term>Off</term></Entitlement><Entitlement id="10"><name>Managing Bills to Pay Later</name><term>On</term></Entitlement><Entitlement id="11"><name>Complete Set of Reports</name><term>On</term></Entitlement><Entitlement id="12"><name>Enhanced Reporting</name><term>On</term></Entitlement><Entitlement id="13"><name>Exporting to Excel</name><term>On</term></Entitlement><Entitlement id="15"><name>Delayed Charges</name><term>On</term></Entitlement><Entitlement id="16"><name>Custom Sales Fields</name><term>On</term></Entitlement><Entitlement id="17"><name>More Users -- up to 20</name><term>On</term></Entitlement><Entitlement id="19"><name>Recurring Transactions</name><term>On</term></Entitlement><Entitlement id="20"><name>Closing the Books</name><term>On</term></Entitlement><Entitlement id="21"><name>Location Tracking</name><term>Off</term></Entitlement><Entitlement id="22"><name>More Names</name><term>On</term></Entitlement><Entitlement id="25"><name>Custom Home Page</name><term>On</term></Entitlement><Entitlement id="26"><name>Do-it-yourself Payroll</name><term>Off</term></Entitlement><Entitlement id="28"><name>Online Banking</name><term>On</term></Entitlement><Entitlement id="29"><name>Basic Sales</name><term>On</term></Entitlement><Entitlement id="30"><name>Basic Banking</name><term>On</term></Entitlement><Entitlement id="31"><name>Accounting</name><term>On</term></Entitlement><Entitlement id="33"><name>Reports Only User</name><term>Off</term></Entitlement><Entitlement id="35"><name>Estimates</name><term>On</term></Entitlement><Entitlement id="41"><name>Company Snapshot</name><term>On</term></Entitlement><Entitlement id="42"><name>Purchase Order</name><term>Off</term></Entitlement><Entitlement id="43"><name>Inventory</name><term>Off</term></Entitlement><Entitlement id="44"><name>Do-it-yourself Payroll (Paycycle)</name><term>Off</term></Entitlement><Entitlement id="45"><name>Multi-Currency</name><term>On</term></Entitlement><Entitlement id="46"><name>Trends</name><term>On</term></Entitlement><Entitlement id="47"><name>Hide Employee List</name><term>Off</term></Entitlement><Entitlement id="48"><name>Simple Report List</name><term>Off</term></Entitlement><Entitlement id="49"><name>Global Tax Model</name><term>On</term></Entitlement><Entitlement id="56"><name>Text Messaging</name><term>On</term></Entitlement><Entitlement id="58"><name>Vendor Collaboration</name><term>On</term></Entitlement></EntitlementsResponse>';
        }
        */

        // Parse it
        $quickBooksXMLParser = new QuickBooks_XML_Parser($xml);

        // Initial to success
        $xml_errnum = QuickBooks_XML::ERROR_OK;
        $err_code = QuickBooks_IPP::ERROR_OK;

        // Try to parse the XML IDS response
        $errnum = QuickBooks_XML::ERROR_OK;
        $errmsg = null;

        if ($Doc = $quickBooksXMLParser->parse($errnum, $errmsg)) {
            $Root = $Doc->getRoot();

            switch ($optype) {
                case QuickBooks_IPP_IDS::OPTYPE_ENTITLEMENTS:

                    $e = [
                        '_i' => [],
                        '_e' => []
                        ];

                    $List = $Root->getChildAt('EntitlementsResponse');
                    foreach ($List->children() as $quickBooksXMLNode) {
                        if ($quickBooksXMLNode->name() == 'Entitlement') {
                            $Entitlement = new QuickBooks_IPP_Entitlement(
                                $quickBooksXMLNode->getAttribute('id'),
                                $quickBooksXMLNode->getChildDataAt('Entitlement/name'),
                                $quickBooksXMLNode->getChildDataAt('Entitlement/term')
                            );

                            $e['_e'][] = $Entitlement;
                        } else {
                            $e['_i'][$quickBooksXMLNode->name()] = $quickBooksXMLNode->data();
                        }
                    }

                    return $e;
                case QuickBooks_IPP_IDS::OPTYPE_CDC:

                    $types = [];

                    $List = $Root->getChildAt('IntuitResponse CDCResponse');
                    foreach ($List->children() as $quickBooksXMLNode) {
                        foreach ($quickBooksXMLNode->children() as $Child) {
                            $type = $Child->name();
                            if (empty($types[$type])) {
                                $types[$type] = [];
                            }

                            $class = 'QuickBooks_IPP_Object_' . $Child->name();
                            $Object = new $class();

                            foreach ($Child->children() as $Data) {
                                $this->_push($Data, $Object);
                            }

                            $types[$type][] = $Object;
                        }
                    }

                    return $types;
                case QuickBooks_IPP_IDS::OPTYPE_ADD:
                case QuickBooks_IPP_IDS::OPTYPE_SEND:	// Parse a SEND type response
                    return QuickBooks_IPP_IDS::buildIDType('', QuickBooks_XML::extractTagContents('Id', $xml));
                case QuickBooks_IPP_IDS::OPTYPE_MOD:
                    return true;		// If we got this far, it was a success
                case QuickBooks_IPP_IDS::OPTYPE_QUERY:

                    $list = [];

                    $List = $Root->getChildAt('IntuitResponse QueryResponse');

                    $attrs = $List->attributes();

                    if (!array_key_exists('startPosition', $attrs) && array_key_exists('totalCount', $attrs)) {
                        return $attrs['totalCount'];
                    }

                    foreach ($List->children() as $Child) {
                        $class = 'QuickBooks_IPP_Object_' . $Child->name();
                        $Object = new $class();

                        foreach ($Child->children() as $Data) {
                            $this->_push($Data, $Object);
                        }

                        $list[] = $Object;
                    }

                    return $list;
            }
        } else {
            $xml_errnum = $errnum;
            $xml_errmsg = $errmsg;

            return false;
        }

        return null;
    }

    protected function _parseIDS_v2($xml, $optype, $flavor, $version, &$xml_errnum, &$xml_errmsg, &$err_code, &$err_desc, &$err_db)
    {
        // Massage it... *sigh*
        $xml = $this->_massageQBOXML($xml, $optype);

        // Parse it
        $quickBooksXMLParser = new QuickBooks_XML_Parser($xml);

        // Initial to success
        $xml_errnum = QuickBooks_XML::ERROR_OK;
        $err_code = QuickBooks_IPP::ERROR_OK;

        // Try to parse the XML IDS response
        $errnum = QuickBooks_XML::ERROR_OK;
        $errmsg = null;
        if ($Doc = $quickBooksXMLParser->parse($errnum, $errmsg)) {
            $Root = $Doc->getRoot();
            $List = current($Root->children());

            switch ($optype) {
                case QuickBooks_IPP_IDS::OPTYPE_REPORT:		// Parse a REPORT type response

                    $quickBooksIPPObjectReport = new QuickBooks_IPP_Object_Report('@todo Make sure we show the title of the report!');

                    foreach ($List->children() as $quickBooksXMLNode) {
                        $class = 'QuickBooks_IPP_Object_' . $quickBooksXMLNode->name();
                        $Object = new $class();

                        foreach ($quickBooksXMLNode->children() as $Data) {
                            $this->_push($Data, $Object);
                        }

                        $method = 'add' . $quickBooksXMLNode->name();
                        $quickBooksIPPObjectReport->$method($Object);
                    }

                    return $quickBooksIPPObjectReport;
                case QuickBooks_IPP_IDS::OPTYPE_QUERY:		// Parse a QUERY type response
                case QuickBooks_IPP_IDS::OPTYPE_FINDBYID:

                    //print_r($List);
                    //exit;

                    //print_r($Root);
                    //exit;

                    // Stupid QuickBooks Online... *sigh*
                    if ($optype == QuickBooks_IPP_IDS::OPTYPE_FINDBYID && $flavor == QuickBooks_IPP_IDS::FLAVOR_ONLINE) { //$Root->name() == 'CompanyMetaData')
                        $List = new QuickBooks_XML_Node(__CLASS__ . '__line_' . __LINE__);
                        $List->addChild($Root);
                    }

                    //print_r($List);
                    //exit;

                    //  Normal parsing of query results
                    $list = [];
                    foreach ($List->children() as $quickBooksXMLNode) {
                        $class = 'QuickBooks_IPP_Object_' . $quickBooksXMLNode->name();
                        $Object = new $class();

                        foreach ($quickBooksXMLNode->children() as $Data) {
                            $this->_push($Data, $Object);
                        }

                        $list[] = $Object;
                    }
                    
                    return $list;
                case QuickBooks_IPP_IDS::OPTYPE_ADD:	// Parse an ADD type response
                case QuickBooks_IPP_IDS::OPTYPE_MOD:

                    //print("\n\n\n" . 'response was: ' . $List->name() . "\n\n\n");

                    //print_r('list name [' . $List->name() . ']');

                    switch ($List->name()) {
                        case 'Id':		// This is what QuickBooks Online, IDS v2 does

                            return QuickBooks_IPP_IDS::buildIDType($List->getAttribute('idDomain'), $List->data());
                        case 'Error':

                            $err_code = $List->getChildDataAt('Error ErrorCode');
                            $err_desc = $List->getChildDataAt('Error ErrorDesc');
                            $err_db = $List->getChildDataAt('Error DBErrorCode');

                            return false;
                        case 'Success':

                            $checks = [
                                'Success PartyRoleRef Id', 	// QuickBooks desktop, IDS v2
                                'Success PartyRoleRef PartyReferenceId', 	// QuickBooks desktop, IDS v2
                                'Success ObjectRef Id',   	// QuickBooks desktop, IDS v2
                                ];

                            foreach ($checks as $check) {
                                $IDNode = $List->getChildAt($check);

                                if ($IDNode) {
                                    return QuickBooks_IPP_IDS::buildIDType($IDNode->getAttribute('idDomain'), $IDNode->data());
                                }
                            }

                            $err_code = QuickBooks_IPP::ERROR_INTERNAL;
                            $err_desc = 'Could not locate unique ID in response: ' . $xml;
                            $err_db = '';

                            return false;
                        default:

                            // This should never happen unless Keith neglected
                            //	to implement some part of the IPP/IDS spec
                            $err_code = QuickBooks_IPP::ERROR_INTERNAL;
                            $err_desc = 'The parseIDS() method could not understand node [' . $List->name() . '] in response: ' . $xml;
                            $err_db = null;

                            return false;
                    }
                default:

                    $err_code = QuickBooks_IPP::ERROR_INTERNAL;
                    $err_desc = 'The parseIDS() method could not understand the specified optype: [' . $optype . ']';
                    $err_db = null;

                    return false;
            }
        } else {
            $xml_errnum = $errnum;
            $xml_errmsg = $errmsg;

            return false;
        }
    }

    protected function _push($Node, $Object)
    {
        $name = $Node->name();
        $data = $Node->data();

        if (substr($name, -2, 2) === 'Id' || $name == 'ExternalKey' || substr($name, -3, 3) === 'Ref') {
            $data = QuickBooks_IPP_IDS::buildIDType($Node->getAttribute('idDomain'), $data);
        }

        $adds = [
            ];

        if ($Node->hasChildren()) {
            $class = 'QuickBooks_IPP_Object_' . $name;
            $Subobject = new $class();

            foreach ($Node->children() as $Subnode) {
                $this->_push($Subnode, $Subobject);
            }

            $Object->{'add' . $name}($Subobject);
        } else {
            if (true || isset($adds[$name])) {
                $Object->{'add' . $name}($data);
            }

            /*else
            {
                if ($data == 'false')
                {
                    $Object->{'set' . $name}(false);
                }
                else if ($data == 'true')
                {
                    $Object->{'set' . $name}(true);
                }
                else
                {
                    $Object->{'set' . $name}($data);
                }
            }*/
        }

        if ($Node->hasAttributes()) {
            //Don't make a new object, just put it as a property of the same one
            foreach ($Node->attributes() as $attr_name => $attr_value) {
                $Object->{'add' . $name . '_' . $attr_name}($attr_value);
            }
        }
    }
}
