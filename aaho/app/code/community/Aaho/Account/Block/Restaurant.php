<?php

/**
 * Aaho Extension
 *
 * @category   Aaho
 * @package    Aaho_Account
 * @author     Ashok Kumar Mishra <ashokmishra.cpp@gmail.com>
 */
class Aaho_Account_Block_Restaurant extends Mage_Core_Block_Template {

    /**
     * Contructor
     */
    public function __construct($attributes = array()) {
        $this->setTemplate("aaho/restaurant.phtml");
    }

    
    public function _toHtml() {
        $collection = Mage::getModel("aaho_account/restaurant")
                ->getCollection();
        //$collection->getSelect()->columns(array('YEAR(created) AS blog_year', 'MONTH(created) AS blog_month', 'COUNT(*) AS blog_total'));
        $collection->addFieldToFilter('status', 1);
        //$collection->getSelect()->group(array('blog_year', 'blog_month'));

        $tables = array();
        if (count($collection) > 0) {
            foreach ($collection as $child) {
                
                /*if (!isset($posts[$child->getBlogYear()])) {
                    $posts[$child->getBlogYear()] = array();
                }*/
                $tmp = array();
                $tmp['table_no'] = $child->getTableNo();
                $tmp['items'] = $child->getItems();
                $tmp['price'] = $child->getPrice();
                array_push($tables, $tmp);
                //$posts[$child->getBlogYear()][] = $tmp;
            }
        }

        //$this->assign('tables', $tables);
        $this->setTables($tables);
        return parent::_toHtml();
    }

}
