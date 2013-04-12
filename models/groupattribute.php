<?php
class groupattribute extends OrmClass{
    	protected $_datasource = "groupattribute";	public $idGroupAttribute = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'auto_increment' => TRUE, 'val'=>''); 	public $name = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	public $idGroupAttributeParent = Array ('type' => 'int', 'null' =>  'YES', 'foreign' => TRUE, 'reference' => 'idGroupAttributeParent', 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setIdGroupAttribute($var){
                $this->idGroupAttribute['val'] = $var;
             }	function getIdGroupAttribute(){
                return $this->idGroupAttribute['val'];
             }	function setName($var){
                $this->name['val'] = $var;
             }	function getName(){
                return $this->name['val'];
             }	function setIdGroupAttributeParent($var){
                $this->idGroupAttributeParent['val'] = $var;
             }	function getIdGroupAttributeParent(){
                return $this->idGroupAttributeParent['val'];
             }}