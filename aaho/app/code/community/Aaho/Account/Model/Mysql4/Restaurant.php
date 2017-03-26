<?php
/**
 * Aaho Extension
 *
 * @category   Aaho
 * @package    Aaho_Account
 * @author     Ashok Kumar Mishra <ashokmishra.cpp@gmail.com>
 */
class Aaho_Account_Model_Mysql4_Restaurant extends Mage_Core_Model_Mysql4_Abstract {
    /**
     * Initialize resource model
     */
    protected function _construct() {
      $this->_init('aaho_account/restaurant', 'id');
    }
    public function loadByField(NameSpace_YourModule_Model_YourModel $Object, $fieldvalue)
    {
      $adapter = $this->_getReadAdapter();
      $bind    = array('fieldname' => $fieldvalue);
      $select  = $adapter->select()
          ->from($this->getMainTable(), 'tablePrimaryKey')
          ->where('fieldname = :fieldname');

      $modelId = $adapter->fetchOne($select, $bind);
      if ($modelId) {
        $this->load($Object, $modelId );
      } else {
        $Object->setData(array());
      }

      return $this;
    }
  }
