<?php

/**
 * Aaho Extension
 *
 * @category   Aaho
 * @package    Aaho_Account
 * @author     Ashok Kumar Mishra <ashokmishra.cpp@gmail.com>
 */
class Aaho_Order_OrderController extends Mage_Core_Controller_Front_Action {

    public function setTableStatusAction() {
        //echo "Test Order";
        //Mage::getModel("aaho_account/restaurant")->setTableStatus(Mage::app()->getRequest());
        if (count($this->getRequest()->getParams()) > 0) {
            $id = $this->getRequest()->getParam("table_id");
            $tableData = array('items'=>$this->getRequest()->getParam("items"),
                               'price'=>$this->getRequest()->getParam("price"),
                               'status'=>$this->getRequest()->getParam("status")
                    );
            $model = Mage::getModel('aaho_account/restaurant')->load($id,"table_no")->addData($tableData);
            try {
                $model->setId($id)->save();
                echo "record updated successfully.";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
    
    public function placeOrderAction() {
        //echo "Test Order";
        //Mage::getModel("aaho_account/restaurant")->setTableStatus(Mage::app()->getRequest());
        if (count($this->getRequest()->getParams()) > 0) {
            $id = $this->getRequest()->getParam("table_id");
            $tableData = array(
                        'table_no'=>$this->getRequest()->getParam("table_id"),
                        'items'=>$this->getRequest()->getParam("items"),
                        'price'=>$this->getRequest()->getParam("price"),
                        'status'=>$this->getRequest()->getParam("status")
                    );
            $model = Mage::getModel('aaho_account/order')->addData($tableData);
            try {
                $model->setId($id)->save();
                echo "record updated successfully.";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}