<?php

/**
 * Aaho Extension
 *
 * @category   Aaho
 * @package    Aaho_Account
 * @author     Ashok Kumar Mishra <ashokmishra.cpp@gmail.com>
 */
class Aaho_Account_Block_Order extends Mage_Core_Block_Template {

    /**
     * Contructor
     */
    public function __construct($attributes = array()) {
        $this->setTemplate("aaho/order.phtml");
    }

    
    public function _toHtml() {
        $fromDate = $this->getFromDate();
        $toDate = $this->getToDate();
        if(empty($fromDate) || empty($toDate)) {
            $fromDate = $toDate = Mage::getModel('core/date')->gmtDate();
        } else {
            $fromDate = Mage::getModel('core/date')->date('d.m.Y', strtotime($fromDate));
            $toDate = Mage::getModel('core/date')->date('d.m.Y', strtotime($toDate));
        }
        $collection = Mage::getModel("aaho_account/order")->getCollection();
        $collection->addfieldtofilter('date', array(array('gteq' => $fromDate, 'lteq' => $toDate)));
        //$collection->addFieldToFilter('*');
        
        $orders = array();
        if (count($collection) > 0) {
            foreach ($collection as $child) {
                $tmp = array();
                $tmp['date'] = $child->getDate();
                $tmp['order_no'] = $child->getOrderNo();
                $tmp['items'] = $child->getItems();
                $tmp['price'] = $child->getPrice();
                array_push($orders, $tmp);
            }
        }

        $this->setOrders($orders);
        return parent::_toHtml();
    }

}
