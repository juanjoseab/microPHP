<?php
class user extends OrmClass{
    	protected $_datasource = "user";	public $idUser = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'auto_increment' => TRUE, 'val'=>''); 	public $userName = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	public $ssoIdUser = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	public $ssoId = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	public $email = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	public $idFacebook = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	public $fechaIngreso = Array ('type' => '', 'null' =>  'YES', 'val'=>''); 	public $fechaActualizacion = Array ('type' => '', 'null' =>  'YES', 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setIdUser($var){
                $this->idUser['val'] = $var;
             }	function getIdUser(){
                return $this->idUser['val'];
             }	function setUserName($var){
                $this->userName['val'] = $var;
             }	function getUserName(){
                return $this->userName['val'];
             }	function setSsoIdUser($var){
                $this->ssoIdUser['val'] = $var;
             }	function getSsoIdUser(){
                return $this->ssoIdUser['val'];
             }	function setSsoId($var){
                $this->ssoId['val'] = $var;
             }	function getSsoId(){
                return $this->ssoId['val'];
             }	function setEmail($var){
                $this->email['val'] = $var;
             }	function getEmail(){
                return $this->email['val'];
             }	function setIdFacebook($var){
                $this->idFacebook['val'] = $var;
             }	function getIdFacebook(){
                return $this->idFacebook['val'];
             }	function setFechaIngreso($var){
                $this->fechaIngreso['val'] = $var;
             }	function getFechaIngreso(){
                return $this->fechaIngreso['val'];
             }	function setFechaActualizacion($var){
                $this->fechaActualizacion['val'] = $var;
             }	function getFechaActualizacion(){
                return $this->fechaActualizacion['val'];
             }}