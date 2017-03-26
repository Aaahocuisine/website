<?php
/**
 * Aaho Extension
 *
 * @category   Aaho
 * @package    Aaho_Account
 * @author     Ashok Kumar Mishra <ashokmishra.cpp@gmail.com>
 */

class Aaho_Account_Model_Mysql4_Order_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract {

    /**
     * Constructor method
     */
    protected function _construct() {
        parent::_construct();
        $this->_init('aaho_account/order');
    }
    
}