<?php
// Base model class
class Model {
	var $crane;
	var $name, $fields, $structure;
	function Model(){
		//$this->fields = new Fields();
		global $crane;
		$this->crane &= $crane;
	}
	function ORM(){
		//$this->crane->add_model($this);
	}
}
// "built in" becomes "bin"
$bin_fields = array(
	'string',
	'password',
	'key',
);
foreach($bin_fields as $field){
	require_once 'fields/' . $field . '.php';
}
require_once 'relationships.php';

// EOF