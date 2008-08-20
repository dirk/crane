<?php
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
