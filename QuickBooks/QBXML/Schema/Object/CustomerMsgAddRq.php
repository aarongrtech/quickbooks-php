<?php

/**
 * Schema object for: CustomerMsgAddRq
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
class QuickBooks_QBXML_Schema_Object_CustomerMsgAddRq extends QuickBooks_QBXML_Schema_Object
{
    protected function &_qbxmlWrapper()
    {
        static $wrapper = '';

        return $wrapper;
    }

    protected function &_dataTypePaths()
    {
        static $paths =  [
  'Name' => 'STRTYPE',
  'IsActive' => 'BOOLTYPE',
];

        return $paths;
    }

    protected function &_maxLengthPaths()
    {
        static $paths =  [
  'Name' => 101,
  'IsActive' => 0,
];

        return $paths;
    }

    protected function &_isOptionalPaths()
    {
        static $paths =  [
  'Name' => false,
  'IsActive' => true,
];
    }

    protected function &_sinceVersionPaths()
    {
        static $paths =  [
  'Name' => 999.99,
  'IsActive' => 999.99,
];

        return $paths;
    }

    protected function &_isRepeatablePaths()
    {
        static $paths =  [
  'Name' => false,
  'IsActive' => false,
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
            'Name',
            'IsActive',
            ];

        return $paths;
    }
}
