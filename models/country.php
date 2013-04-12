<?php
class country extends OrmClass{
    	protected $_datasource = "country";	public $idPais = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'auto_increment' => TRUE, 'val'=>''); 	public $name = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setIdPais($var){
                $this->idPais['val'] = $var;
             }	function getIdPais(){
                return $this->idPais['val'];
             }	function setName($var){
                $this->name['val'] = $var;
             }	function getName(){
                return $this->name['val'];
             }}