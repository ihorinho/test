<?php

class Plumrocket_Callforprice_Block_Adminhtml_Requests_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
	protected function _construct()
	{
		$this->_blockGroup = 'plumrocket_callforprice';
		$this->_controller = 'adminhtml_requests';

		$id = $this->getRequest()->getParam('id');
		$location = $this->getUrl('*/*/saveEdit', array('id' => $id));

		$this->_addButton('create_new', array(
	        'label'   => Mage::helper('catalog')->__('Create New Order'),
	        'onclick' => "setLocation('{$this->getUrl('*/*/createOrder')}')",
	        'class'   => 'create',
		));

		$this->_addButton('save_edit', array(
	        'label'   => Mage::helper('catalog')->__('Save & Continue Edit'),
	        'onclick' => "setLocation({$this->getUrl('*/*/saveEdit', array('id' => $id))})",
	        'class'   => 'save_edit',
		));
 
	} 

	public function getHeaderText()
	{	
		$customerName = Mage::registry('current_callrequest')->getName();
		$headerText = Mage::helper('plumrocket_callforprice')->__('Manage Request From');
		return  $headerText . ' ' . $customerName;
	}
}