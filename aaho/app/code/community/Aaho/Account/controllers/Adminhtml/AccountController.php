<?php
/**
 * Aaho Extension
 *
 * @category   Aaho
 * @package    Aaho_Account
 * @author     Ashok Kumar Mishra <ashokmishra.cpp@gmail.com>
 */

class Aaho_Account_Adminhtml_AccountController extends Mage_Adminhtml_Controller_Action
{
    public function restaurantAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('account')
            ->_title($this->__('Restaurant Action'));

        $this->_addContent($this->getLayout()->createBlock('aaho_account/restaurant'));

        $this->renderLayout();
    }
	public function accountAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('account')
            ->_title($this->__('Account Action'));

        // my stuff

        $this->renderLayout();
    }
}