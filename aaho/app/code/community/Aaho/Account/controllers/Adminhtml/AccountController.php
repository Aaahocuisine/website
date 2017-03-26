<?php

/**
 * Aaho Extension
 *
 * @category   Aaho
 * @package    Aaho_Account
 * @author     Ashok Kumar Mishra <ashokmishra.cpp@gmail.com>
 */
class Aaho_Account_Adminhtml_AccountController extends Mage_Adminhtml_Controller_Action {

    public function restaurantAction() {
        $this->loadLayout()
                ->_setActiveMenu('restaurant')
                ->_title($this->__('Restaurant Action'));

        $this->_addContent($this->getLayout()->createBlock('aaho_account/restaurant'));

        $this->renderLayout();
    }

    public function accountAction() {
        $this->loadLayout()
                ->_setActiveMenu('account')
                ->_title($this->__('Account Action'));

        // my stuff

        $this->renderLayout();
    }

    public function ordersAction() {
        $this->loadLayout()
                ->_setActiveMenu('orders')
                ->_title($this->__('Order Action'));
        
        $fromDate = $this->getRequest()->getParam('from_date');
        $toDate = $this->getRequest()->getParam('to_date');

        $this->_addContent($this->getLayout()->createBlock('aaho_account/order')->setFromDate($fromDate)->setToDate($toDate));

        $this->renderLayout();
    }

    public function setTableStatusAction() {
        //Mage::getModel("aaho_account/restaurant")->setTableStatus(Mage::app()->getRequest());
        //if ($this->getRequest()->isPost()) {
            //$id = $this->getRequest()->getPost("table_id");
            $id = 1;
            $tableData = array('items'=>'test1','price'=>1000,'status'=>1);
            $model = Mage::getModel('aaho_account/restaurant')->load($id)->addData($tableData);
            try {
                $model->setId($id)->save();
                echo "record updated successfully.";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        //}
    }

}
