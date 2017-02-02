<?php

class Plumrocket_Callforprice_Block_Adminhtml_Requests_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{
		$helper = Mage::helper('plumrocket_callforprice');
		$model = Mage::registry('current_callrequest');

		$product = $model->getCountry() . '.' . $model->getState();

		$form = new Varien_Data_Form(array(
			'id' => 'edit_form',
			'action' => $this->getUrl('*/*/save', array(
				'id' => $this->getRequest()->getParam('id')
			)),
			'method' => 'post',
			'enctype' => 'multipart/form-data'
		));

		$this->setForm($form);

		$fieldset = $form->addFieldset('requestcall_form', array(
			'legend' => $helper->__('Request Information')
		));


	    $fieldset->addField('link', 'link', array(
			'label' => $helper->__('Link'),
			'href' => '/index.php',            
			'value' => 'Click me!'
		));

		$fieldset->addField('message', 'editor', array(
			'label' => $helper->__('Customer Message'),
			'required' => true,
			'name' => 'message',
		));

		$fieldset->addField('created', 'date', array(
			'format' => 'Y-m-d HH:MM:ss',
			'label' => $helper->__('Request Date'),
			'name' => 'created',
			'time' => true,
			'readonly' =>true,
		));

		$fieldset->addField('recall', 'datetime', array(
			'format' => 'Y/m/d HH:MM:ss',
			'label' => $helper->__('When To Call'),
			'required' => true,
			'name' => 'recall',
			'image' => $this->getSkinUrl('images/grid-cal.gif'),
			'time' => true,
			'width' => '150px'
		));

		$fieldset->addField('status', 'select', array(
			'label' => $helper->__('Status'),
			'required' => false,
			'name' => 'status',
			'values' => array('New' => 'New',
							'Processed' => 'Processed'
						),
		));

		$fieldset->addField('name', 'text', array(
			'label' => $helper->__('Customer Name'),
			'required' => true,
			'name' => 'name',
		));

		$fieldset->addField('email', 'text', array(
			'label' => $helper->__('Customer Email'),
			'required' => true,
			'name' => 'email',
		));

		$fieldset->addField('phone', 'text', array(
			'label' => $helper->__('Customer Phone Number'),
			'required' => true,
			'name' => 'phone',
		));

		$fieldset->addField('country', 'text', array(
			'label' => $helper->__('Country'),
			'required' => false,
			'name' => 'country',
		));

		$fieldset->addField('some_notes', 'editor', array(
			'label' => $helper->__('Note'),
			'required' => false,
			'name' => 'some_notes',
		));

		$form->setUseContainer(true);

		$form->setValues($model->getData());

		return parent::_prepareForm();
	}
}