<?php
class groupHash extends OrmClass{
    	protected $_datasource = "groupHash";	public $hash = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	public $description = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	public $idHash = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'auto_increment' => TRUE, 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setHash($var){
                $this->hash['val'] = $var;
             }	function getHash(){
                return $this->hash['val'];
             }	function setDescription($var){
                $this->description['val'] = $var;
             }	function getDescription(){
                return $this->description['val'];
             }	function setIdHash($var){
                $this->idHash['val'] = $var;
             }	function getIdHash(){
                return $this->idHash['val'];
             }}