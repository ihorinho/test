<?php

class Plumrocket_Callforprice_Block_Adminhtml_Requests extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	protected function _construct()
	{
		parent::_construct();

		$helper = Mage::helper('plumrocket_callforprice');
		$this->_blockGroup = 'plumrocket_callforprice';
		$this->_controller = 'adminhtml_requests';

		$this->_headerText = $helper->__('Manage Call For Price Requests');
		return '<h1>News Module: Admin section</h1>';
	}
}