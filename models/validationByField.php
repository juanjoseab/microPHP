<?php
class validationByField extends OrmClass{
    	protected $_datasource = "validationByField";	public $idValidationByField = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'auto_increment' => TRUE, 'val'=>''); 	public $validation_idValidation = Array ('type' => 'int', 'null' =>  'NO', 'foreign' => TRUE, 'reference' => 'validationValidation', 'val'=>''); 	public $fieldByApp_idEventAttribute = Array ('type' => 'int', 'null' =>  'NO', 'foreign' => TRUE, 'reference' => 'fieldByAppEventAttribute', 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setIdValidationByField($var){
                $this->idValidationByField['val'] = $var;
             }	function getIdValidationByField(){
                return $this->idValidationByField['val'];
             }	function setValidationIdValidation($var){
                $this->validation_idValidation['val'] = $var;
             }	function getValidationIdValidation(){
                return $this->validation_idValidation['val'];
             }	function setFieldByAppIdEventAttribute($var){
                $this->fieldByApp_idEventAttribute['val'] = $var;
             }	function getFieldByAppIdEventAttribute(){
                return $this->fieldByApp_idEventAttribute['val'];
             }}