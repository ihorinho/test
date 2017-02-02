<?php

class Plumrocket_Callforprice_Adminhtml_RequestsController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction()
    {
		try{
			$this->loadLayout();
			$this->_setActiveMenu('plumrocket_callforprice');

			$contentBlock = $this->getLayout()->createBlock('plumrocket_callforprice/adminhtml_requests');
			$this->_addContent($contentBlock);

			$this->renderLayout();
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function editAction()
    {
        $id = (int) $this->getRequest()->getParam('id');
         Mage::register('current_callrequest', Mage::getModel('plumrocket_callforprice/callrequests')->load($id));

        $this->loadLayout()->_setActiveMenu('plumrocket_callforprice');
        $this->_addContent($this->getLayout()->createBlock('plumrocket_callforprice/adminhtml_requests_edit'));
        $this->renderLayout();


		$model = Mage::getModel('plumrocket_callforprice/callrequests')->load($this->getRequest()->getParam('id'));
	}

    public function saveAction()
    {
        $id = (int) $this->getRequest()->getParam('id');
        $data = $this->getRequest()->getPost();
        $model = Mage::getModel('plumrocket_callforprice/callrequests')->load($id);

        try{
            $model->addData($data)->setId($id)->save();
            $model->addData(array('notes' => 'some note', 'name' => "durik"))->save();
            $this->_getSession()->addSuccess($this->__('Call request from %s successfully saved', $model->getName()));
        } catch (Exception $e){
            $this->_getSession()->addError($e->getMessage());
        }
        $this->_redirect('*/*/');
    }

    public function saveEditAction()
    {
        $id = (int) $this->getRequest()->getParam('id');
        $data = $this->getRequest()->getPost();
        $model = Mage::getModel('plumrocket_callforprice/callrequests')->load($id);

        try{
            $model->addData($data)->setId($id)->save();
            $model->addData(array('notes' => 'some note', 'name' => "durik"))->save();
            $this->_getSession()->addSuccess($this->__('Call request from %s successfully saved', $model->getName()));
        } catch (Exception $e){
            $this->_getSession()->addError($e->getMessage());
        }
        $this->_redirect('*/*');
    }

    public function deleteAction()
    {
        if($id = (int) $this->getRequest()->getParam('id', 0)){
            try{
                Mage::getModel('plumrocket_callforprice/callrequests')->setId($id)->delete();
                $this->_getSession()->addSuccess($this->__('Call Request with id %d deleted', $id));
            } catch (Exception $e){
                $this->_getSession()->addError($e->getMessage());
            }
        } else {
            $this->_getSession()->addError($this->__('Please select requests'));  
        }
        $this->_redirect('*/*/index');
    }

	public function massDeleteAction()
    {
        $callrequestIds = $this->getRequest()->getParam('callrequests', null);

        if (is_array($callrequestIds) && sizeof($callrequestIds) > 0) {
            try {
                foreach ($callrequestIds as $id) {
                    Mage::getModel('plumrocket_callforprice/callrequests')->setId($id)->delete();
                }
                $this->_getSession()->addSuccess($this->__('Total of %d requests have been deleted', sizeof($callrequestIds)));
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        } else {
            $this->_getSession()->addError($this->__('Please select requests'));
        }
        $this->_redirect('*/*');
    }

    public function markProcessedAction()
    {
        $callrequestIds = $this->getRequest()->getParam('callrequests', null);
        if (is_array($callrequestIds) && sizeof($callrequestIds) > 0) {
            try {
                foreach ($callrequestIds as $id) {
                    Mage::getModel('plumrocket_callforprice/callrequests')->load($id)->addData(array('status' => 'Processed'))->setId($id)->save();
                }
                $this->_getSession()->addSuccess($this->__('Total of %d news have been changed', sizeof($callrequestIds)));
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            }
        } else {
            $this->_getSession()->addError($this->__('Please select requests'));
        }
        $this->_redirect('*/*');
    }
}