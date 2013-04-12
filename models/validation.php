<?php
class validation extends OrmClass{
    	protected $_datasource = "validation";	public $idValidation = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'auto_increment' => TRUE, 'val'=>''); 	public $description = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	public $messageError = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	public $numError = Array ('type' => 'int', 'null' =>  'YES', 'val'=>''); 	public $function = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	public $codePhp = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	public $name = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setIdValidation($var){
                $this->idValidation['val'] = $var;
             }	function getIdValidation(){
                return $this->idValidation['val'];
             }	function setDescription($var){
                $this->description['val'] = $var;
             }	function getDescription(){
                return $this->description['val'];
             }	function setMessageError($var){
                $this->messageError['val'] = $var;
             }	function getMessageError(){
                return $this->messageError['val'];
             }	function setNumError($var){
                $this->numError['val'] = $var;
             }	function getNumError(){
                return $this->numError['val'];
             }	function setFunction($var){
                $this->function['val'] = $var;
             }	function getFunction(){
                return $this->function['val'];
             }	function setCodePhp($var){
                $this->codePhp['val'] = $var;
             }	function getCodePhp(){
                return $this->codePhp['val'];
             }	function setName($var){
                $this->name['val'] = $var;
             }	function getName(){
                return $this->name['val'];
             }}