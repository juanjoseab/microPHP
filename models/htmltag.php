<?php
class htmltag extends OrmClass{
    	protected $_datasource = "htmltag";	public $idhtmltag = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'auto_increment' => TRUE, 'val'=>''); 	public $tag = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setIdhtmltag($var){
                $this->idhtmltag['val'] = $var;
             }	function getIdhtmltag(){
                return $this->idhtmltag['val'];
             }	function setTag($var){
                $this->tag['val'] = $var;
             }	function getTag(){
                return $this->tag['val'];
             }}