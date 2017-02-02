<?php

class Plumrocket_Callforprice_Model_Callrequests extends Mage_Core_Model_Abstract
{
	public function _construct()
	{
		parent::_construct();
		$this->_init('plumrocket_callforprice/callrequests');
	}

	public function clearData(array $postData)
	{
		$clearedData = array();
		foreach($postData as $index => $data){
			$clearedData[$index] = trim(strip_tags($data));
		}
		return $clearedData;
	}

	public function isValid(array $postData)
	{
		return (!empty($postData['name'])) && (!empty($postData['email'])) &&
				(!empty($postData['phone'])) && (!empty($postData['message'])) &&
				(!empty($postData['recall']));
	}
}