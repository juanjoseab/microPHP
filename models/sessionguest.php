<?php
class sessionguest extends OrmClass{
    	protected $_datasource = "sessionguest";	public $idSessionGuest = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setIdSessionGuest($var){
                $this->idSessionGuest['val'] = $var;
             }	function getIdSessionGuest(){
                return $this->idSessionGuest['val'];
             }}