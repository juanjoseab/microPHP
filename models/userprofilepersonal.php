<?php
class userprofilepersonal extends OrmClass{
    	protected $_datasource = "userprofilepersonal";	public $idUserProfilePersonal = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'auto_increment' => TRUE, 'val'=>''); 	public $user_idUser = Array ('type' => 'int', 'null' =>  'NO', 'foreign' => TRUE, 'reference' => 'userUser', 'val'=>''); 	public $fieldByApp_idEventAttribute = Array ('type' => 'int', 'null' =>  'NO', 'foreign' => TRUE, 'reference' => 'fieldByAppEventAttribute', 'val'=>''); 	public $date = Array ('type' => '', 'null' =>  'NO', 'default' => 'CURRENT_TIMESTAMP', 'val'=>''); 	public $value = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	public $idSessionGuest = Array ('type' => 'int', 'null' =>  'YES', 'foreign' => TRUE, 'reference' => 'idSessionGuest', 'val'=>''); 	public $linked_hash = Array ('type' => 'int', 'null' =>  'YES', 'foreign' => TRUE, 'reference' => 'linked_hash', 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setIdUserProfilePersonal($var){
                $this->idUserProfilePersonal['val'] = $var;
             }	function getIdUserProfilePersonal(){
                return $this->idUserProfilePersonal['val'];
             }	function setUserIdUser($var){
                $this->user_idUser['val'] = $var;
             }	function getUserIdUser(){
                return $this->user_idUser['val'];
             }	function setFieldByAppIdEventAttribute($var){
                $this->fieldByApp_idEventAttribute['val'] = $var;
             }	function getFieldByAppIdEventAttribute(){
                return $this->fieldByApp_idEventAttribute['val'];
             }	function setDate($var){
                $this->date['val'] = $var;
             }	function getDate(){
                return $this->date['val'];
             }	function setValue($var){
                $this->value['val'] = $var;
             }	function getValue(){
                return $this->value['val'];
             }	function setIdSessionGuest($var){
                $this->idSessionGuest['val'] = $var;
             }	function getIdSessionGuest(){
                return $this->idSessionGuest['val'];
             }	function setLinkedHash($var){
                $this->linked_hash['val'] = $var;
             }	function getLinkedHash(){
                return $this->linked_hash['val'];
             }}