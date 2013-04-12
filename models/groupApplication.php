<?php
class groupApplication extends OrmClass{
    	protected $_datasource = "groupApplication";	public $idGroupApplication = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'auto_increment' => TRUE, 'val'=>''); 	public $required_points = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $idGroupAttribute = Array ('type' => 'int', 'null' =>  'NO', 'foreign' => TRUE, 'reference' => 'idGroupAttribute', 'val'=>''); 	public $idEvents = Array ('type' => 'int', 'null' =>  'NO', 'foreign' => TRUE, 'reference' => 'idEvents', 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setIdGroupApplication($var){
                $this->idGroupApplication['val'] = $var;
             }	function getIdGroupApplication(){
                return $this->idGroupApplication['val'];
             }	function setRequiredPoints($var){
                $this->required_points['val'] = $var;
             }	function getRequiredPoints(){
                return $this->required_points['val'];
             }	function setIdGroupAttribute($var){
                $this->idGroupAttribute['val'] = $var;
             }	function getIdGroupAttribute(){
                return $this->idGroupAttribute['val'];
             }	function setIdEvents($var){
                $this->idEvents['val'] = $var;
             }	function getIdEvents(){
                return $this->idEvents['val'];
             }}