<?php

class Plumrocket_Callforprice_IndexController extends Mage_Core_Controller_Front_Action
{
	
	public function indexAction()
	{
		$this->loadLayout();
		$this->renderLayout();
	}

	public function saveAction()
	{
		if($data = $this->getRequest()->getPost()){
			$model = Mage::getModel('plumrocket_callforprice/callrequests');
			$clearedData = $model->clearData($data);

			if($model->isValid($clearedData)){
				$model->setData($clearedData);

	       		if(!$model->getCreated()){
	            	$model->setCreated(now());
	        	}

	            $model->save();
	            Mage::getSingleton('core/session')->addSuccess($this->__('Your request was successfully sent'));
	            $this->_redirect('*/*/');
			} else {
				Mage::getSingleton('core/session')->addError($this->__('Error! You must fill all required fields!'));
            	$this->_redirect('*/*/');
			}
		}
	}
}