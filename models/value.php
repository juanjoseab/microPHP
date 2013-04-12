<?php
class value extends OrmClass{
    	protected $_datasource = "value";	public $id = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'auto_increment' => TRUE, 'val'=>''); 	public $name = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	public $htmlvalue = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	public $field_idField = Array ('type' => 'int', 'null' =>  'NO', 'foreign' => TRUE, 'reference' => 'fieldField', 'val'=>''); 	public $idParentValue = Array ('type' => 'int', 'null' =>  'YES', 'foreign' => TRUE, 'reference' => 'idParentValue', 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setId($var){
                $this->id['val'] = $var;
             }	function getId(){
                return $this->id['val'];
             }	function setName($var){
                $this->name['val'] = $var;
             }	function getName(){
                return $this->name['val'];
             }	function setHtmlvalue($var){
                $this->htmlvalue['val'] = $var;
             }	function getHtmlvalue(){
                return $this->htmlvalue['val'];
             }	function setFieldIdField($var){
                $this->field_idField['val'] = $var;
             }	function getFieldIdField(){
                return $this->field_idField['val'];
             }	function setIdParentValue($var){
                $this->idParentValue['val'] = $var;
             }	function getIdParentValue(){
                return $this->idParentValue['val'];
             }}