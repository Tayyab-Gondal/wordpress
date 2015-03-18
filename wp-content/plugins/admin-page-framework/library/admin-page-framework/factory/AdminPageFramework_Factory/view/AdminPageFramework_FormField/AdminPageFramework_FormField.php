<?php
/**
 Admin Page Framework v3.5.5 by Michael Uno
 Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
 <http://en.michaeluno.jp/admin-page-framework>
 Copyright (c) 2013-2015, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT>
 */
class AdminPageFramework_FormField extends AdminPageFramework_FormField_FieldDefinition {
    private function _isSectionSet(array $aField) {
        return isset($aField['section_id']) && $aField['section_id'] && '_default' !== $aField['section_id'];
    }
    private function _getInputName(array $aField, $sKey = '', $hfFilterCallback = null) {
        $_sKey = ( string )$sKey;
        $_sKey = $this->getAOrB('0' !== $_sKey && empty($_sKey), '', "[{$_sKey}]");
        $_sSectionIndex = isset($aField['section_id'], $aField['_section_index']) ? "[{$aField['_section_index']}]" : "";
        $_aMethodNamesByFieldsType = array('page' => '_getInputName_page', 'page_meta_box' => '_getInputName_meta_box', 'post_meta_box' => '_getInputName_meta_box', 'taxonomy' => '_getInputName_taxonomy', 'widget' => '_getInputName_widget', 'user_meta' => '_getInputName_user_meta',);
        $_sMethodName = isset($_aMethodNamesByFieldsType[$aField['_fields_type']]) ? $_aMethodNamesByFieldsType[$aField['_fields_type']] : '_getInputName_page';
        $_sResultTail = '';
        $_sNameAttribute = $this->{$_sMethodName}($aField, $_sKey, $_sSectionIndex, $_sResultTail);
        return is_callable($hfFilterCallback) ? call_user_func_array($hfFilterCallback, array($_sNameAttribute)) . $_sResultTail : $_sNameAttribute . $_sResultTail;
    }
    private function _getInputName_page(array $aField, $_sKey, $_sSectionIndex, &$_sResultTail) {
        $_sResultTail = '';
        $_sSectionDimension = $this->_isSectionSet($aField) ? "[{$aField['section_id']}]" : '';
        return "{$aField['option_key']}{$_sSectionDimension}{$_sSectionIndex}[{$aField['field_id']}]{$_sKey}";
    }
    private function _getInputName_meta_box(array $aField, $_sKey, $_sSectionIndex, &$_sResultTail) {
        $_sResultTail = '';
        return $this->_isSectionSet($aField) ? "{$aField['section_id']}{$_sSectionIndex}[{$aField['field_id']}]{$_sKey}" : "{$aField['field_id']}{$_sKey}";
    }
    private function _getInputName_taxonomy(array $aField, $_sKey, $_sSectionIndex, &$_sResultTail) {
        $_sResultTail = $_sSectionIndex = '';
        return "{$aField['field_id']}{$_sKey}";
    }
    private function _getInputName_widget(array $aField, $_sKey, $_sSectionIndex, &$_sResultTail) {
        $_sResultTail = $_sKey;
        return $this->_isSectionSet($aField) ? "{$aField['section_id']}]{$_sSectionIndex}[{$aField['field_id']}" : "{$aField['field_id']}";
    }
    private function _getInputName_user_meta(array $aField, $_sKey, $_sSectionIndex, &$_sResultTail) {
        $_sResultTail = $_sKey;
        return $this->_isSectionSet($aField) ? "{$aField['section_id']}{$_sSectionIndex}[{$aField['field_id']}]" : "{$aField['field_id']}";
    }
    protected function _getFlatInputName(array $aField, $sKey = '', $hfFilterCallback = null) {
        $_sKey = ( string )$sKey;
        $_sKey = $this->getAOrB('0' !== $_sKey && empty($_sKey), '', "|{$_sKey}");
        $_sSectionIndex = isset($aField['section_id'], $aField['_section_index']) ? "|{$aField['_section_index']}" : "";
        $_aMethodNamesByFieldsType = array('page' => '_getFlatInputName_page', 'page_meta_box' => '_getFlatInputName_meta_box', 'post_meta_box' => '_getFlatInputName_meta_box', 'taxonomy' => '_getFlatInputName_taxonomy', 'widget' => '_getFlatInputName_other', 'user_meta' => '_getFlatInputName_other',);
        $_sMethodName = isset($_aMethodNamesByFieldsType[$aField['_fields_type']]) ? $_aMethodNamesByFieldsType[$aField['_fields_type']] : '_getInputName_page';
        $_sResultTail = '';
        $_sFlatNameAttribute = $this->{$_sMethodName}($aField, $_sKey, $_sSectionIndex, $_sResultTail);
        return is_callable($hfFilterCallback) ? call_user_func_array($hfFilterCallback, array($_sFlatNameAttribute)) . $_sResultTail : $_sFlatNameAttribute . $_sResultTail;
    }
    private function _getFlatInputName_page(array $aField, $_sKey, $_sSectionIndex, &$_sResultTail) {
        $_sResultTail = '';
        $_sSectionDimension = $this->_isSectionSet($aField) ? "|{$aField['section_id']}" : '';
        return "{$aField['option_key']}{$_sSectionDimension}{$_sSectionIndex}|{$aField['field_id']}{$_sKey}";
    }
    private function _getFlatInputName_meta_box(array $aField, $_sKey, $_sSectionIndex, &$_sResultTail) {
        $_sResultTail = '';
        return $this->_isSectionSet($aField) ? "{$aField['section_id']}{$_sSectionIndex}|{$aField['field_id']}{$_sKey}" : "{$aField['field_id']}{$_sKey}";
    }
    private function _getFlatInputName_taxonomy(array $aField, $_sKey, $_sSectionIndex, &$_sResultTail) {
        $_sSectionIndex = $_sResultTail = '';
        return "{$aField['field_id']}{$_sKey}";
    }
    private function _getFlatInputName_other(array $aField, $_sKey, $_sSectionIndex, &$_sResultTail) {
        $_sResultTail = $_sKey;
        return $this->_isSectionSet($aField) ? "{$aField['section_id']}{$_sSectionIndex}|{$aField['field_id']}" : "{$aField['field_id']}";
    }
    static public function _getInputID($aField, $isIndex = 0, $hfFilterCallback = null) {
        $_sSectionIndex = isset($aField['_section_index']) ? '__' . $aField['_section_index'] : '';
        $_isFieldIndex = '__' . $isIndex;
        $_sResult = isset($aField['section_id']) && '_default' != $aField['section_id'] ? $aField['section_id'] . $_sSectionIndex . '_' . $aField['field_id'] . $_isFieldIndex : $aField['field_id'] . $_isFieldIndex;
        return is_callable($hfFilterCallback) ? call_user_func_array($hfFilterCallback, array($_sResult)) : $_sResult;
    }
    static public function _getInputTagBaseID($aField, $hfFilterCallback = null) {
        $_sSectionIndex = isset($aField['_section_index']) ? '__' . $aField['_section_index'] : '';
        $_sResult = isset($aField['section_id']) && '_default' != $aField['section_id'] ? $aField['section_id'] . $_sSectionIndex . '_' . $aField['field_id'] : $aField['field_id'];
        return is_callable($hfFilterCallback) ? call_user_func_array($hfFilterCallback, array($_sResult)) : $_sResult;
    }
    public function _getFieldOutput() {
        $_aFieldsOutput = array();
        $_sFieldError = $this->_getFieldError($this->aErrors, $this->aField['section_id'], $this->aField['field_id']);
        if ('' !== $_sFieldError) {
            $_aFieldsOutput[] = $_sFieldError;
        }
        $this->aField['tag_id'] = $this->_getInputTagBaseID($this->aField, $this->aCallbacks['hfTagID']);
        $_aFields = $this->_constructFieldsArray($this->aField, $this->aOptions);
        $_aFieldsOutput[] = $this->_getFieldsOutput($_aFields, $this->aCallbacks);
        return $this->_getFinalOutput($this->aField, $_aFieldsOutput, count($_aFields));
    }
    private function _getFieldsOutput(array $aFields, array $aCallbacks = array()) {
        $_aOutput = array();
        foreach ($aFields as $_isIndex => $_aField) {
            $_aOutput[] = $this->_getEachFieldOutput($_aField, $_isIndex, $aCallbacks, $this->isLastElement($aFields, $_isIndex));
        }
        return implode(PHP_EOL, array_filter($_aOutput));
    }
    private function _getEachFieldOutput(array $aField, $isIndex, array $aCallbacks, $bIsLastElement = false) {
        $_aFieldTypeDefinition = $this->_getFieldTypeDefinition($aField['type']);
        if (!is_callable($_aFieldTypeDefinition['hfRenderField'])) {
            return '';
        }
        $aField = $this->_getFormatedFieldDefinitionArray($aField, $isIndex, $aCallbacks, $_aFieldTypeDefinition);
        $_aFieldAttributes = $this->_getFieldAttributes($aField);
        return $aField['before_field'] . "<div " . $this->_getFieldContainerAttributes($aField, $_aFieldAttributes, 'field') . ">" . call_user_func_array($_aFieldTypeDefinition['hfRenderField'], array($aField)) . $this->_getDelimiter($aField, $bIsLastElement) . "</div>" . $aField['after_field'];
    }
    private function _getFieldTypeDefinition($sFieldTypeSlug) {
        return $this->getElement($this->aFieldTypeDefinitions, $sFieldTypeSlug, $this->aFieldTypeDefinitions['default']);
    }
    private function _getFormatedFieldDefinitionArray(array $aField, $isIndex, array $aCallbacks, $aFieldTypeDefinition) {
        $_bIsSubField = is_numeric($isIndex) && 0 < $isIndex;
        $aField['_is_sub_field'] = $_bIsSubField;
        $aField['_index'] = $isIndex;
        $aField['input_id'] = $this->_getInputID($aField, $isIndex, $aCallbacks['hfID']);
        $aField['_input_name'] = $this->_getInputName($aField, $this->getAOrB($aField['_is_multiple_fields'], $isIndex, ''), $aCallbacks['hfName']);
        $aField['_input_name_flat'] = $this->_getFlatInputName($aField, $this->getAOrB($aField['_is_multiple_fields'], $isIndex, ''), $aCallbacks['hfNameFlat']);
        $aField['_field_container_id'] = "field-{$aField['input_id']}";
        $aField['_input_id_model'] = $this->_getInputID($aField, '-fi-', $aCallbacks['hfID']);
        $aField['_input_name_model'] = $this->_getInputName($aField, $aField['_is_multiple_fields'] ? '-fi-' : '', $aCallbacks['hfName']);
        $aField['_fields_container_id_model'] = "field-{$aField['_input_id_model']}";
        $aField['_fields_container_id'] = "fields-{$this->aField['tag_id']}";
        $aField['_fieldset_container_id'] = "fieldset-{$this->aField['tag_id']}";
        $aField = $this->uniteArrays($aField, array('attributes' => array('id' => $aField['input_id'], 'name' => $aField['_input_name'], 'value' => $aField['value'], 'type' => $aField['type'], 'disabled' => null, 'data-id_model' => $aField['_input_id_model'], 'data-name_model' => $aField['_input_name_model'],)), ( array )$aFieldTypeDefinition['aDefaultKeys']);
        $aField['attributes']['class'] = 'widget' === $aField['_fields_type'] && is_callable($aCallbacks['hfClass']) ? call_user_func_array($aCallbacks['hfClass'], array($aField['attributes']['class'])) : $aField['attributes']['class'];
        $aField['attributes']['class'] = $this->generateClassAttribute($aField['attributes']['class'], $this->dropElementsByType($aField['class']));
        return $aField;
    }
    private function _getFieldAttributes(array $aField) {
        return array('id' => $aField['_field_container_id'], 'data-type' => "{$aField['type']}", 'data-id_model' => $aField['_fields_container_id_model'], 'class' => "admin-page-framework-field admin-page-framework-field-{$aField['type']}" . $this->getAOrB($aField['attributes']['disabled'], ' disabled', '') . $this->getAOrB($aField['_is_sub_field'], ' admin-page-framework-subfield', ''));
    }
    private function _getDelimiter(array $aField, $bIsLastElement) {
        return $aField['delimiter'] ? "<div " . $this->generateAttributes(array('class' => 'delimiter', 'id' => "delimiter-{$aField['input_id']}", 'style' => $this->getAOrB($bIsLastElement, "display:none;", ""),)) . ">" . $aField['delimiter'] . "</div>" : '';
    }
    private function _getFinalOutput(array $aField, array $aFieldsOutput, $iFieldsCount) {
        $_aFieldsSetAttributes = array('id' => 'fieldset-' . $aField['tag_id'], 'class' => 'admin-page-framework-fieldset', 'data-field_id' => $aField['tag_id'],);
        $_aFieldsContainerAttributes = array('id' => 'fields-' . $aField['tag_id'], 'class' => 'admin-page-framework-fields' . $this->getAOrB($aField['repeatable'], ' repeatable', '') . $this->getAOrB($aField['sortable'], ' sortable', ''), 'data-type' => $aField['type'],);
        return $aField['before_fieldset'] . "<fieldset " . $this->_getFieldContainerAttributes($aField, $_aFieldsSetAttributes, 'fieldset') . ">" . "<div " . $this->_getFieldContainerAttributes($aField, $_aFieldsContainerAttributes, 'fields') . ">" . $aField['before_fields'] . implode(PHP_EOL, $aFieldsOutput) . $aField['after_fields'] . "</div>" . $this->_getExtras($aField, $iFieldsCount) . "</fieldset>" . $aField['after_fieldset'];
    }
    private function _getExtras($aField, $iFieldsCount) {
        $_aOutput = array();
        if (isset($aField['description'])) {
            $_aOutput[] = $this->_getDescriptions($aField['description'], 'admin-page-framework-fields-description');
        }
        $_aOutput[] = $this->_getFieldScripts($aField, $iFieldsCount);
        return implode(PHP_EOL, $_aOutput);
    }
    private function _getFieldScripts($aField, $iFieldsCount) {
        $_aOutput = array();
        $_aOutput[] = $aField['repeatable'] ? $this->_getRepeaterFieldEnablerScript('fields-' . $aField['tag_id'], $iFieldsCount, $aField['repeatable']) : '';
        $_aOutput[] = $aField['sortable'] && ($iFieldsCount > 1 || $aField['repeatable']) ? $this->_getSortableFieldEnablerScript('fields-' . $aField['tag_id']) : '';
        return implode(PHP_EOL, $_aOutput);
    }
    private function _getFieldError($aErrors, $sSectionID, $sFieldID) {
        if ($this->_hasFieldErrorsOfSection($aErrors, $sSectionID, $sFieldID)) {
            return "<span class='field-error'>*&nbsp;{$this->aField['error_message']}" . $aErrors[$sSectionID][$sFieldID] . "</span>";
        }
        if ($this->_hasFieldError($aErrors, $sFieldID)) {
            return "<span class='field-error'>*&nbsp;{$this->aField['error_message']}" . $aErrors[$sFieldID] . "</span>";
        }
        return '';
    }
    private function _hasFieldErrorsOfSection($aErrors, $sSectionID, $sFieldID) {
        return (isset($aErrors[$sSectionID], $aErrors[$sSectionID][$sFieldID]) && is_array($aErrors[$sSectionID]) && !is_array($aErrors[$sSectionID][$sFieldID]));
    }
    private function _hasFieldError($aErrors, $sFieldID) {
        return (isset($aErrors[$sFieldID]) && !is_array($aErrors[$sFieldID]));
    }
}