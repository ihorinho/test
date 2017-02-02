<?php

class Plumrocket_Callforprice_Block_Adminhtml_Requests_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

	protected function _prepareCollection()
	{
		$collection = Mage::getModel('plumrocket_callforprice/callrequests')->getCollection();
		$this->setCollection($collection);

		return parent::_prepareCollection();
	}

	protected function _prepareColumns()
	{
		$helper = Mage::helper('plumrocket_callforprice');

		$this->addColumn('request_id', array(
			'header' => $helper->__('ID'),
			'index' => 'request_id',
			'width' => '15px',
		));

		$this->addColumn('name', array(
			'header' => $helper->__('Customer Name'),
			'index' => 'name',
			'type' => 'text',
		));

		$this->addColumn('email', array(
			'header' => $helper->__('Customer Email'),
			'index' => 'email',
			'type' => 'text',
		));		

		$this->addColumn('phone', array(
			'header' => $helper->__('Customer Phone Number'),
			'index' => 'phone',
			'type' => 'text',
		));

		$this->addColumn('product_id', array(
			'header' => $helper->__('Product ID'),
			'type' => 'number',
		));

		$this->addColumn('product_name', array(
			'header' => $helper->__('Product Name'),
			'type' => 'text',
		));

		$this->addColumn('created', array(
			'header' => $helper->__('Request Date'),
			'index' => 'created',
			'type' => 'datetime',
		));

		$this->addColumn('recall', array(
			'header' => $helper->__('When To Call \/'),
			'index' => 'recall',
			'type' => 'datetime',
		));

		$this->addColumn('status', array(
			'header' => $helper->__('Status'),
			'index' => 'status',
			'type' => 'text',
			'align' => 'center',
		));

		$this->addColumn('action', array(
			'header' => $helper->__('Action'),
			'type' => 'action',
			'align' => 'center',
			'actions' => array(
				array(
					'url' => $this->getUrl('*/*/edit', array(
						'id' => 1, //todo: Find, how to get 'request_id'
					)),
					'caption' => $helper->__('Edit'),
				),
			)
		));

		return parent::_prepareColumns();
	}

	protected function _prepareMassaction()
	{
		$this->setMassactionIdField('request_id');
		$this->getMassactionBlock()->setFormFieldName('callrequests');

		$this->getMassactionBlock()->addItem('processed', array(
			'label' => $this->__('Mark as Processed'),
			'url' => $this->getUrl('*/*/markProcessed'),
		));

		$this->getMassactionBlock()->addItem('delete', array(
			'label' => $this->__('Delete'),
			'url' => $this->getUrl('*/*/massDelete'),
		));

		return $this;
	}

	public function getRowUrl($row)
	{
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

}