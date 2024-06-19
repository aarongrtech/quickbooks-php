<?php

/**
 * Schema object for: CreditMemoAddRq
 *
 * @author "Keith Palmer Jr." <Keith@ConsoliByte.com>
 * @license LICENSE.txt
 *
 * @package QuickBooks
 * @subpackage QBXML
 */

/**
 *
 */
require_once 'QuickBooks.php';

/**
 *
 */
require_once 'QuickBooks/QBXML/Schema/Object.php';

/**
 *
 */
class QuickBooks_QBXML_Schema_Object_CreditMemoAddRq extends QuickBooks_QBXML_Schema_Object
{
    protected function &_qbxmlWrapper()
    {
        static $wrapper = 'CreditMemoAdd';

        return $wrapper;
    }

    protected function &_dataTypePaths()
    {
        static $paths =  [
  'CustomerRef ListID' => 'IDTYPE',
  'CustomerRef FullName' => 'STRTYPE',
  'ClassRef ListID' => 'IDTYPE',
  'ClassRef FullName' => 'STRTYPE',
  'ARAccountRef ListID' => 'IDTYPE',
  'ARAccountRef FullName' => 'STRTYPE',
  'TemplateRef ListID' => 'IDTYPE',
  'TemplateRef FullName' => 'STRTYPE',
  'TxnDate' => 'DATETYPE',
  'RefNumber' => 'STRTYPE',
  'BillAddress Addr1' => 'STRTYPE',
  'BillAddress Addr2' => 'STRTYPE',
  'BillAddress Addr3' => 'STRTYPE',
  'BillAddress Addr4' => 'STRTYPE',
  'BillAddress Addr5' => 'STRTYPE',
  'BillAddress City' => 'STRTYPE',
  'BillAddress State' => 'STRTYPE',
  'BillAddress PostalCode' => 'STRTYPE',
  'BillAddress Country' => 'STRTYPE',
  'BillAddress Note' => 'STRTYPE',
  'ShipAddress Addr1' => 'STRTYPE',
  'ShipAddress Addr2' => 'STRTYPE',
  'ShipAddress Addr3' => 'STRTYPE',
  'ShipAddress Addr4' => 'STRTYPE',
  'ShipAddress Addr5' => 'STRTYPE',
  'ShipAddress City' => 'STRTYPE',
  'ShipAddress State' => 'STRTYPE',
  'ShipAddress PostalCode' => 'STRTYPE',
  'ShipAddress Country' => 'STRTYPE',
  'ShipAddress Note' => 'STRTYPE',
  'IsPending' => 'BOOLTYPE',
  'PONumber' => 'STRTYPE',
  'TermsRef ListID' => 'IDTYPE',
  'TermsRef FullName' => 'STRTYPE',
  'DueDate' => 'DATETYPE',
  'SalesRepRef ListID' => 'IDTYPE',
  'SalesRepRef FullName' => 'STRTYPE',
  'FOB' => 'STRTYPE',
  'ShipDate' => 'DATETYPE',
  'ShipMethodRef ListID' => 'IDTYPE',
  'ShipMethodRef FullName' => 'STRTYPE',
  'ItemSalesTaxRef ListID' => 'IDTYPE',
  'ItemSalesTaxRef FullName' => 'STRTYPE',
  'Memo' => 'STRTYPE',
  'CustomerMsgRef ListID' => 'IDTYPE',
  'CustomerMsgRef FullName' => 'STRTYPE',
  'IsToBePrinted' => 'BOOLTYPE',
  'IsToBeEmailed' => 'BOOLTYPE',
  'IsTaxIncluded' => 'BOOLTYPE',
  'CustomerSalesTaxCodeRef ListID' => 'IDTYPE',
  'CustomerSalesTaxCodeRef FullName' => 'STRTYPE',
  'Other' => 'STRTYPE',
  'CreditMemoLineAdd ItemRef ListID' => 'IDTYPE',
  'CreditMemoLineAdd ItemRef FullName' => 'STRTYPE',
  'CreditMemoLineAdd Desc' => 'STRTYPE',
  'CreditMemoLineAdd Quantity' => 'QUANTYPE',
  'CreditMemoLineAdd UnitOfMeasure' => 'STRTYPE',
  'CreditMemoLineAdd Rate' => 'PRICETYPE',
  'CreditMemoLineAdd RatePercent' => 'PERCENTTYPE',
  'CreditMemoLineAdd PriceLevelRef ListID' => 'IDTYPE',
  'CreditMemoLineAdd PriceLevelRef FullName' => 'STRTYPE',
  'CreditMemoLineAdd ClassRef ListID' => 'IDTYPE',
  'CreditMemoLineAdd ClassRef FullName' => 'STRTYPE',
  'CreditMemoLineAdd Amount' => 'AMTTYPE',
  'CreditMemoLineAdd ServiceDate' => 'DATETYPE',
  'CreditMemoLineAdd SalesTaxCodeRef ListID' => 'IDTYPE',
  'CreditMemoLineAdd SalesTaxCodeRef FullName' => 'STRTYPE',
  'CreditMemoLineAdd IsTaxable' => 'BOOLTYPE',
  'CreditMemoLineAdd OverrideItemAccountRef ListID' => 'IDTYPE',
  'CreditMemoLineAdd OverrideItemAccountRef FullName' => 'STRTYPE',
  'CreditMemoLineAdd Other1' => 'STRTYPE',
  'CreditMemoLineAdd Other2' => 'STRTYPE',
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CreditCardNumber' => 'STRTYPE',
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo ExpirationMonth' => 'INTTYPE',
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo ExpirationYear' => 'INTTYPE',
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo NameOnCard' => 'STRTYPE',
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CreditCardAddress' => 'STRTYPE',
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CreditCardPostalCode' => 'STRTYPE',
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CommercialCardCode' => 'STRTYPE',
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo TransactionMode' => 'ENUMTYPE',
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CreditCardTxnType' => 'ENUMTYPE',
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo ResultCode' => 'INTTYPE',
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo ResultMessage' => 'STRTYPE',
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo CreditCardTransID' => 'STRTYPE',
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo MerchantAccountNumber' => 'STRTYPE',
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo AuthorizationCode' => 'STRTYPE',
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo AVSStreet' => 'ENUMTYPE',
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo AVSZip' => 'ENUMTYPE',
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo CardSecurityCodeMatch' => 'ENUMTYPE',
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo ReconBatchID' => 'STRTYPE',
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo PaymentGroupingCode' => 'INTTYPE',
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo PaymentStatus' => 'ENUMTYPE',
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo TxnAuthorizationTime' => 'DATETIMETYPE',
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo TxnAuthorizationStamp' => 'INTTYPE',
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo ClientTransID' => 'STRTYPE',
  'CreditMemoLineAdd DataExt OwnerID' => 'GUIDTYPE',
  'CreditMemoLineAdd DataExt DataExtName' => 'STRTYPE',
  'CreditMemoLineAdd DataExt DataExtValue' => 'STRTYPE',
  'CreditMemoLineGroupAdd ItemGroupRef ListID' => 'IDTYPE',
  'CreditMemoLineGroupAdd ItemGroupRef FullName' => 'STRTYPE',
  'CreditMemoLineGroupAdd Desc' => 'STRTYPE',
  'CreditMemoLineGroupAdd Quantity' => 'QUANTYPE',
  'CreditMemoLineGroupAdd UnitOfMeasure' => 'STRTYPE',
  'CreditMemoLineGroupAdd ServiceDate' => 'DATETYPE',
  'CreditMemoLineGroupAdd DataExt OwnerID' => 'GUIDTYPE',
  'CreditMemoLineGroupAdd DataExt DataExtName' => 'STRTYPE',
  'CreditMemoLineGroupAdd DataExt DataExtValue' => 'STRTYPE',
  'DiscountLineAdd Amount' => 'AMTTYPE',
  'DiscountLineAdd RatePercent' => 'PERCENTTYPE',
  'DiscountLineAdd IsTaxable' => 'BOOLTYPE',
  'DiscountLineAdd AccountRef ListID' => 'IDTYPE',
  'DiscountLineAdd AccountRef FullName' => 'STRTYPE',
  'SalesTaxLineAdd Amount' => 'AMTTYPE',
  'SalesTaxLineAdd RatePercent' => 'PERCENTTYPE',
  'SalesTaxLineAdd AccountRef ListID' => 'IDTYPE',
  'SalesTaxLineAdd AccountRef FullName' => 'STRTYPE',
  'ShippingLineAdd Amount' => 'AMTTYPE',
  'ShippingLineAdd AccountRef ListID' => 'IDTYPE',
  'ShippingLineAdd AccountRef FullName' => 'STRTYPE',
  'IncludeRetElement' => 'STRTYPE',
];

        return $paths;
    }

    protected function &_maxLengthPaths()
    {
        static $paths =  [
  'CustomerRef ListID' => 0,
  'CustomerRef FullName' => 209,
  'ClassRef ListID' => 0,
  'ClassRef FullName' => 209,
  'ARAccountRef ListID' => 0,
  'ARAccountRef FullName' => 209,
  'TemplateRef ListID' => 0,
  'TemplateRef FullName' => 209,
  'TxnDate' => 0,
  'RefNumber' => 11,
  'BillAddress Addr1' => 41,
  'BillAddress Addr2' => 41,
  'BillAddress Addr3' => 41,
  'BillAddress Addr4' => 41,
  'BillAddress Addr5' => 41,
  'BillAddress City' => 31,
  'BillAddress State' => 21,
  'BillAddress PostalCode' => 13,
  'BillAddress Country' => 31,
  'BillAddress Note' => 41,
  'ShipAddress Addr1' => 41,
  'ShipAddress Addr2' => 41,
  'ShipAddress Addr3' => 41,
  'ShipAddress Addr4' => 41,
  'ShipAddress Addr5' => 41,
  'ShipAddress City' => 31,
  'ShipAddress State' => 21,
  'ShipAddress PostalCode' => 13,
  'ShipAddress Country' => 31,
  'ShipAddress Note' => 41,
  'IsPending' => 0,
  'PONumber' => 25,
  'TermsRef ListID' => 0,
  'TermsRef FullName' => 209,
  'DueDate' => 0,
  'SalesRepRef ListID' => 0,
  'SalesRepRef FullName' => 209,
  'FOB' => 13,
  'ShipDate' => 0,
  'ShipMethodRef ListID' => 0,
  'ShipMethodRef FullName' => 209,
  'ItemSalesTaxRef ListID' => 0,
  'ItemSalesTaxRef FullName' => 209,
  'Memo' => 4095,
  'CustomerMsgRef ListID' => 0,
  'CustomerMsgRef FullName' => 209,
  'IsToBePrinted' => 0,
  'IsToBeEmailed' => 0,
  'IsTaxIncluded' => 0,
  'CustomerSalesTaxCodeRef ListID' => 0,
  'CustomerSalesTaxCodeRef FullName' => 209,
  'Other' => 29,
  'CreditMemoLineAdd ItemRef ListID' => 0,
  'CreditMemoLineAdd ItemRef FullName' => 209,
  'CreditMemoLineAdd Desc' => 4095,
  'CreditMemoLineAdd Quantity' => 0,
  'CreditMemoLineAdd UnitOfMeasure' => 31,
  'CreditMemoLineAdd Rate' => 0,
  'CreditMemoLineAdd RatePercent' => 0,
  'CreditMemoLineAdd PriceLevelRef ListID' => 0,
  'CreditMemoLineAdd PriceLevelRef FullName' => 209,
  'CreditMemoLineAdd ClassRef ListID' => 0,
  'CreditMemoLineAdd ClassRef FullName' => 209,
  'CreditMemoLineAdd Amount' => 0,
  'CreditMemoLineAdd ServiceDate' => 0,
  'CreditMemoLineAdd SalesTaxCodeRef ListID' => 0,
  'CreditMemoLineAdd SalesTaxCodeRef FullName' => 209,
  'CreditMemoLineAdd IsTaxable' => 0,
  'CreditMemoLineAdd OverrideItemAccountRef ListID' => 0,
  'CreditMemoLineAdd OverrideItemAccountRef FullName' => 209,
  'CreditMemoLineAdd Other1' => 29,
  'CreditMemoLineAdd Other2' => 29,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CreditCardNumber' => 25,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo ExpirationMonth' => 0,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo ExpirationYear' => 0,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo NameOnCard' => 41,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CreditCardAddress' => 41,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CreditCardPostalCode' => 18,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CommercialCardCode' => 24,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo TransactionMode' => 0,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CreditCardTxnType' => 0,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo ResultCode' => 0,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo ResultMessage' => 60,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo CreditCardTransID' => 24,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo MerchantAccountNumber' => 32,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo AuthorizationCode' => 12,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo AVSStreet' => 0,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo AVSZip' => 0,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo CardSecurityCodeMatch' => 0,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo ReconBatchID' => 84,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo PaymentGroupingCode' => 0,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo PaymentStatus' => 0,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo TxnAuthorizationTime' => 0,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo TxnAuthorizationStamp' => 0,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo ClientTransID' => 16,
  'CreditMemoLineAdd DataExt OwnerID' => 0,
  'CreditMemoLineAdd DataExt DataExtName' => 31,
  'CreditMemoLineAdd DataExt DataExtValue' => 0,
  'CreditMemoLineGroupAdd ItemGroupRef ListID' => 0,
  'CreditMemoLineGroupAdd ItemGroupRef FullName' => 209,
  'CreditMemoLineGroupAdd Desc' => 4095,
  'CreditMemoLineGroupAdd Quantity' => 0,
  'CreditMemoLineGroupAdd UnitOfMeasure' => 31,
  'CreditMemoLineGroupAdd ServiceDate' => 0,
  'CreditMemoLineGroupAdd DataExt OwnerID' => 0,
  'CreditMemoLineGroupAdd DataExt DataExtName' => 31,
  'CreditMemoLineGroupAdd DataExt DataExtValue' => 0,
  'DiscountLineAdd Amount' => 0,
  'DiscountLineAdd RatePercent' => 0,
  'DiscountLineAdd IsTaxable' => 0,
  'DiscountLineAdd AccountRef ListID' => 0,
  'DiscountLineAdd AccountRef FullName' => 209,
  'SalesTaxLineAdd Amount' => 0,
  'SalesTaxLineAdd RatePercent' => 0,
  'SalesTaxLineAdd AccountRef ListID' => 0,
  'SalesTaxLineAdd AccountRef FullName' => 209,
  'ShippingLineAdd Amount' => 0,
  'ShippingLineAdd AccountRef ListID' => 0,
  'ShippingLineAdd AccountRef FullName' => 209,
  'IncludeRetElement' => 50,
];

        return $paths;
    }

    protected function &_isOptionalPaths()
    {
        static $paths =  [
  'CustomerRef ListID' => true,
  'CustomerRef FullName' => true,
  'ClassRef ListID' => true,
  'ClassRef FullName' => true,
  'ARAccountRef ListID' => true,
  'ARAccountRef FullName' => true,
  'TemplateRef ListID' => true,
  'TemplateRef FullName' => true,
  'TxnDate' => true,
  'RefNumber' => true,
  'BillAddress Addr1' => true,
  'BillAddress Addr2' => true,
  'BillAddress Addr3' => true,
  'BillAddress Addr4' => true,
  'BillAddress Addr5' => true,
  'BillAddress City' => true,
  'BillAddress State' => true,
  'BillAddress PostalCode' => true,
  'BillAddress Country' => true,
  'BillAddress Note' => true,
  'ShipAddress Addr1' => true,
  'ShipAddress Addr2' => true,
  'ShipAddress Addr3' => true,
  'ShipAddress Addr4' => true,
  'ShipAddress Addr5' => true,
  'ShipAddress City' => true,
  'ShipAddress State' => true,
  'ShipAddress PostalCode' => true,
  'ShipAddress Country' => true,
  'ShipAddress Note' => true,
  'IsPending' => true,
  'PONumber' => true,
  'TermsRef ListID' => true,
  'TermsRef FullName' => true,
  'DueDate' => true,
  'SalesRepRef ListID' => true,
  'SalesRepRef FullName' => true,
  'FOB' => true,
  'ShipDate' => true,
  'ShipMethodRef ListID' => true,
  'ShipMethodRef FullName' => true,
  'ItemSalesTaxRef ListID' => true,
  'ItemSalesTaxRef FullName' => true,
  'Memo' => true,
  'CustomerMsgRef ListID' => true,
  'CustomerMsgRef FullName' => true,
  'IsToBePrinted' => true,
  'IsToBeEmailed' => true,
  'IsTaxIncluded' => true,
  'CustomerSalesTaxCodeRef ListID' => true,
  'CustomerSalesTaxCodeRef FullName' => true,
  'Other' => true,
  'CreditMemoLineAdd ItemRef ListID' => true,
  'CreditMemoLineAdd ItemRef FullName' => true,
  'CreditMemoLineAdd Desc' => true,
  'CreditMemoLineAdd Quantity' => true,
  'CreditMemoLineAdd UnitOfMeasure' => true,
  'CreditMemoLineAdd Rate' => false,
  'CreditMemoLineAdd RatePercent' => false,
  'CreditMemoLineAdd PriceLevelRef ListID' => true,
  'CreditMemoLineAdd PriceLevelRef FullName' => true,
  'CreditMemoLineAdd ClassRef ListID' => true,
  'CreditMemoLineAdd ClassRef FullName' => true,
  'CreditMemoLineAdd Amount' => true,
  'CreditMemoLineAdd ServiceDate' => true,
  'CreditMemoLineAdd SalesTaxCodeRef ListID' => true,
  'CreditMemoLineAdd SalesTaxCodeRef FullName' => true,
  'CreditMemoLineAdd IsTaxable' => true,
  'CreditMemoLineAdd OverrideItemAccountRef ListID' => true,
  'CreditMemoLineAdd OverrideItemAccountRef FullName' => true,
  'CreditMemoLineAdd Other1' => true,
  'CreditMemoLineAdd Other2' => true,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CreditCardNumber' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo ExpirationMonth' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo ExpirationYear' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo NameOnCard' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CreditCardAddress' => true,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CreditCardPostalCode' => true,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CommercialCardCode' => true,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo TransactionMode' => true,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CreditCardTxnType' => true,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo ResultCode' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo ResultMessage' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo CreditCardTransID' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo MerchantAccountNumber' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo AuthorizationCode' => true,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo AVSStreet' => true,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo AVSZip' => true,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo CardSecurityCodeMatch' => true,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo ReconBatchID' => true,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo PaymentGroupingCode' => true,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo PaymentStatus' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo TxnAuthorizationTime' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo TxnAuthorizationStamp' => true,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo ClientTransID' => true,
  'CreditMemoLineAdd DataExt OwnerID' => false,
  'CreditMemoLineAdd DataExt DataExtName' => false,
  'CreditMemoLineAdd DataExt DataExtValue' => false,
  'CreditMemoLineGroupAdd ItemGroupRef ListID' => true,
  'CreditMemoLineGroupAdd ItemGroupRef FullName' => true,
  'CreditMemoLineGroupAdd Desc' => true,
  'CreditMemoLineGroupAdd Quantity' => true,
  'CreditMemoLineGroupAdd UnitOfMeasure' => true,
  'CreditMemoLineGroupAdd ServiceDate' => true,
  'CreditMemoLineGroupAdd DataExt OwnerID' => false,
  'CreditMemoLineGroupAdd DataExt DataExtName' => false,
  'CreditMemoLineGroupAdd DataExt DataExtValue' => false,
  'DiscountLineAdd Amount' => true,
  'DiscountLineAdd RatePercent' => false,
  'DiscountLineAdd IsTaxable' => true,
  'DiscountLineAdd AccountRef ListID' => true,
  'DiscountLineAdd AccountRef FullName' => true,
  'SalesTaxLineAdd Amount' => true,
  'SalesTaxLineAdd RatePercent' => false,
  'SalesTaxLineAdd AccountRef ListID' => true,
  'SalesTaxLineAdd AccountRef FullName' => true,
  'ShippingLineAdd Amount' => true,
  'ShippingLineAdd AccountRef ListID' => true,
  'ShippingLineAdd AccountRef FullName' => true,
  'IncludeRetElement' => true,
];
    }

    protected function &_sinceVersionPaths()
    {
        static $paths =  [
  'CustomerRef ListID' => 999.99,
  'CustomerRef FullName' => 999.99,
  'ClassRef ListID' => 999.99,
  'ClassRef FullName' => 999.99,
  'ARAccountRef ListID' => 999.99,
  'ARAccountRef FullName' => 999.99,
  'TemplateRef ListID' => 999.99,
  'TemplateRef FullName' => 999.99,
  'TxnDate' => 999.99,
  'RefNumber' => 999.99,
  'BillAddress Addr1' => 999.99,
  'BillAddress Addr2' => 999.99,
  'BillAddress Addr3' => 999.99,
  'BillAddress Addr4' => 2,
  'BillAddress Addr5' => 6,
  'BillAddress City' => 999.99,
  'BillAddress State' => 999.99,
  'BillAddress PostalCode' => 999.99,
  'BillAddress Country' => 999.99,
  'BillAddress Note' => 6,
  'ShipAddress Addr1' => 999.99,
  'ShipAddress Addr2' => 999.99,
  'ShipAddress Addr3' => 999.99,
  'ShipAddress Addr4' => 2,
  'ShipAddress Addr5' => 6,
  'ShipAddress City' => 999.99,
  'ShipAddress State' => 999.99,
  'ShipAddress PostalCode' => 999.99,
  'ShipAddress Country' => 999.99,
  'ShipAddress Note' => 6,
  'IsPending' => 999.99,
  'PONumber' => 999.99,
  'TermsRef ListID' => 999.99,
  'TermsRef FullName' => 999.99,
  'DueDate' => 999.99,
  'SalesRepRef ListID' => 999.99,
  'SalesRepRef FullName' => 999.99,
  'FOB' => 999.99,
  'ShipDate' => 999.99,
  'ShipMethodRef ListID' => 999.99,
  'ShipMethodRef FullName' => 999.99,
  'ItemSalesTaxRef ListID' => 999.99,
  'ItemSalesTaxRef FullName' => 999.99,
  'Memo' => 999.99,
  'CustomerMsgRef ListID' => 999.99,
  'CustomerMsgRef FullName' => 999.99,
  'IsToBePrinted' => 999.99,
  'IsToBeEmailed' => 6,
  'IsTaxIncluded' => 6,
  'CustomerSalesTaxCodeRef ListID' => 999.99,
  'CustomerSalesTaxCodeRef FullName' => 999.99,
  'Other' => 6,
  'CreditMemoLineAdd ItemRef ListID' => 999.99,
  'CreditMemoLineAdd ItemRef FullName' => 999.99,
  'CreditMemoLineAdd Desc' => 999.99,
  'CreditMemoLineAdd Quantity' => 999.99,
  'CreditMemoLineAdd UnitOfMeasure' => 7,
  'CreditMemoLineAdd Rate' => 999.99,
  'CreditMemoLineAdd RatePercent' => 999.99,
  'CreditMemoLineAdd PriceLevelRef ListID' => 999.99,
  'CreditMemoLineAdd PriceLevelRef FullName' => 999.99,
  'CreditMemoLineAdd ClassRef ListID' => 999.99,
  'CreditMemoLineAdd ClassRef FullName' => 999.99,
  'CreditMemoLineAdd Amount' => 999.99,
  'CreditMemoLineAdd ServiceDate' => 999.99,
  'CreditMemoLineAdd SalesTaxCodeRef ListID' => 999.99,
  'CreditMemoLineAdd SalesTaxCodeRef FullName' => 999.99,
  'CreditMemoLineAdd IsTaxable' => 4,
  'CreditMemoLineAdd OverrideItemAccountRef ListID' => 999.99,
  'CreditMemoLineAdd OverrideItemAccountRef FullName' => 999.99,
  'CreditMemoLineAdd Other1' => 6,
  'CreditMemoLineAdd Other2' => 6,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CreditCardNumber' => 999.99,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo ExpirationMonth' => 0,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo ExpirationYear' => 999.99,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo NameOnCard' => 999.99,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CreditCardAddress' => 999.99,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CreditCardPostalCode' => 999.99,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CommercialCardCode' => 999.99,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo TransactionMode' => 6,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CreditCardTxnType' => 7,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo ResultCode' => 999.99,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo ResultMessage' => 999.99,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo CreditCardTransID' => 999.99,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo MerchantAccountNumber' => 999.99,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo AuthorizationCode' => 999.99,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo AVSStreet' => 999.99,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo AVSZip' => 999.99,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo CardSecurityCodeMatch' => 6,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo ReconBatchID' => 999.99,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo PaymentGroupingCode' => 999.99,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo PaymentStatus' => 999.99,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo TxnAuthorizationTime' => 999.99,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo TxnAuthorizationStamp' => 999.99,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo ClientTransID' => 6,
  'CreditMemoLineAdd DataExt OwnerID' => 999.99,
  'CreditMemoLineAdd DataExt DataExtName' => 999.99,
  'CreditMemoLineAdd DataExt DataExtValue' => 999.99,
  'CreditMemoLineGroupAdd ItemGroupRef ListID' => 999.99,
  'CreditMemoLineGroupAdd ItemGroupRef FullName' => 999.99,
  'CreditMemoLineGroupAdd Desc' => 999.99,
  'CreditMemoLineGroupAdd Quantity' => 999.99,
  'CreditMemoLineGroupAdd UnitOfMeasure' => 7,
  'CreditMemoLineGroupAdd ServiceDate' => 999.99,
  'CreditMemoLineGroupAdd DataExt OwnerID' => 999.99,
  'CreditMemoLineGroupAdd DataExt DataExtName' => 999.99,
  'CreditMemoLineGroupAdd DataExt DataExtValue' => 999.99,
  'DiscountLineAdd Amount' => 999.99,
  'DiscountLineAdd RatePercent' => 999.99,
  'DiscountLineAdd IsTaxable' => 4,
  'DiscountLineAdd AccountRef ListID' => 999.99,
  'DiscountLineAdd AccountRef FullName' => 999.99,
  'SalesTaxLineAdd Amount' => 999.99,
  'SalesTaxLineAdd RatePercent' => 999.99,
  'SalesTaxLineAdd AccountRef ListID' => 999.99,
  'SalesTaxLineAdd AccountRef FullName' => 999.99,
  'ShippingLineAdd Amount' => 999.99,
  'ShippingLineAdd AccountRef ListID' => 999.99,
  'ShippingLineAdd AccountRef FullName' => 999.99,
  'IncludeRetElement' => 4,
];

        return $paths;
    }

    protected function &_isRepeatablePaths()
    {
        static $paths =  [
  'CustomerRef ListID' => false,
  'CustomerRef FullName' => false,
  'ClassRef ListID' => false,
  'ClassRef FullName' => false,
  'ARAccountRef ListID' => false,
  'ARAccountRef FullName' => false,
  'TemplateRef ListID' => false,
  'TemplateRef FullName' => false,
  'TxnDate' => false,
  'RefNumber' => false,
  'BillAddress Addr1' => false,
  'BillAddress Addr2' => false,
  'BillAddress Addr3' => false,
  'BillAddress Addr4' => false,
  'BillAddress Addr5' => false,
  'BillAddress City' => false,
  'BillAddress State' => false,
  'BillAddress PostalCode' => false,
  'BillAddress Country' => false,
  'BillAddress Note' => false,
  'ShipAddress Addr1' => false,
  'ShipAddress Addr2' => false,
  'ShipAddress Addr3' => false,
  'ShipAddress Addr4' => false,
  'ShipAddress Addr5' => false,
  'ShipAddress City' => false,
  'ShipAddress State' => false,
  'ShipAddress PostalCode' => false,
  'ShipAddress Country' => false,
  'ShipAddress Note' => false,
  'IsPending' => false,
  'PONumber' => false,
  'TermsRef ListID' => false,
  'TermsRef FullName' => false,
  'DueDate' => false,
  'SalesRepRef ListID' => false,
  'SalesRepRef FullName' => false,
  'FOB' => false,
  'ShipDate' => false,
  'ShipMethodRef ListID' => false,
  'ShipMethodRef FullName' => false,
  'ItemSalesTaxRef ListID' => false,
  'ItemSalesTaxRef FullName' => false,
  'Memo' => false,
  'CustomerMsgRef ListID' => false,
  'CustomerMsgRef FullName' => false,
  'IsToBePrinted' => false,
  'IsToBeEmailed' => false,
  'IsTaxIncluded' => false,
  'CustomerSalesTaxCodeRef ListID' => false,
  'CustomerSalesTaxCodeRef FullName' => false,
  'Other' => false,
  'CreditMemoLineAdd ItemRef ListID' => false,
  'CreditMemoLineAdd ItemRef FullName' => false,
  'CreditMemoLineAdd Desc' => false,
  'CreditMemoLineAdd Quantity' => false,
  'CreditMemoLineAdd UnitOfMeasure' => false,
  'CreditMemoLineAdd Rate' => false,
  'CreditMemoLineAdd RatePercent' => false,
  'CreditMemoLineAdd PriceLevelRef ListID' => false,
  'CreditMemoLineAdd PriceLevelRef FullName' => false,
  'CreditMemoLineAdd ClassRef ListID' => false,
  'CreditMemoLineAdd ClassRef FullName' => false,
  'CreditMemoLineAdd Amount' => false,
  'CreditMemoLineAdd ServiceDate' => false,
  'CreditMemoLineAdd SalesTaxCodeRef ListID' => false,
  'CreditMemoLineAdd SalesTaxCodeRef FullName' => false,
  'CreditMemoLineAdd IsTaxable' => false,
  'CreditMemoLineAdd OverrideItemAccountRef ListID' => false,
  'CreditMemoLineAdd OverrideItemAccountRef FullName' => false,
  'CreditMemoLineAdd Other1' => false,
  'CreditMemoLineAdd Other2' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CreditCardNumber' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo ExpirationMonth' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo ExpirationYear' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo NameOnCard' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CreditCardAddress' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CreditCardPostalCode' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CommercialCardCode' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo TransactionMode' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CreditCardTxnType' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo ResultCode' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo ResultMessage' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo CreditCardTransID' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo MerchantAccountNumber' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo AuthorizationCode' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo AVSStreet' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo AVSZip' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo CardSecurityCodeMatch' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo ReconBatchID' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo PaymentGroupingCode' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo PaymentStatus' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo TxnAuthorizationTime' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo TxnAuthorizationStamp' => false,
  'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo ClientTransID' => false,
  'CreditMemoLineAdd DataExt OwnerID' => false,
  'CreditMemoLineAdd DataExt DataExtName' => false,
  'CreditMemoLineAdd DataExt DataExtValue' => false,
  'CreditMemoLineGroupAdd ItemGroupRef ListID' => false,
  'CreditMemoLineGroupAdd ItemGroupRef FullName' => false,
  'CreditMemoLineGroupAdd Desc' => false,
  'CreditMemoLineGroupAdd Quantity' => false,
  'CreditMemoLineGroupAdd UnitOfMeasure' => false,
  'CreditMemoLineGroupAdd ServiceDate' => false,
  'CreditMemoLineGroupAdd DataExt OwnerID' => false,
  'CreditMemoLineGroupAdd DataExt DataExtName' => false,
  'CreditMemoLineGroupAdd DataExt DataExtValue' => false,
  'DiscountLineAdd Amount' => false,
  'DiscountLineAdd RatePercent' => false,
  'DiscountLineAdd IsTaxable' => false,
  'DiscountLineAdd AccountRef ListID' => false,
  'DiscountLineAdd AccountRef FullName' => false,
  'SalesTaxLineAdd Amount' => false,
  'SalesTaxLineAdd RatePercent' => false,
  'SalesTaxLineAdd AccountRef ListID' => false,
  'SalesTaxLineAdd AccountRef FullName' => false,
  'ShippingLineAdd Amount' => false,
  'ShippingLineAdd AccountRef ListID' => false,
  'ShippingLineAdd AccountRef FullName' => false,
  'IncludeRetElement' => true,
];

        return $paths;
    }

    /*
    abstract protected function &_inLocalePaths()
    {
        static $paths = array(
            'FirstName' => array( 'QBD', 'QBCA', 'QBUK', 'QBAU' ),
            'LastName' => array( 'QBD', 'QBCA', 'QBUK', 'QBAU' ),
            );

        return $paths;
    }
    */

    protected function &_reorderPathsPaths()
    {
        static $paths =  [
'CustomerRef',
'CustomerRef ListID',
'CustomerRef FullName',
'ClassRef ListID',
'ClassRef FullName',
'ARAccountRef ListID',
'ARAccountRef FullName',
'TemplateRef ListID',
'TemplateRef FullName',
'TxnDate',
'RefNumber',
'BillAddress Addr1',
'BillAddress Addr2',
'BillAddress Addr3',
'BillAddress Addr4',
'BillAddress Addr5',
'BillAddress City',
'BillAddress State',
'BillAddress PostalCode',
'BillAddress Country',
'BillAddress Note',
'ShipAddress Addr1',
'ShipAddress Addr2',
'ShipAddress Addr3',
'ShipAddress Addr4',
'ShipAddress Addr5',
'ShipAddress City',
'ShipAddress State',
'ShipAddress PostalCode',
'ShipAddress Country',
'ShipAddress Note',
'IsPending',
'PONumber',
'TermsRef ListID',
'TermsRef FullName',
'DueDate',
'SalesRepRef ListID',
'SalesRepRef FullName',
'FOB',
'ShipDate',
'ShipMethodRef ListID',
'ShipMethodRef FullName',
'ItemSalesTaxRef ListID',
'ItemSalesTaxRef FullName',
'Memo',
'CustomerMsgRef ListID',
'CustomerMsgRef FullName',
'IsToBePrinted',
'IsToBeEmailed',
'IsTaxIncluded',
'CustomerSalesTaxCodeRef ListID',
'CustomerSalesTaxCodeRef FullName',
'Other',
'CreditMemoLineAdd',
'CreditMemoLineAdd ItemRef',
'CreditMemoLineAdd ItemRef ListID',
'CreditMemoLineAdd ItemRef FullName',
'CreditMemoLineAdd Desc',
'CreditMemoLineAdd Quantity',
'CreditMemoLineAdd UnitOfMeasure',
'CreditMemoLineAdd Rate',
'CreditMemoLineAdd RatePercent',
'CreditMemoLineAdd PriceLevelRef ListID',
'CreditMemoLineAdd PriceLevelRef FullName',
'CreditMemoLineAdd ClassRef ListID',
'CreditMemoLineAdd ClassRef FullName',
'CreditMemoLineAdd Amount',
'CreditMemoLineAdd ServiceDate',
'CreditMemoLineAdd SalesTaxCodeRef ListID',
'CreditMemoLineAdd SalesTaxCodeRef FullName',
'CreditMemoLineAdd IsTaxable',
'CreditMemoLineAdd OverrideItemAccountRef ListID',
'CreditMemoLineAdd OverrideItemAccountRef FullName',
'CreditMemoLineAdd Other1',
'CreditMemoLineAdd Other2',
'CreditMemoLineAdd',
'CreditMemoLineAdd CreditCardTxnInfo',
'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo',
'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CreditCardNumber',
'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo ExpirationMonth',
'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo ExpirationYear',
'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo NameOnCard',
'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CreditCardAddress',
'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CreditCardPostalCode',
'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CommercialCardCode',
'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo TransactionMode',
'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnInputInfo CreditCardTxnType',
'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo ResultCode',
'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo ResultMessage',
'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo CreditCardTransID',
'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo MerchantAccountNumber',
'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo AuthorizationCode',
'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo AVSStreet',
'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo AVSZip',
'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo CardSecurityCodeMatch',
'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo ReconBatchID',
'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo PaymentGroupingCode',
'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo PaymentStatus',
'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo TxnAuthorizationTime',
'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo TxnAuthorizationStamp',
'CreditMemoLineAdd CreditCardTxnInfo CreditCardTxnResultInfo ClientTransID',
'CreditMemoLineAdd DataExt OwnerID',
'CreditMemoLineAdd DataExt DataExtName',
'CreditMemoLineAdd DataExt DataExtValue',
'CreditMemoLineGroupAdd ItemGroupRef ListID',
'CreditMemoLineGroupAdd ItemGroupRef FullName',
'CreditMemoLineGroupAdd Desc',
'CreditMemoLineGroupAdd Quantity',
'CreditMemoLineGroupAdd UnitOfMeasure',
'CreditMemoLineGroupAdd ServiceDate',
'CreditMemoLineGroupAdd DataExt OwnerID',
'CreditMemoLineGroupAdd DataExt DataExtName',
'CreditMemoLineGroupAdd DataExt DataExtValue',
'DiscountLineAdd Amount',
'DiscountLineAdd RatePercent',
'DiscountLineAdd IsTaxable',
'DiscountLineAdd AccountRef ListID',
'DiscountLineAdd AccountRef FullName',
'SalesTaxLineAdd Amount',
'SalesTaxLineAdd RatePercent',
'SalesTaxLineAdd AccountRef ListID',
'SalesTaxLineAdd AccountRef FullName',
'ShippingLineAdd Amount',
'ShippingLineAdd AccountRef ListID',
'ShippingLineAdd AccountRef FullName',
];

        return $paths;
    }
}
