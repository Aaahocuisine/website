<?php
/******************************************************
 * @package Ves Tempcp module for Magento 1.4.x.x and Magento 1.7.x.x
 * @version 1.0.0.1
 * @author http://landofcoder.com
 * @copyright   Copyright (C) December 2010 LandOfCoder.com <@emai:landofcoder@gmail.com>.All rights reserved.
 * @license     GNU General Public License version 2
*******************************************************/
?>
<?php
class Ves_Tempcp_Block_Adminhtml_Theme_Customize extends Mage_Adminhtml_Block_Widget_Form_Container
{
    var $params = null;
    public function __construct()
    {
        $this->_blockGroup  = 'ves_tempcp';
        $this->_objectId    = 'ves_tempcp_id';
        $this->_controller  = 'adminhtml_tempcp';
        $this->_mode        = 'customize';

        $this->_updateButton('save', 'label', Mage::helper('ves_tempcp')->__('Save Theme'));
        $this->_updateButton('delete', 'label', Mage::helper('ves_tempcp')->__('Delete Theme'));

        $this->setTemplate('ves_tempcp/customize.phtml');
        
        $mediaHelper = Mage::helper('ves_tempcp/media');
        $mediaHelper->loadMediaLiveEdit();

        $themeHelper = Mage::helper('ves_tempcp/theme');

        $this->data = $themeHelper->initTheme();
    }


    protected function _prepareLayout() {
        return parent::_prepareLayout();
    }

    public function getThemeData(){
        return $this->data;
    }

    /**
     *
     */
    public function getFileList( $path , $e=null ) {
        $output = array(); 
        $directories = glob( $path.'*'.$e );
        foreach( $directories as $dir ){
            $output[] = basename( $dir );
        }           
         
        return $output;
    }
    public function getParam($name, $default = ""){
        return isset($this->params[$name])?$this->params['name']: $default;
    }

    public function getParams() {
        return $this->params;
    }
    
    public function getLiveEditLink(){
        $group = Mage::registry('theme_data')->get('group');
        $theme_id = Mage::registry('theme_data')->get('theme_id');
        return $this->getUrl('*/adminhtml_theme/saveCustomize', array("id"=>$theme_id, "theme"=>$group));
    }
    public function getCustomizeFolderURL() {
        $group = Mage::registry('theme_data')->get('group');
        $tmp_theme = explode("/", $group);
        if(count($tmp_theme) == 1) {
            $group = "default/".$group;
        }

        return $this->getSiteURL()."skin/frontend/".$group."/css/customize/";
    }
    public function getSiteURL() {
        $stores = $this->getThemeData()->get("store_id");
        $base_url = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB);
        if($stores ) {
            foreach($stores as $storeId) {
                if($storeId) {
                    $tmp_base_url = Mage::app()->getStore($storeId)->getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB);
                    if($tmp_base_url != $base_url) {
                        $base_url = $tmp_base_url;
                        break;
                    }
                }
            }
        }
        return $base_url;
    }

    public function getHeaderText()
    {
        return Mage::helper('ves_tempcp')->__("Live Customizing Theme");
    }

    
    public function getBackLink(){
        $theme_id = Mage::registry('theme_data')->get('theme_id');
        return $this->getUrl('*/adminhtml_theme/edit', array("id"=>$theme_id));
    }
   
}