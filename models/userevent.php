<?php
class userevent extends OrmClass{
    	protected $_datasource = "userevent";	public $idUserEvent = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'auto_increment' => TRUE, 'val'=>''); 	public $ipReal = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	public $dateConnect = Array ('type' => '', 'null' =>  'NO', 'val'=>''); 	public $soConnect = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	public $ipPublicConnect = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	public $userAgents = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	public $participate = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $user_idUser = Array ('type' => 'int', 'null' =>  'NO', 'foreign' => TRUE, 'reference' => 'userUser', 'val'=>''); 	public $idEvents = Array ('type' => 'int', 'null' =>  'NO', 'foreign' => TRUE, 'reference' => 'idEvents', 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setIdUserEvent($var){
                $this->idUserEvent['val'] = $var;
             }	function getIdUserEvent(){
                return $this->idUserEvent['val'];
             }	function setIpReal($var){
                $this->ipReal['val'] = $var;
             }	function getIpReal(){
                return $this->ipReal['val'];
             }	function setDateConnect($var){
                $this->dateConnect['val'] = $var;
             }	function getDateConnect(){
                return $this->dateConnect['val'];
             }	function setSoConnect($var){
                $this->soConnect['val'] = $var;
             }	function getSoConnect(){
                return $this->soConnect['val'];
             }	function setIpPublicConnect($var){
                $this->ipPublicConnect['val'] = $var;
             }	function getIpPublicConnect(){
                return $this->ipPublicConnect['val'];
             }	function setUserAgents($var){
                $this->userAgents['val'] = $var;
             }	function getUserAgents(){
                return $this->userAgents['val'];
             }	function setParticipate($var){
                $this->participate['val'] = $var;
             }	function getParticipate(){
                return $this->participate['val'];
             }	function setUserIdUser($var){
                $this->user_idUser['val'] = $var;
             }	function getUserIdUser(){
                return $this->user_idUser['val'];
             }	function setIdEvents($var){
                $this->idEvents['val'] = $var;
             }	function getIdEvents(){
                return $this->idEvents['val'];
             }}