<?php
class appbyacl extends OrmClass{
    	protected $_datasource = "appbyacl";	public $app = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'val'=>''); 	public $acl = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setApp($var){
                $this->app['val'] = $var;
             }	function getApp(){
                return $this->app['val'];
             }	function setAcl($var){
                $this->acl['val'] = $var;
             }	function getAcl(){
                return $this->acl['val'];
             }}