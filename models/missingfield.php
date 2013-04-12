<?php
class missingfield extends OrmClass{
    	protected $_datasource = "missingfield";	public $idMissingField = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'auto_increment' => TRUE, 'val'=>''); 	public $user_idUser = Array ('type' => 'int', 'null' =>  'NO', 'foreign' => TRUE, 'reference' => 'userUser', 'val'=>''); 	public $fieldByApp_idEventAttribute = Array ('type' => 'int', 'null' =>  'NO', 'foreign' => TRUE, 'reference' => 'fieldByAppEventAttribute', 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setIdMissingField($var){
                $this->idMissingField['val'] = $var;
             }	function getIdMissingField(){
                return $this->idMissingField['val'];
             }	function setUserIdUser($var){
                $this->user_idUser['val'] = $var;
             }	function getUserIdUser(){
                return $this->user_idUser['val'];
             }	function setFieldByAppIdEventAttribute($var){
                $this->fieldByApp_idEventAttribute['val'] = $var;
             }	function getFieldByAppIdEventAttribute(){
                return $this->fieldByApp_idEventAttribute['val'];
             }}