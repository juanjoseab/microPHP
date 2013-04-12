<?php
class field extends OrmClass{
    	protected $_datasource = "field";	public $idField = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'auto_increment' => TRUE, 'val'=>''); 	public $name = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	public $label = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	public $isValidated = Array ('type' => 'tinyint', 'null' =>  'NO', 'val'=>''); 	public $description = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	public $idHtmlTagByField = Array ('type' => 'int', 'null' =>  'NO', 'foreign' => TRUE, 'reference' => 'idHtmlTagByField', 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setIdField($var){
                $this->idField['val'] = $var;
             }	function getIdField(){
                return $this->idField['val'];
             }	function setName($var){
                $this->name['val'] = $var;
             }	function getName(){
                return $this->name['val'];
             }	function setLabel($var){
                $this->label['val'] = $var;
             }	function getLabel(){
                return $this->label['val'];
             }	function setIsValidated($var){
                $this->isValidated['val'] = $var;
             }	function getIsValidated(){
                return $this->isValidated['val'];
             }	function setDescription($var){
                $this->description['val'] = $var;
             }	function getDescription(){
                return $this->description['val'];
             }	function setIdHtmlTagByField($var){
                $this->idHtmlTagByField['val'] = $var;
             }	function getIdHtmlTagByField(){
                return $this->idHtmlTagByField['val'];
             }}