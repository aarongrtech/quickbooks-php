<?php

/**
 * Schema object for: ItemInventoryAssemblyQueryRq
 *
 * @author Keith Palmer <keith@consolibyte.com>
 * @author Jay Williams <jay@myd3.com>
 * @license LICENSE.txt
 *
 * @package QuickBooks
 * @subpackage QBXML
 */

/**
 *
 */
require_once __DIR__ . '/QuickBooks.php';

/**
 *
 */
require_once __DIR__ . '/QuickBooks/QBXML/Schema/Object.php';

/**
 *
 */
class QuickBooks_QBXML_Schema_Object_ItemInventoryAssemblyQueryRq extends QuickBooks_QBXML_Schema_Object
{
    protected function &_qbxmlWrapper()
    {
        static $wrapper = '';

        return $wrapper;
    }

    protected function &_dataTypePaths()
    {
        static $paths =  [
  'ListID' => 'IDTYPE',
  'FullName' => 'STRTYPE',
  'MaxReturned' => 'INTTYPE',
  'ActiveStatus' => 'ENUMTYPE',
  'FromModifiedDate' => 'DATETIMETYPE',
  'ToModifiedDate' => 'DATETIMETYPE',
  'NameFilter MatchCriterion' => 'ENUMTYPE',
  'NameFilter Name' => 'STRTYPE',
  'NameRangeFilter FromName' => 'STRTYPE',
  'NameRangeFilter ToName' => 'STRTYPE',
  'IncludeRetElement' => 'STRTYPE',
  'OwnerID' => 'GUIDTYPE',
];

        return $paths;
    }

    protected function &_maxLengthPaths()
    {
        static $paths =  [
  'ListID' => 0,
  'FullName' => 0,
  'MaxReturned' => 0,
  'ActiveStatus' => 0,
  'FromModifiedDate' => 0,
  'ToModifiedDate' => 0,
  'NameFilter MatchCriterion' => 0,
  'NameFilter Name' => 0,
  'NameRangeFilter FromName' => 0,
  'NameRangeFilter ToName' => 0,
  'IncludeRetElement' => 0,
  'OwnerID' => 0,
];

        return $paths;
    }

    protected function &_isOptionalPaths()
    {
        static $paths =  [
  'ListID' => true,
  'FullName' => true,
  'MaxReturned' => true,
  'ActiveStatus' => true,
  'FromModifiedDate' => true,
  'ToModifiedDate' => true,
  'NameFilter MatchCriterion' => false,
  'NameFilter Name' => false,
  'NameRangeFilter FromName' => true,
  'NameRangeFilter ToName' => true,
  'IncludeRetElement' => true,
  'OwnerID' => true,
];
    }

    protected function &_sinceVersionPaths()
    {
        static $paths =  [
  'ListID' => 999.99,
  'FullName' => 999.99,
  'MaxReturned' => 999.99,
  'ActiveStatus' => 999.99,
  'FromModifiedDate' => 999.99,
  'ToModifiedDate' => 999.99,
  'NameFilter MatchCriterion' => 999.99,
  'NameFilter Name' => 999.99,
  'NameRangeFilter FromName' => 999.99,
  'NameRangeFilter ToName' => 999.99,
  'IncludeRetElement' => 999.99,
  'OwnerID' => 999.99,
];

        return $paths;
    }

    protected function &_isRepeatablePaths()
    {
        static $paths =  [
  'ListID' => true,
  'FullName' => true,
  'MaxReturned' => false,
  'ActiveStatus' => false,
  'FromModifiedDate' => false,
  'ToModifiedDate' => false,
  'NameFilter MatchCriterion' => false,
  'NameFilter Name' => false,
  'NameRangeFilter FromName' => false,
  'NameRangeFilter ToName' => false,
  'IncludeRetElement' => true,
  'OwnerID' => true,
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
  0 => 'ListID',
  1 => 'FullName',
  2 => 'MaxReturned',
  3 => 'ActiveStatus',
  4 => 'FromModifiedDate',
  5 => 'ToModifiedDate',
  6 => 'NameFilter MatchCriterion',
  7 => 'NameFilter Name',
  8 => 'NameRangeFilter FromName',
  9 => 'NameRangeFilter ToName',
  10 => 'IncludeRetElement',
  11 => 'OwnerID',
];

        return $paths;
    }
}
