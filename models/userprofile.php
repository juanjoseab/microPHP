<?php
class userprofile extends OrmClass{
    	protected $_datasource = "userprofile";	public $idUserProfile = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'auto_increment' => TRUE, 'val'=>''); 	public $date = Array ('type' => '', 'null' =>  'YES', 'val'=>''); 	public $value = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	public $idUser = Array ('type' => 'int', 'null' =>  'YES', 'foreign' => TRUE, 'reference' => 'idUser', 'val'=>''); 	public $idEventAttribute = Array ('type' => 'int', 'null' =>  'NO', 'foreign' => TRUE, 'reference' => 'idEventAttribute', 'val'=>''); 	public $idSessionGuest = Array ('type' => 'int', 'null' =>  'YES', 'foreign' => TRUE, 'reference' => 'idSessionGuest', 'val'=>''); 	public $hash_idGroupHash = Array ('type' => 'int', 'null' =>  'YES', 'foreign' => TRUE, 'reference' => 'hashGroupHash', 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setIdUserProfile($var){
                $this->idUserProfile['val'] = $var;
             }	function getIdUserProfile(){
                return $this->idUserProfile['val'];
             }	function setDate($var){
                $this->date['val'] = $var;
             }	function getDate(){
                return $this->date['val'];
             }	function setValue($var){
                $this->value['val'] = $var;
             }	function getValue(){
                return $this->value['val'];
             }	function setIdUser($var){
                $this->idUser['val'] = $var;
             }	function getIdUser(){
                return $this->idUser['val'];
             }	function setIdEventAttribute($var){
                $this->idEventAttribute['val'] = $var;
             }	function getIdEventAttribute(){
                return $this->idEventAttribute['val'];
             }	function setIdSessionGuest($var){
                $this->idSessionGuest['val'] = $var;
             }	function getIdSessionGuest(){
                return $this->idSessionGuest['val'];
             }	function setHashIdGroupHash($var){
                $this->hash_idGroupHash['val'] = $var;
             }	function getHashIdGroupHash(){
                return $this->hash_idGroupHash['val'];
             }}