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
 */

QuickBooks_Loader::load('/QuickBooks/Map.php');

QuickBooks_Loader::load('/QuickBooks/Driver/Factory.php');

class QuickBooks_Map_Qbxml extends QuickBooks_Map
{
    protected $_driver;

    public function __construct($dsn_or_Driver, $driver_options = [])
    {
        if (is_object($dsn_or_Driver)) {
            $this->_driver = $dsn_or_Driver;
        } else {
            $this->_driver = QuickBooks_Driver_Factory::create($dsn_or_Driver, $driver_options);
        }
    }

    public function mark($mark_as, $object_or_action, $ID, $TxnID_or_ListID = null, $errnum = null, $errmsg = null, $mark_as_dequeued = true)
    {
        $Driver = $this->_driver;

        $object = QuickBooks_Utilities::actionToObject($object_or_action);

        $table_and_field = [];

        // Convert to table and primary key, select qbsql id
        QuickBooks_SQL_Schema::mapPrimaryKey($object, QUICKBOOKS_SQL_SCHEMA_MAP_TO_SQL, $table_and_field);

        if (!empty($table_and_field[0]) && !empty($table_and_field[1]) && $mark_as === QuickBooks_Map::MARK_ADD) {
            $arr = [];
            $where = [
                [ QUICKBOOKS_DRIVER_SQL_FIELD_ID => $ID ],
                ];
            if ($TxnID_or_ListID) {
                $arr[$table_and_field[1]] = $TxnID_or_ListID;

                // Get the existing temporary ID
                $errnum = null;
                $errmsg = null;
                $existing = $Driver->fetch($Driver->query('SELECT ' . $table_and_field[1] . ' FROM ' . QUICKBOOKS_DRIVER_SQL_PREFIX_SQL . $table_and_field[0] . ' WHERE ' . QUICKBOOKS_DRIVER_SQL_FIELD_ID . ' = ' . $ID, $errnum, $errmsg));

                if (!$existing) {
                    return false;
                }

                $existing_TxnID_or_ListID = $existing[$table_and_field[1]];
            }

            $resync = true;
            $discov = true;
            if ($errnum) {
                $arr[QUICKBOOKS_DRIVER_SQL_FIELD_ERROR_NUMBER] = $errnum;
                $arr[QUICKBOOKS_DRIVER_SQL_FIELD_ERROR_MESSAGE] = $errmsg;

                // Don't mark it as synced/discovered if there was an error
                $resync = false;
                $discov = false;
            }

            /*
            if ($mark_as_dequeued)
            {
                $arr[QUICKBOOKS_DRIVER_SQL_FIELD_ENQUEUE_TIME] = date('Y-m-d H:i:s');
            }
            */
            $Driver->update(
                QUICKBOOKS_DRIVER_SQL_PREFIX_SQL . $table_and_field[0],
                $arr,
                $where,
                $resync,
                $discov
            );
            if ($TxnID_or_ListID) {
                $quickBooksSQLObject = new QuickBooks_SQL_Object($table_and_field[0], '', []);
                $quickBooksSQLObject->set($table_and_field[1], $TxnID_or_ListID);

                $action = QuickBooks_Utilities::objectToAdd($object_or_action);

                $this->_updateRelatives($table_and_field[0], $action, $quickBooksSQLObject, $existing_TxnID_or_ListID);
            }
        }

        return false;
    }

    public function flat($map, $object_or_action, $ID)
    {
        $Driver = $this->_driver;

        if ($map == QuickBooks_Map::MAP_QBXML) {
            $object = QuickBooks_Utilities::actionToObject($object_or_action);

            $table_and_field = [];

            // Convert to table and primary key, select qbsql id
            QuickBooks_SQL_Schema::mapPrimaryKey($object, QUICKBOOKS_SQL_SCHEMA_MAP_TO_SQL, $table_and_field);

            if (!empty($table_and_field[0]) && !empty($table_and_field[1])) {
                $errnum = null;
                $errmsg = null;
                return $Driver->fetch($Driver->query('
					SELECT 
						* 
					FROM 
						' . QUICKBOOKS_DRIVER_SQL_PREFIX_SQL . $table_and_field[0] . '
					WHERE 
						' . QUICKBOOKS_DRIVER_SQL_FIELD_ID . ' = ' . (int) $ID, $errnum, $errmsg));
            }
        }

        return null;
    }

    public function table($map, $object_or_action, $ID)
    {
        if ($map == QuickBooks_Map::MAP_QBXML) {
            $object = QuickBooks_Utilities::actionToObject($object_or_action);

            $table_and_field = [];

            // Convert to table and primary key, select qbsql id
            QuickBooks_SQL_Schema::mapPrimaryKey($object, QUICKBOOKS_SQL_SCHEMA_MAP_TO_SQL, $table_and_field);

            if (!empty($table_and_field[0]) && !empty($table_and_field[1])) {
                return QUICKBOOKS_DRIVER_SQL_PREFIX_SQL . $table_and_field[0];
            }
        }

        return null;
    }

    public function adds($adds = [], $mark_as_queued = true, $limit = null)
    {
        $Driver = $this->_driver;

        $NOW = date('Y-m-d H:i:s');

        $sql_add = $adds;

        $list = [];

        //$Driver->log('Input is: ' . print_r($adds, true));

        // Check if any objects need to be pushed back to QuickBooks
        foreach ($sql_add as $action => $priority) {
            $object = QuickBooks_Utilities::actionToObject($action);

            //$Driver->log('Action is: ' . $action . ', object is: ' . $object);

            $table_and_field = [];

            // Convert to table and primary key, select qbsql id
            QuickBooks_SQL_Schema::mapPrimaryKey($object, QUICKBOOKS_SQL_SCHEMA_MAP_TO_SQL, $table_and_field);

            $Driver->log('Searching table: ' . print_r($table_and_field, true) . ' for ADDED records.');

            //print_r($table_and_field);

            if (!empty($table_and_field[0]) && !empty($table_and_field[1])) {
                // For ADDs
                // 	- Do not sync if to_skip = 1
                //	- Do not sync if to_delete = 1
                //	- Do not sync if last_errnum is not empty		@TODO Implement this

                switch ($table_and_field[0]) {
                    case 'customer':
                        $priority_reduce = 'Parent_FullName';
                        break;
                    default:
                        $priority_reduce = null;
                }

                $extras = '';
                if ($priority_reduce) {
                    $extras = ', ' . $priority_reduce;
                }

                $sql = '
					SELECT 
						' . QUICKBOOKS_DRIVER_SQL_FIELD_ID . ', 
						' . QUICKBOOKS_DRIVER_SQL_FIELD_ERROR_NUMBER . ' ' . $extras . '
					FROM 
						' . QUICKBOOKS_DRIVER_SQL_PREFIX_SQL . $table_and_field[0] . ' 
					WHERE 
						' . QUICKBOOKS_DRIVER_SQL_FIELD_MODIFY . ' IS NOT NULL AND 
						' . QUICKBOOKS_DRIVER_SQL_FIELD_RESYNC . ' IS NULL AND 
						' . QUICKBOOKS_DRIVER_SQL_FIELD_TO_SKIP . ' != 1 AND 
						' . QUICKBOOKS_DRIVER_SQL_FIELD_TO_DELETE . ' != 1 AND 
						' . QUICKBOOKS_DRIVER_SQL_FIELD_FLAG_DELETED . ' != 1 AND 
						' . QUICKBOOKS_DRIVER_SQL_FIELD_MODIFY . " <= '" . $NOW . "' ";
                //		" . QUICKBOOKS_DRIVER_SQL_FLAG_TO_VOID . " != 1 ";

                //$Driver->log($sql);

                $errnum = 0;
                $errmsg = '';

                $count = 0;
                $res = $Driver->query($sql, $errnum, $errmsg);

                while ($arr = $Driver->fetch($res)) {
                    if (strlen($arr[QUICKBOOKS_DRIVER_SQL_FIELD_ERROR_NUMBER]) !== 0) {
                        continue;
                    }

                    if (!isset($list[$action])) {
                        $list[$action] = [];
                    }

                    $tmp_priority = $priority;
                    if ($priority_reduce && isset($arr[$priority_reduce]) && !empty($arr[$priority_reduce])) {
                        $tmp_priority = $priority - 1;
                    }

                    $list[$action][$arr[QUICKBOOKS_DRIVER_SQL_FIELD_ID]] = $tmp_priority;

                    ++$count;

                    if ($mark_as_queued) {
                        // Make the record as having been ->enqueue()d
                        $errnum = 0;
                        $errmsg = '';
                        $Driver->query('
							UPDATE 
								' . QUICKBOOKS_DRIVER_SQL_PREFIX_SQL . $table_and_field[0] . ' 
							SET 
								' . QUICKBOOKS_DRIVER_SQL_FIELD_ENQUEUE_TIME . " = '" . date('Y-m-d H:i:s') . "'
							WHERE 
								" . QUICKBOOKS_DRIVER_SQL_FIELD_ID . ' = ' . $arr[QUICKBOOKS_DRIVER_SQL_FIELD_ID], $errnum, $errmsg);
                    }

                    /*
                    if (count($list[$action]) >= $limit)
                    {
                        break;
                    }
                    */

                    if ($limit > 0 && $count >= $limit) {
                        break 2;
                    }
                }
            }
        }

        return $list;
    }

    public function mods($mods = [], $mark_as_queued = true)
    {
        return [];
    }

    public function imports($imports = [])
    {
        return [];
    }

    public function queries($queries = [])
    {
        return [];
    }

    /**
     *
     * @param unknown_type $table
     * @param unknown_type $Object
     * @param unknown_type $tmp_TxnID_or_ListID
     */
    protected function _updateRelatives($table, $action, $Object, $tmp_TxnID_or_ListID)
    {
        $Driver = $this->_driver;

        //print('updating relatives' . "\n");

        // This should *ONLY* be used when we are ADDING records
        //	If it's an update, any relatives *should already have* the permenent ListID
        //	If it's an add, any relatives *have not yet been added* and thus can be marked modified without causing sync issues
        if (substr($action, -3, 3) !== 'Add') {
            //print('returning false because of action: ' . $action . "\n");
            return false;
        }

        $map = [
            'invoice' => [
                'key' => 'TxnID',
                'relatives' => [
                    //'estimate_linkedtxn' => 'ToTxnID:Type=Invoice',
                    //'salesorder_linkedtxn' => 'ToTxnID:Type=Invoice',
                    'receivepayment_appliedtotxn' => 'ToTxnID:TxnType=Invoice', // 'ToTxnID:Type=Invoice',
                    'invoice_invoiceline' => 'Invoice_TxnID', //
                    'dataext' => 'Entity_ListID:EntityType=Customer', 	// update the Entity_ListID where EntityType = 'Customer' (and the existing Entity_ListID is the old ListID)
                    ]
                ],
            'receivepayment' => [
                'key' => 'TxnID',
                'relatives' => [
                    'receivepayment_appliedtotxn' => 'ReceivePayment_TxnID',
                    ],
                ],

            'salesreceipt' => [
                'key' => 'TxnID',
                'relatives' => [
                    'salesreceipt_salesreceiptline' => 'SalesReceipt_TxnID',
                    ],
                ],
            'salesorder' => [
                'key' => 'TxnID',
                'relatives' => [
                    'salesorder_salesorderline' => 'SalesOrder_TxnID',
                    'invoice_linkedtxn' => 'ToTxnID:TxnType=SalesOrder',
                    ],
                ],
            ];

        if (empty($map[$table])) {
            //print('returning false because of missing map: ' . $table . "\n");
            return 0;
        }

        $TxnID_or_ListID = $Object->get($map[$table]['key']);
        foreach ($map[$table]['relatives'] as $relative_table => $relative_field) {
            $Driver->log('Now updating [' . $relative_table . '] for field [' . $relative_field . '] with value [' . $TxnID_or_ListID . ']', null, QUICKBOOKS_LOG_DEBUG);
            //print('updating realtive: ' . $relative_table . "\n");

            //$multipart = array( $relative_field => $extra['AddResponse_OldKey'] );
            //$tmp = new QuickBooks_SQL_Object($relative_table, null);

            //@todo Make the Boolean TRUE value used in the QUICKBOOKS_DRIVER_SQL_FIELD_DELETED_FLAG field a constant,
            //      in case the sql driver used uses something other than 1 and 0.
            //$tmp->set($relative_field, $TxnID_or_ListID);
            //$Driver->update(QUICKBOOKS_DRIVER_SQL_PREFIX_SQL . $relative_table, $tmp, array( $multipart ), false);

            // First, if the record has already been modified, then we need to
            //	make sure that it stays marked modified. Otherwise, we need to
            //	not let this get modified. So, query for the existing record.

            $pos = false;
            $where = '';
            if (false !== ($pos = strpos($relative_field, ':'))) {
                $tmp = substr($relative_field, $pos + 1);

                $relative_field = substr($relative_field, 0, $pos);

                $where = ' AND ' . str_replace('=', "='", $tmp) . "'";

                //print('TMP IS: [' . $where . ']');
                //exit;
            }

            $errnum = null;
            $errmsg = null;
            $sql = '
				UPDATE 
					' . QUICKBOOKS_DRIVER_SQL_PREFIX_SQL . $relative_table . ' 
				SET
					' . $relative_field . " = '%s' 
				WHERE
					" . $relative_field . " = '%s' " . $where;

            //print($sql . "\n\n");

            $Driver->query($sql, $errnum, $errmsg, null, null, [
                    $TxnID_or_ListID,
                    $tmp_TxnID_or_ListID]);
        }

        return null;
    }
}
