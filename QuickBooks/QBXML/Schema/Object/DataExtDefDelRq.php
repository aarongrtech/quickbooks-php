<?php

/**
 * Schema object for: DataExtDefDelRq
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
require_once __DIR__ . '/QuickBooks.php';

/**
 *
 */
require_once __DIR__ . '/QuickBooks/QBXML/Schema/Object.php';

/**
 *
 */
class QuickBooks_QBXML_Schema_Object_DataExtDefDelRq extends QuickBooks_QBXML_Schema_Object
{
    protected function &_qbxmlWrapper()
    {
        static $wrapper = '';

        return $wrapper;
    }

    protected function &_dataTypePaths()
    {
        static $paths =  [
  'OwnerID' => 'GUIDTYPE',
  'DataExtName' => 'STRTYPE',
];

        return $paths;
    }

    protected function &_maxLengthPaths()
    {
        static $paths =  [
  'OwnerID' => 0,
  'DataExtName' => 31,
];

        return $paths;
    }

    protected function &_isOptionalPaths()
    {
        static $paths =  [
  'OwnerID' => false,
  'DataExtName' => false,
];
    }

    protected function &_sinceVersionPaths()
    {
        static $paths =  [
  'OwnerID' => 999.99,
  'DataExtName' => 999.99,
];

        return $paths;
    }

    protected function &_isRepeatablePaths()
    {
        static $paths =  [
  'OwnerID' => false,
  'DataExtName' => false,
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
  0 => 'OwnerID',
  1 => 'DataExtName',
];

        return $paths;
    }
}
