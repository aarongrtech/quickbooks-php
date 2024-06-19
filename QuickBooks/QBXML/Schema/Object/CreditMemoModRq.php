<?php

/**
 * Schema object for: CreditMemoModRq
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
class QuickBooks_QBXML_Schema_Object_CreditMemoModRq extends QuickBooks_QBXML_Schema_Object
{
    protected function &_qbxmlWrapper()
    {
        static $wrapper = 'CreditMemoMod';

        return $wrapper;
    }

    protected function &_dataTypePaths()
    {
        static $paths =  [
  'TxnID' => 'IDTYPE',
  'EditSequence' => 'STRTYPE',
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
  'CreditMemoLineMod TxnLineID' => 'IDTYPE',
  'CreditMemoLineMod ItemRef ListID' => 'IDTYPE',
  'CreditMemoLineMod ItemRef FullName' => 'STRTYPE',
  'CreditMemoLineMod Desc' => 'STRTYPE',
  'CreditMemoLineMod Quantity' => 'QUANTYPE',
  'CreditMemoLineMod UnitOfMeasure' => 'STRTYPE',
  'CreditMemoLineMod OverrideUOMSetRef ListID' => 'IDTYPE',
  'CreditMemoLineMod OverrideUOMSetRef FullName' => 'STRTYPE',
  'CreditMemoLineMod Rate' => 'PRICETYPE',
  'CreditMemoLineMod RatePercent' => 'PERCENTTYPE',
  'CreditMemoLineMod PriceLevelRef ListID' => 'IDTYPE',
  'CreditMemoLineMod PriceLevelRef FullName' => 'STRTYPE',
  'CreditMemoLineMod ClassRef ListID' => 'IDTYPE',
  'CreditMemoLineMod ClassRef FullName' => 'STRTYPE',
  'CreditMemoLineMod Amount' => 'AMTTYPE',
  'CreditMemoLineMod ServiceDate' => 'DATETYPE',
  'CreditMemoLineMod SalesTaxCodeRef ListID' => 'IDTYPE',
  'CreditMemoLineMod SalesTaxCodeRef FullName' => 'STRTYPE',
  'CreditMemoLineMod OverrideItemAccountRef ListID' => 'IDTYPE',
  'CreditMemoLineMod OverrideItemAccountRef FullName' => 'STRTYPE',
  'CreditMemoLineMod Other1' => 'STRTYPE',
  'CreditMemoLineMod Other2' => 'STRTYPE',
  'CreditMemoLineGroupMod TxnLineID' => 'IDTYPE',
  'CreditMemoLineGroupMod ItemGroupRef ListID' => 'IDTYPE',
  'CreditMemoLineGroupMod ItemGroupRef FullName' => 'STRTYPE',
  'CreditMemoLineGroupMod Quantity' => 'QUANTYPE',
  'CreditMemoLineGroupMod UnitOfMeasure' => 'STRTYPE',
  'CreditMemoLineGroupMod OverrideUOMSetRef ListID' => 'IDTYPE',
  'CreditMemoLineGroupMod OverrideUOMSetRef FullName' => 'STRTYPE',
  'CreditMemoLineGroupMod CreditMemoLineMod TxnLineID' => 'IDTYPE',
  'CreditMemoLineGroupMod CreditMemoLineMod ItemRef ListID' => 'IDTYPE',
  'CreditMemoLineGroupMod CreditMemoLineMod ItemRef FullName' => 'STRTYPE',
  'CreditMemoLineGroupMod CreditMemoLineMod Desc' => 'STRTYPE',
  'CreditMemoLineGroupMod CreditMemoLineMod Quantity' => 'QUANTYPE',
  'CreditMemoLineGroupMod CreditMemoLineMod UnitOfMeasure' => 'STRTYPE',
  'CreditMemoLineGroupMod CreditMemoLineMod OverrideUOMSetRef ListID' => 'IDTYPE',
  'CreditMemoLineGroupMod CreditMemoLineMod OverrideUOMSetRef FullName' => 'STRTYPE',
  'CreditMemoLineGroupMod CreditMemoLineMod Rate' => 'PRICETYPE',
  'CreditMemoLineGroupMod CreditMemoLineMod RatePercent' => 'PERCENTTYPE',
  'CreditMemoLineGroupMod CreditMemoLineMod PriceLevelRef ListID' => 'IDTYPE',
  'CreditMemoLineGroupMod CreditMemoLineMod PriceLevelRef FullName' => 'STRTYPE',
  'CreditMemoLineGroupMod CreditMemoLineMod ClassRef ListID' => 'IDTYPE',
  'CreditMemoLineGroupMod CreditMemoLineMod ClassRef FullName' => 'STRTYPE',
  'CreditMemoLineGroupMod CreditMemoLineMod Amount' => 'AMTTYPE',
  'CreditMemoLineGroupMod CreditMemoLineMod ServiceDate' => 'DATETYPE',
  'CreditMemoLineGroupMod CreditMemoLineMod SalesTaxCodeRef ListID' => 'IDTYPE',
  'CreditMemoLineGroupMod CreditMemoLineMod SalesTaxCodeRef FullName' => 'STRTYPE',
  'CreditMemoLineGroupMod CreditMemoLineMod OverrideItemAccountRef ListID' => 'IDTYPE',
  'CreditMemoLineGroupMod CreditMemoLineMod OverrideItemAccountRef FullName' => 'STRTYPE',
  'CreditMemoLineGroupMod CreditMemoLineMod Other1' => 'STRTYPE',
  'CreditMemoLineGroupMod CreditMemoLineMod Other2' => 'STRTYPE',
  'IncludeRetElement' => 'STRTYPE',
];

        return $paths;
    }

    protected function &_maxLengthPaths()
    {
        static $paths =  [
  'TxnID' => 0,
  'EditSequence' => 16,
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
  'CreditMemoLineMod TxnLineID' => 0,
  'CreditMemoLineMod ItemRef ListID' => 0,
  'CreditMemoLineMod ItemRef FullName' => 209,
  'CreditMemoLineMod Desc' => 4095,
  'CreditMemoLineMod Quantity' => 0,
  'CreditMemoLineMod UnitOfMeasure' => 31,
  'CreditMemoLineMod OverrideUOMSetRef ListID' => 0,
  'CreditMemoLineMod OverrideUOMSetRef FullName' => 209,
  'CreditMemoLineMod Rate' => 0,
  'CreditMemoLineMod RatePercent' => 0,
  'CreditMemoLineMod PriceLevelRef ListID' => 0,
  'CreditMemoLineMod PriceLevelRef FullName' => 209,
  'CreditMemoLineMod ClassRef ListID' => 0,
  'CreditMemoLineMod ClassRef FullName' => 209,
  'CreditMemoLineMod Amount' => 0,
  'CreditMemoLineMod ServiceDate' => 0,
  'CreditMemoLineMod SalesTaxCodeRef ListID' => 0,
  'CreditMemoLineMod SalesTaxCodeRef FullName' => 209,
  'CreditMemoLineMod OverrideItemAccountRef ListID' => 0,
  'CreditMemoLineMod OverrideItemAccountRef FullName' => 209,
  'CreditMemoLineMod Other1' => 29,
  'CreditMemoLineMod Other2' => 29,
  'CreditMemoLineGroupMod TxnLineID' => 0,
  'CreditMemoLineGroupMod ItemGroupRef ListID' => 0,
  'CreditMemoLineGroupMod ItemGroupRef FullName' => 209,
  'CreditMemoLineGroupMod Quantity' => 0,
  'CreditMemoLineGroupMod UnitOfMeasure' => 31,
  'CreditMemoLineGroupMod OverrideUOMSetRef ListID' => 0,
  'CreditMemoLineGroupMod OverrideUOMSetRef FullName' => 209,
  'CreditMemoLineGroupMod CreditMemoLineMod TxnLineID' => 0,
  'CreditMemoLineGroupMod CreditMemoLineMod ItemRef ListID' => 0,
  'CreditMemoLineGroupMod CreditMemoLineMod ItemRef FullName' => 209,
  'CreditMemoLineGroupMod CreditMemoLineMod Desc' => 4095,
  'CreditMemoLineGroupMod CreditMemoLineMod Quantity' => 0,
  'CreditMemoLineGroupMod CreditMemoLineMod UnitOfMeasure' => 31,
  'CreditMemoLineGroupMod CreditMemoLineMod OverrideUOMSetRef ListID' => 0,
  'CreditMemoLineGroupMod CreditMemoLineMod OverrideUOMSetRef FullName' => 209,
  'CreditMemoLineGroupMod CreditMemoLineMod Rate' => 0,
  'CreditMemoLineGroupMod CreditMemoLineMod RatePercent' => 0,
  'CreditMemoLineGroupMod CreditMemoLineMod PriceLevelRef ListID' => 0,
  'CreditMemoLineGroupMod CreditMemoLineMod PriceLevelRef FullName' => 209,
  'CreditMemoLineGroupMod CreditMemoLineMod ClassRef ListID' => 0,
  'CreditMemoLineGroupMod CreditMemoLineMod ClassRef FullName' => 209,
  'CreditMemoLineGroupMod CreditMemoLineMod Amount' => 0,
  'CreditMemoLineGroupMod CreditMemoLineMod ServiceDate' => 0,
  'CreditMemoLineGroupMod CreditMemoLineMod SalesTaxCodeRef ListID' => 0,
  'CreditMemoLineGroupMod CreditMemoLineMod SalesTaxCodeRef FullName' => 209,
  'CreditMemoLineGroupMod CreditMemoLineMod OverrideItemAccountRef ListID' => 0,
  'CreditMemoLineGroupMod CreditMemoLineMod OverrideItemAccountRef FullName' => 209,
  'CreditMemoLineGroupMod CreditMemoLineMod Other1' => 29,
  'CreditMemoLineGroupMod CreditMemoLineMod Other2' => 29,
  'IncludeRetElement' => 50,
];

        return $paths;
    }

    protected function &_isOptionalPaths()
    {
        static $paths =  [
  'TxnID' => false,
  'EditSequence' => false,
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
  'CreditMemoLineMod TxnLineID' => false,
  'CreditMemoLineMod ItemRef ListID' => true,
  'CreditMemoLineMod ItemRef FullName' => true,
  'CreditMemoLineMod Desc' => true,
  'CreditMemoLineMod Quantity' => true,
  'CreditMemoLineMod UnitOfMeasure' => true,
  'CreditMemoLineMod OverrideUOMSetRef ListID' => true,
  'CreditMemoLineMod OverrideUOMSetRef FullName' => true,
  'CreditMemoLineMod Rate' => false,
  'CreditMemoLineMod RatePercent' => false,
  'CreditMemoLineMod PriceLevelRef ListID' => true,
  'CreditMemoLineMod PriceLevelRef FullName' => true,
  'CreditMemoLineMod ClassRef ListID' => true,
  'CreditMemoLineMod ClassRef FullName' => true,
  'CreditMemoLineMod Amount' => true,
  'CreditMemoLineMod ServiceDate' => true,
  'CreditMemoLineMod SalesTaxCodeRef ListID' => true,
  'CreditMemoLineMod SalesTaxCodeRef FullName' => true,
  'CreditMemoLineMod OverrideItemAccountRef ListID' => true,
  'CreditMemoLineMod OverrideItemAccountRef FullName' => true,
  'CreditMemoLineMod Other1' => true,
  'CreditMemoLineMod Other2' => true,
  'CreditMemoLineGroupMod TxnLineID' => false,
  'CreditMemoLineGroupMod ItemGroupRef ListID' => true,
  'CreditMemoLineGroupMod ItemGroupRef FullName' => true,
  'CreditMemoLineGroupMod Quantity' => true,
  'CreditMemoLineGroupMod UnitOfMeasure' => true,
  'CreditMemoLineGroupMod OverrideUOMSetRef ListID' => true,
  'CreditMemoLineGroupMod OverrideUOMSetRef FullName' => true,
  'CreditMemoLineGroupMod CreditMemoLineMod TxnLineID' => false,
  'CreditMemoLineGroupMod CreditMemoLineMod ItemRef ListID' => true,
  'CreditMemoLineGroupMod CreditMemoLineMod ItemRef FullName' => true,
  'CreditMemoLineGroupMod CreditMemoLineMod Desc' => true,
  'CreditMemoLineGroupMod CreditMemoLineMod Quantity' => true,
  'CreditMemoLineGroupMod CreditMemoLineMod UnitOfMeasure' => true,
  'CreditMemoLineGroupMod CreditMemoLineMod OverrideUOMSetRef ListID' => true,
  'CreditMemoLineGroupMod CreditMemoLineMod OverrideUOMSetRef FullName' => true,
  'CreditMemoLineGroupMod CreditMemoLineMod Rate' => false,
  'CreditMemoLineGroupMod CreditMemoLineMod RatePercent' => false,
  'CreditMemoLineGroupMod CreditMemoLineMod PriceLevelRef ListID' => true,
  'CreditMemoLineGroupMod CreditMemoLineMod PriceLevelRef FullName' => true,
  'CreditMemoLineGroupMod CreditMemoLineMod ClassRef ListID' => true,
  'CreditMemoLineGroupMod CreditMemoLineMod ClassRef FullName' => true,
  'CreditMemoLineGroupMod CreditMemoLineMod Amount' => true,
  'CreditMemoLineGroupMod CreditMemoLineMod ServiceDate' => true,
  'CreditMemoLineGroupMod CreditMemoLineMod SalesTaxCodeRef ListID' => true,
  'CreditMemoLineGroupMod CreditMemoLineMod SalesTaxCodeRef FullName' => true,
  'CreditMemoLineGroupMod CreditMemoLineMod OverrideItemAccountRef ListID' => true,
  'CreditMemoLineGroupMod CreditMemoLineMod OverrideItemAccountRef FullName' => true,
  'CreditMemoLineGroupMod CreditMemoLineMod Other1' => true,
  'CreditMemoLineGroupMod CreditMemoLineMod Other2' => true,
  'IncludeRetElement' => true,
];
    }

    protected function &_sinceVersionPaths()
    {
        static $paths =  [
  'TxnID' => 999.99,
  'EditSequence' => 999.99,
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
  'CreditMemoLineMod TxnLineID' => 999.99,
  'CreditMemoLineMod ItemRef ListID' => 999.99,
  'CreditMemoLineMod ItemRef FullName' => 999.99,
  'CreditMemoLineMod Desc' => 999.99,
  'CreditMemoLineMod Quantity' => 999.99,
  'CreditMemoLineMod UnitOfMeasure' => 7,
  'CreditMemoLineMod OverrideUOMSetRef ListID' => 999.99,
  'CreditMemoLineMod OverrideUOMSetRef FullName' => 999.99,
  'CreditMemoLineMod Rate' => 999.99,
  'CreditMemoLineMod RatePercent' => 999.99,
  'CreditMemoLineMod PriceLevelRef ListID' => 999.99,
  'CreditMemoLineMod PriceLevelRef FullName' => 999.99,
  'CreditMemoLineMod ClassRef ListID' => 999.99,
  'CreditMemoLineMod ClassRef FullName' => 999.99,
  'CreditMemoLineMod Amount' => 999.99,
  'CreditMemoLineMod ServiceDate' => 999.99,
  'CreditMemoLineMod SalesTaxCodeRef ListID' => 999.99,
  'CreditMemoLineMod SalesTaxCodeRef FullName' => 999.99,
  'CreditMemoLineMod OverrideItemAccountRef ListID' => 999.99,
  'CreditMemoLineMod OverrideItemAccountRef FullName' => 999.99,
  'CreditMemoLineMod Other1' => 6,
  'CreditMemoLineMod Other2' => 6,
  'CreditMemoLineGroupMod TxnLineID' => 999.99,
  'CreditMemoLineGroupMod ItemGroupRef ListID' => 999.99,
  'CreditMemoLineGroupMod ItemGroupRef FullName' => 999.99,
  'CreditMemoLineGroupMod Quantity' => 999.99,
  'CreditMemoLineGroupMod UnitOfMeasure' => 7,
  'CreditMemoLineGroupMod OverrideUOMSetRef ListID' => 999.99,
  'CreditMemoLineGroupMod OverrideUOMSetRef FullName' => 999.99,
  'CreditMemoLineGroupMod CreditMemoLineMod TxnLineID' => 999.99,
  'CreditMemoLineGroupMod CreditMemoLineMod ItemRef ListID' => 999.99,
  'CreditMemoLineGroupMod CreditMemoLineMod ItemRef FullName' => 999.99,
  'CreditMemoLineGroupMod CreditMemoLineMod Desc' => 999.99,
  'CreditMemoLineGroupMod CreditMemoLineMod Quantity' => 999.99,
  'CreditMemoLineGroupMod CreditMemoLineMod UnitOfMeasure' => 7,
  'CreditMemoLineGroupMod CreditMemoLineMod OverrideUOMSetRef ListID' => 999.99,
  'CreditMemoLineGroupMod CreditMemoLineMod OverrideUOMSetRef FullName' => 999.99,
  'CreditMemoLineGroupMod CreditMemoLineMod Rate' => 999.99,
  'CreditMemoLineGroupMod CreditMemoLineMod RatePercent' => 999.99,
  'CreditMemoLineGroupMod CreditMemoLineMod PriceLevelRef ListID' => 999.99,
  'CreditMemoLineGroupMod CreditMemoLineMod PriceLevelRef FullName' => 999.99,
  'CreditMemoLineGroupMod CreditMemoLineMod ClassRef ListID' => 999.99,
  'CreditMemoLineGroupMod CreditMemoLineMod ClassRef FullName' => 999.99,
  'CreditMemoLineGroupMod CreditMemoLineMod Amount' => 999.99,
  'CreditMemoLineGroupMod CreditMemoLineMod ServiceDate' => 999.99,
  'CreditMemoLineGroupMod CreditMemoLineMod SalesTaxCodeRef ListID' => 999.99,
  'CreditMemoLineGroupMod CreditMemoLineMod SalesTaxCodeRef FullName' => 999.99,
  'CreditMemoLineGroupMod CreditMemoLineMod OverrideItemAccountRef ListID' => 999.99,
  'CreditMemoLineGroupMod CreditMemoLineMod OverrideItemAccountRef FullName' => 999.99,
  'CreditMemoLineGroupMod CreditMemoLineMod Other1' => 6,
  'CreditMemoLineGroupMod CreditMemoLineMod Other2' => 6,
  'IncludeRetElement' => 4,
];

        return $paths;
    }

    protected function &_isRepeatablePaths()
    {
        static $paths =  [
  'TxnID' => false,
  'EditSequence' => false,
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
  'CreditMemoLineMod TxnLineID' => false,
  'CreditMemoLineMod ItemRef ListID' => false,
  'CreditMemoLineMod ItemRef FullName' => false,
  'CreditMemoLineMod Desc' => false,
  'CreditMemoLineMod Quantity' => false,
  'CreditMemoLineMod UnitOfMeasure' => false,
  'CreditMemoLineMod OverrideUOMSetRef ListID' => false,
  'CreditMemoLineMod OverrideUOMSetRef FullName' => false,
  'CreditMemoLineMod Rate' => false,
  'CreditMemoLineMod RatePercent' => false,
  'CreditMemoLineMod PriceLevelRef ListID' => false,
  'CreditMemoLineMod PriceLevelRef FullName' => false,
  'CreditMemoLineMod ClassRef ListID' => false,
  'CreditMemoLineMod ClassRef FullName' => false,
  'CreditMemoLineMod Amount' => false,
  'CreditMemoLineMod ServiceDate' => false,
  'CreditMemoLineMod SalesTaxCodeRef ListID' => false,
  'CreditMemoLineMod SalesTaxCodeRef FullName' => false,
  'CreditMemoLineMod OverrideItemAccountRef ListID' => false,
  'CreditMemoLineMod OverrideItemAccountRef FullName' => false,
  'CreditMemoLineMod Other1' => false,
  'CreditMemoLineMod Other2' => false,
  'CreditMemoLineGroupMod TxnLineID' => false,
  'CreditMemoLineGroupMod ItemGroupRef ListID' => false,
  'CreditMemoLineGroupMod ItemGroupRef FullName' => false,
  'CreditMemoLineGroupMod Quantity' => false,
  'CreditMemoLineGroupMod UnitOfMeasure' => false,
  'CreditMemoLineGroupMod OverrideUOMSetRef ListID' => false,
  'CreditMemoLineGroupMod OverrideUOMSetRef FullName' => false,
  'CreditMemoLineGroupMod CreditMemoLineMod TxnLineID' => false,
  'CreditMemoLineGroupMod CreditMemoLineMod ItemRef ListID' => false,
  'CreditMemoLineGroupMod CreditMemoLineMod ItemRef FullName' => false,
  'CreditMemoLineGroupMod CreditMemoLineMod Desc' => false,
  'CreditMemoLineGroupMod CreditMemoLineMod Quantity' => false,
  'CreditMemoLineGroupMod CreditMemoLineMod UnitOfMeasure' => false,
  'CreditMemoLineGroupMod CreditMemoLineMod OverrideUOMSetRef ListID' => false,
  'CreditMemoLineGroupMod CreditMemoLineMod OverrideUOMSetRef FullName' => false,
  'CreditMemoLineGroupMod CreditMemoLineMod Rate' => false,
  'CreditMemoLineGroupMod CreditMemoLineMod RatePercent' => false,
  'CreditMemoLineGroupMod CreditMemoLineMod PriceLevelRef ListID' => false,
  'CreditMemoLineGroupMod CreditMemoLineMod PriceLevelRef FullName' => false,
  'CreditMemoLineGroupMod CreditMemoLineMod ClassRef ListID' => false,
  'CreditMemoLineGroupMod CreditMemoLineMod ClassRef FullName' => false,
  'CreditMemoLineGroupMod CreditMemoLineMod Amount' => false,
  'CreditMemoLineGroupMod CreditMemoLineMod ServiceDate' => false,
  'CreditMemoLineGroupMod CreditMemoLineMod SalesTaxCodeRef ListID' => false,
  'CreditMemoLineGroupMod CreditMemoLineMod SalesTaxCodeRef FullName' => false,
  'CreditMemoLineGroupMod CreditMemoLineMod OverrideItemAccountRef ListID' => false,
  'CreditMemoLineGroupMod CreditMemoLineMod OverrideItemAccountRef FullName' => false,
  'CreditMemoLineGroupMod CreditMemoLineMod Other1' => false,
  'CreditMemoLineGroupMod CreditMemoLineMod Other2' => false,
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
'TxnID',
'EditSequence',
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
'CreditMemoLineMod TxnLineID',
'CreditMemoLineMod ItemRef ListID',
'CreditMemoLineMod ItemRef FullName',
'CreditMemoLineMod Desc',
'CreditMemoLineMod Quantity',
'CreditMemoLineMod UnitOfMeasure',
'CreditMemoLineMod OverrideUOMSetRef ListID',
'CreditMemoLineMod OverrideUOMSetRef FullName',
'CreditMemoLineMod Rate',
'CreditMemoLineMod RatePercent',
'CreditMemoLineMod PriceLevelRef ListID',
'CreditMemoLineMod PriceLevelRef FullName',
'CreditMemoLineMod ClassRef ListID',
'CreditMemoLineMod ClassRef FullName',
'CreditMemoLineMod Amount',
'CreditMemoLineMod ServiceDate',
'CreditMemoLineMod SalesTaxCodeRef ListID',
'CreditMemoLineMod SalesTaxCodeRef FullName',
'CreditMemoLineMod OverrideItemAccountRef ListID',
'CreditMemoLineMod OverrideItemAccountRef FullName',
'CreditMemoLineMod Other1',
'CreditMemoLineMod Other2',
'CreditMemoLineGroupMod TxnLineID',
'CreditMemoLineGroupMod ItemGroupRef ListID',
'CreditMemoLineGroupMod ItemGroupRef FullName',
'CreditMemoLineGroupMod Quantity',
'CreditMemoLineGroupMod UnitOfMeasure',
'CreditMemoLineGroupMod OverrideUOMSetRef ListID',
'CreditMemoLineGroupMod OverrideUOMSetRef FullName',
'CreditMemoLineGroupMod CreditMemoLineMod TxnLineID',
'CreditMemoLineGroupMod CreditMemoLineMod ItemRef ListID',
'CreditMemoLineGroupMod CreditMemoLineMod ItemRef FullName',
'CreditMemoLineGroupMod CreditMemoLineMod Desc',
'CreditMemoLineGroupMod CreditMemoLineMod Quantity',
'CreditMemoLineGroupMod CreditMemoLineMod UnitOfMeasure',
'CreditMemoLineGroupMod CreditMemoLineMod OverrideUOMSetRef ListID',
'CreditMemoLineGroupMod CreditMemoLineMod OverrideUOMSetRef FullName',
'CreditMemoLineGroupMod CreditMemoLineMod Rate',
'CreditMemoLineGroupMod CreditMemoLineMod RatePercent',
'CreditMemoLineGroupMod CreditMemoLineMod PriceLevelRef ListID',
'CreditMemoLineGroupMod CreditMemoLineMod PriceLevelRef FullName',
'CreditMemoLineGroupMod CreditMemoLineMod ClassRef ListID',
'CreditMemoLineGroupMod CreditMemoLineMod ClassRef FullName',
'CreditMemoLineGroupMod CreditMemoLineMod Amount',
'CreditMemoLineGroupMod CreditMemoLineMod ServiceDate',
'CreditMemoLineGroupMod CreditMemoLineMod SalesTaxCodeRef ListID',
'CreditMemoLineGroupMod CreditMemoLineMod SalesTaxCodeRef FullName',
'CreditMemoLineGroupMod CreditMemoLineMod OverrideItemAccountRef ListID',
'CreditMemoLineGroupMod CreditMemoLineMod OverrideItemAccountRef FullName',
'CreditMemoLineGroupMod CreditMemoLineMod Other1',
'CreditMemoLineGroupMod CreditMemoLineMod Other2',
];

        return $paths;
    }
}
