<?php

class Plumrocket_Callforprice_Model_Resource_Callrequests_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
	public function _construct()
    {
        $this->_init('plumrocket_callforprice/callrequests', 'request_id');
    }
}