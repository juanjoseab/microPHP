<?php
class acl extends OrmClass{
    	protected $_datasource = "acl";	public $id = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'auto_increment' => TRUE, 'val'=>''); 	public $name = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	public $login = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	public $pws = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	public $role = Array ('type' => 'enum', 'values' => array('admin','developer','client',''), 'null' =>  'NO', 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setId($var){
                $this->id['val'] = $var;
             }	function getId(){
                return $this->id['val'];
             }	function setName($var){
                $this->name['val'] = $var;
             }	function getName(){
                return $this->name['val'];
             }	function setLogin($var){
                $this->login['val'] = $var;
             }	function getLogin(){
                return $this->login['val'];
             }	function setPws($var){
                $this->pws['val'] = $var;
             }	function getPws(){
                return $this->pws['val'];
             }	function setRole($var){
                $this->role['val'] = $var;
             }	function getRole(){
                return $this->role['val'];
             }}