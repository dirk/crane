<?php
// Base model class
class Model {
	var $fields, $structure;
	function Model(){
		$this->fields = new Fields();
	}
}
require_once 'fields/string.php';
require_once 'fields/password.php';
// Class of built-in fields.
class Fields {
	// -- CONCEPT --
	// format defines how to format it. [integer, string]
	// schema defines what schema to use in the CREATE. [`string` VARCHAR( 255 )% NULL%% DEFAULT %]
	// - Note, %SOMETHING% will be replaced with the value you define. Spaces can be placed before 
	//   and after the SOMETHING. They will only be shown if a SOMETHING is specified.
	/*var $string = array(
		'format' => 'string',
		'schema' => 'string` VARCHAR( 255 )% NULL%% DEFAULT %',
		'null' => array(
			'enabled' => 'boolean',
			'default' => 'NOT NULL',
			'true' => 'NULL',
			'false' => 'NOT NULL',
		),
		'default' => array(
			'enabled' => 'string',
			'format' => "'%STRING%'",
		)
	);
	var $password = 'a password';
	var $url = 'a URL';*/
	function string($name, $options){
		$field = new StringField($name, $options);
		return $field;
	}
}
