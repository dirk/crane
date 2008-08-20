<?php
class Fields {
	var $string = 'a string';
	var $password = 'a password';
	var $url = 'a URL';
}
class Model {
	var $fields, $structure;
	function Model(){
		$this->fields = new Fields();
	}
}
class User extends Model {
	function User(){
		// Load default model functions and accesories from the parent.
		parent::Model();
		// Defines the structure of the model in the database.
		$this->structure = array(
			'username' => $this->fields->string,
		);
	}
}
//anything below here is basicly a controller
$user = new User();
print_r($user->structure());
