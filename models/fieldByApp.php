<?php
class fieldByApp extends OrmClass{
    	protected $_datasource = "fieldByApp";	public $idEventAttribute = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'auto_increment' => TRUE, 'val'=>''); 	public $visible = Array ('type' => 'tinyint', 'null' =>  'NO', 'val'=>''); 	public $required = Array ('type' => 'tinyint', 'null' =>  'NO', 'val'=>''); 	public $defaultValue = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	public $points = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $idField = Array ('type' => 'int', 'null' =>  'NO', 'foreign' => TRUE, 'reference' => 'idField', 'val'=>''); 	public $idEvents = Array ('type' => 'int', 'null' =>  'NO', 'foreign' => TRUE, 'reference' => 'idEvents', 'val'=>''); 	public $idGroupApplication = Array ('type' => 'int', 'null' =>  'NO', 'foreign' => TRUE, 'reference' => 'idGroupApplication', 'val'=>''); 	public $level_idLevel = Array ('type' => 'int', 'null' =>  'NO', 'foreign' => TRUE, 'reference' => 'levelLevel', 'val'=>''); 	public $idhtmltagbyApp = Array ('type' => 'int', 'null' =>  'YES', 'foreign' => TRUE, 'reference' => 'idhtmltagbyApp', 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setIdEventAttribute($var){
                $this->idEventAttribute['val'] = $var;
             }	function getIdEventAttribute(){
                return $this->idEventAttribute['val'];
             }	function setVisible($var){
                $this->visible['val'] = $var;
             }	function getVisible(){
                return $this->visible['val'];
             }	function setRequired($var){
                $this->required['val'] = $var;
             }	function getRequired(){
                return $this->required['val'];
             }	function setDefaultValue($var){
                $this->defaultValue['val'] = $var;
             }	function getDefaultValue(){
                return $this->defaultValue['val'];
             }	function setPoints($var){
                $this->points['val'] = $var;
             }	function getPoints(){
                return $this->points['val'];
             }	function setIdField($var){
                $this->idField['val'] = $var;
             }	function getIdField(){
                return $this->idField['val'];
             }	function setIdEvents($var){
                $this->idEvents['val'] = $var;
             }	function getIdEvents(){
                return $this->idEvents['val'];
             }	function setIdGroupApplication($var){
                $this->idGroupApplication['val'] = $var;
             }	function getIdGroupApplication(){
                return $this->idGroupApplication['val'];
             }	function setLevelIdLevel($var){
                $this->level_idLevel['val'] = $var;
             }	function getLevelIdLevel(){
                return $this->level_idLevel['val'];
             }	function setIdhtmltagbyApp($var){
                $this->idhtmltagbyApp['val'] = $var;
             }	function getIdhtmltagbyApp(){
                return $this->idhtmltagbyApp['val'];
             }}