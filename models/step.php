<?php
class step extends OrmClass{
    	protected $_datasource = "step";	public $idLevel = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'auto_increment' => TRUE, 'val'=>''); 	public $description = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	public $valueLevel = Array ('type' => 'int', 'null' =>  'YES', 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setIdLevel($var){
                $this->idLevel['val'] = $var;
             }	function getIdLevel(){
                return $this->idLevel['val'];
             }	function setDescription($var){
                $this->description['val'] = $var;
             }	function getDescription(){
                return $this->description['val'];
             }	function setValueLevel($var){
                $this->valueLevel['val'] = $var;
             }	function getValueLevel(){
                return $this->valueLevel['val'];
             }}