<?php
// Base model class
class Model {
	var $fields, $structure;
	function Model(){
		$this->fields = new Fields();
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