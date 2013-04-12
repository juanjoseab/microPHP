<?php
class application extends OrmClass{
    	protected $_datasource = "application";	public $idApplication = Array ('type' => 'int', 'null' =>  'NO', 'primary' => TRUE, 'auto_increment' => TRUE, 'val'=>''); 	public $description = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	public $dateStart = Array ('type' => '', 'null' =>  'YES', 'val'=>''); 	public $dateEnd = Array ('type' => '', 'null' =>  'YES', 'val'=>''); 	public $url = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	public $quantityAttribute = Array ('type' => 'int', 'null' =>  'YES', 'val'=>''); 	public $points = Array ('type' => 'int', 'null' =>  'YES', 'val'=>''); 	public $apiSecret = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	public $apiId = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	public $image = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	public $idCompany = Array ('type' => 'int', 'null' =>  'NO', 'foreign' => TRUE, 'reference' => 'idCompany', 'val'=>''); 	public $name = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	public $identtify = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	public $secret = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	public $ip_range = Array ('type' => 'varchar', 'null' =>  'YES', 'val'=>''); 	public $highestLevel = Array ('type' => 'int', 'null' =>  'NO', 'val'=>''); 	public $country_idPais = Array ('type' => 'int', 'null' =>  'NO', 'foreign' => TRUE, 'reference' => 'countryPais', 'val'=>''); 	public $template = Array ('type' => 'varchar', 'null' =>  'NO', 'val'=>''); 	function getReference() {
            return $this->_datasource;
        }	function setIdApplication($var){
                $this->idApplication['val'] = $var;
             }	function getIdApplication(){
                return $this->idApplication['val'];
             }	function setDescription($var){
                $this->description['val'] = $var;
             }	function getDescription(){
                return $this->description['val'];
             }	function setDateStart($var){
                $this->dateStart['val'] = $var;
             }	function getDateStart(){
                return $this->dateStart['val'];
             }	function setDateEnd($var){
                $this->dateEnd['val'] = $var;
             }	function getDateEnd(){
                return $this->dateEnd['val'];
             }	function setUrl($var){
                $this->url['val'] = $var;
             }	function getUrl(){
                return $this->url['val'];
             }	function setQuantityAttribute($var){
                $this->quantityAttribute['val'] = $var;
             }	function getQuantityAttribute(){
                return $this->quantityAttribute['val'];
             }	function setPoints($var){
                $this->points['val'] = $var;
             }	function getPoints(){
                return $this->points['val'];
             }	function setApiSecret($var){
                $this->apiSecret['val'] = $var;
             }	function getApiSecret(){
                return $this->apiSecret['val'];
             }	function setApiId($var){
                $this->apiId['val'] = $var;
             }	function getApiId(){
                return $this->apiId['val'];
             }	function setImage($var){
                $this->image['val'] = $var;
             }	function getImage(){
                return $this->image['val'];
             }	function setIdCompany($var){
                $this->idCompany['val'] = $var;
             }	function getIdCompany(){
                return $this->idCompany['val'];
             }	function setName($var){
                $this->name['val'] = $var;
             }	function getName(){
                return $this->name['val'];
             }	function setIdenttify($var){
                $this->identtify['val'] = $var;
             }	function getIdenttify(){
                return $this->identtify['val'];
             }	function setSecret($var){
                $this->secret['val'] = $var;
             }	function getSecret(){
                return $this->secret['val'];
             }	function setIpRange($var){
                $this->ip_range['val'] = $var;
             }	function getIpRange(){
                return $this->ip_range['val'];
             }	function setHighestLevel($var){
                $this->highestLevel['val'] = $var;
             }	function getHighestLevel(){
                return $this->highestLevel['val'];
             }	function setCountryIdPais($var){
                $this->country_idPais['val'] = $var;
             }	function getCountryIdPais(){
                return $this->country_idPais['val'];
             }	function setTemplate($var){
                $this->template['val'] = $var;
             }	function getTemplate(){
                return $this->template['val'];
             }}