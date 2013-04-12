<?php
class htmlAttribute extends OrmClass{
    	protected $_datasource = "htmlAttribute";	public $idHtmlAttribute = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'auto_increment' => TRUE, 'val'=>''); 	public $name = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setIdHtmlAttribute($var){
                $this->idHtmlAttribute['val'] = $var;
             }	function getIdHtmlAttribute(){
                return $this->idHtmlAttribute['val'];
             }	function setName($var){
                $this->name['val'] = $var;
             }	function getName(){
                return $this->name['val'];
             }}