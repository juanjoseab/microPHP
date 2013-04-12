<?php
class htmltag_has_field extends OrmClass{
    	protected $_datasource = "htmltag_has_field";	public $htmltag_idhtmltag = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'val'=>''); 	public $field_idField = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'val'=>''); 	public $fieldByApp_idEventAttribute = Array ('type' => 'int', 'null' =>  'YES', 'foreign' => TRUE, 'reference' => 'fieldByAppEventAttribute', 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setHtmltagIdhtmltag($var){
                $this->htmltag_idhtmltag['val'] = $var;
             }	function getHtmltagIdhtmltag(){
                return $this->htmltag_idhtmltag['val'];
             }	function setFieldIdField($var){
                $this->field_idField['val'] = $var;
             }	function getFieldIdField(){
                return $this->field_idField['val'];
             }	function setFieldByAppIdEventAttribute($var){
                $this->fieldByApp_idEventAttribute['val'] = $var;
             }	function getFieldByAppIdEventAttribute(){
                return $this->fieldByApp_idEventAttribute['val'];
             }}