<?php

$installer = $this;
$tableRequests = $installer->getTable('plumrocket_callforprice/table_callrequests');

$installer->startSetup();

$installer->getConnection()->dropTable($tableRequests);
$table = $installer->getConnection()
    ->newTable($tableRequests)
    ->addColumn('request_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
    ))
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, '100', array(
        'nullable'  => false,
    ))
    ->addColumn('email', Varien_Db_Ddl_Table::TYPE_TEXT, '100', array(
        'nullable'  => false,
    ))
    ->addColumn('phone', Varien_Db_Ddl_Table::TYPE_TEXT, '15', array(
        'nullable'  => false,
    ))
    ->addColumn('address', Varien_Db_Ddl_Table::TYPE_TEXT, '255', array(
        'nullable'  => true,
    ))
    ->addColumn('company', Varien_Db_Ddl_Table::TYPE_TEXT, '100', array(
        'nullable'  => true,
    ))
    ->addColumn('state', Varien_Db_Ddl_Table::TYPE_TEXT, '55', array(
        'nullable'  => true,
    ))
    ->addColumn('country', Varien_Db_Ddl_Table::TYPE_TEXT, '55', array(
        'nullable'  => true,
    ))
    ->addColumn('message', Varien_Db_Ddl_Table::TYPE_TEXT, '255', array(
        'nullable'  => true,
    ))
    ->addColumn('recall', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable'  => false,
    ))
    ->addColumn('created', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable'  => false,
    ))
    ->addColumn('status', Varien_Db_Ddl_Table::TYPE_TEXT, '25', array(
        'nullable'  => false,
        'default' => 'New',
    ))
    ->addColumn('some_notes', Varien_Db_Ddl_Table::TYPE_TEXT, '255', array(
        'nullable'  => true,
    ));

$installer->getConnection()->createTable($table);
$installer->endSetup();
