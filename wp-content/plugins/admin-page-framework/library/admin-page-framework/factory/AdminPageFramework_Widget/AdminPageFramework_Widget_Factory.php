<?php
/**
 Admin Page Framework v3.5.5 by Michael Uno
 Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
 <http://en.michaeluno.jp/admin-page-framework>
 Copyright (c) 2013-2015, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT>
 */
class AdminPageFramework_Widget_Factory extends WP_Widget {
    public function __construct($oCaller, $sWidgetTitle, array $aArguments = array()) {
        $aArguments = $aArguments + array('classname' => 'admin_page_framework_widget', 'description' => '',);
        parent::__construct($oCaller->oProp->sClassName, $sWidgetTitle, $aArguments);
        $this->oCaller = $oCaller;
    }
    public function widget($aArguments, $aFormData) {
        echo $aArguments['before_widget'];
        $_sTitle = apply_filters('widget_title', isset($aFormData['title']) ? $aFormData['title'] : '', $aFormData, $this->id_base);
        if ($_sTitle) {
            echo $aArguments['before_title'] . $_sTitle . $aArguments['after_title'];
        }
        $this->oCaller->oUtil->addAndDoActions($this->oCaller, 'do_' . $this->oCaller->oProp->sClassName, $this->oCaller);
        echo $this->oCaller->oUtil->addAndApplyFilters($this->oCaller, "content_{$this->oCaller->oProp->sClassName}", $this->oCaller->content('', $aArguments, $aFormData), $aArguments, $aFormData);
        echo $aArguments['after_widget'];
    }
    public function update($aSubmittedFormData, $aSavedFormData) {
        return $this->oCaller->oUtil->addAndApplyFilters($this->oCaller, "validation_{$this->oCaller->oProp->sClassName}", call_user_func_array(array($this->oCaller, 'validate'), array($aSubmittedFormData, $aSavedFormData, $this->oCaller)), $aSavedFormData, $this->oCaller);
    }
    public function form($aFormData) {
        $this->oCaller->load($this->oCaller);
        $this->oCaller->oUtil->addAndDoActions($this->oCaller, 'load_' . $this->oCaller->oProp->sClassName, $this->oCaller);
        $this->oCaller->_registerFormElements($aFormData);
        $this->oCaller->oProp->aFieldCallbacks = array('hfID' => array($this, 'get_field_id'), 'hfTagID' => array($this, 'get_field_id'), 'hfName' => array($this, 'get_field_name'),);
        $this->oCaller->_printWidgetForm();
        $this->oCaller->oForm = new AdminPageFramework_FormElement($this->oCaller->oProp->sFieldsType, $this->oCaller->oProp->sCapability, $this->oCaller);
    }
    public function _replyToAddClassSelector($sClassSelectors) {
        $sClassSelectors.= ' widefat';
        return trim($sClassSelectors);
    }
}