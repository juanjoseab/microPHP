<?php
class company extends OrmClass{
    	protected $_datasource = "company";	public $idCompany = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'auto_increment' => TRUE, 'val'=>''); 	public $name = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	public $address = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	public $phone = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	public $nit = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	public $comments = Array ('type' => '', 'null' =>  'YES', 'val'=>''); 	public $alias = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	public $id_country = Array ('type' => 'int', 'null' =>  'NO', 'foreign' => TRUE, 'reference' => 'id_country', 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setIdCompany($var){
                $this->idCompany['val'] = $var;
             }	function getIdCompany(){
                return $this->idCompany['val'];
             }	function setName($var){
                $this->name['val'] = $var;
             }	function getName(){
                return $this->name['val'];
             }	function setAddress($var){
                $this->address['val'] = $var;
             }	function getAddress(){
                return $this->address['val'];
             }	function setPhone($var){
                $this->phone['val'] = $var;
             }	function getPhone(){
                return $this->phone['val'];
             }	function setNit($var){
                $this->nit['val'] = $var;
             }	function getNit(){
                return $this->nit['val'];
             }	function setComments($var){
                $this->comments['val'] = $var;
             }	function getComments(){
                return $this->comments['val'];
             }	function setAlias($var){
                $this->alias['val'] = $var;
             }	function getAlias(){
                return $this->alias['val'];
             }	function setIdCountry($var){
                $this->id_country['val'] = $var;
             }	function getIdCountry(){
                return $this->id_country['val'];
             }}