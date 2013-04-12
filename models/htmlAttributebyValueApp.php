<?php
class htmlAttributebyValueApp extends OrmClass{
    	protected $_datasource = "htmlAttributebyValueApp";	public $idHtmlAttributeByFieldApp = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'auto_increment' => TRUE, 'val'=>''); 	public $value = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	public $htmlattribute_idHtmlAttribute = Array ('type' => 'int', 'null' =>  'NO', 'foreign' => TRUE, 'reference' => 'htmlattributeHtmlAttribute', 'val'=>''); 	public $fieldByApp_idEventAttribute = Array ('type' => 'int', 'null' =>  'YES', 'foreign' => TRUE, 'reference' => 'fieldByAppEventAttribute', 'val'=>''); 	public $value_id = Array ('type' => 'int', 'null' =>  'YES', 'foreign' => TRUE, 'reference' => 'value', 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setIdHtmlAttributeByFieldApp($var){
                $this->idHtmlAttributeByFieldApp['val'] = $var;
             }	function getIdHtmlAttributeByFieldApp(){
                return $this->idHtmlAttributeByFieldApp['val'];
             }	function setValue($var){
                $this->value['val'] = $var;
             }	function getValue(){
                return $this->value['val'];
             }	function setHtmlattributeIdHtmlAttribute($var){
                $this->htmlattribute_idHtmlAttribute['val'] = $var;
             }	function getHtmlattributeIdHtmlAttribute(){
                return $this->htmlattribute_idHtmlAttribute['val'];
             }	function setFieldByAppIdEventAttribute($var){
                $this->fieldByApp_idEventAttribute['val'] = $var;
             }	function getFieldByAppIdEventAttribute(){
                return $this->fieldByApp_idEventAttribute['val'];
             }	function setValueId($var){
                $this->value_id['val'] = $var;
             }	function getValueId(){
                return $this->value_id['val'];
             }}