<?php

class Plumrocket_Callforprice_Model_Resource_Callrequests extends Mage_Core_Model_Mysql4_Abstract
{
	public function _construct()
	{
		$this->_init('plumrocket_callforprice/table_callrequests', 'request_id');
	}
}