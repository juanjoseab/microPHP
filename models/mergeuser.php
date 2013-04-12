<?php
class mergeuser extends OrmClass{
    	protected $_datasource = "mergeuser";	public $disabled = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $user_idUser = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'val'=>''); 	public $user_idUser1 = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setDisabled($var){
                $this->disabled['val'] = $var;
             }	function getDisabled(){
                return $this->disabled['val'];
             }	function setUserIdUser($var){
                $this->user_idUser['val'] = $var;
             }	function getUserIdUser(){
                return $this->user_idUser['val'];
             }	function setUserIdUser1($var){
                $this->user_idUser1['val'] = $var;
             }	function getUserIdUser1(){
                return $this->user_idUser1['val'];
             }}