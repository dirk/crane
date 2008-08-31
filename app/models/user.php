<?php
class User extends Model {
	function User(){
		// Load default model functions and accesories from the parent.
		parent::Model();
		// Defines the structure of the model in the database.
		$this->structure = array(
			//'username' => $this->fields->string('username', array('null' => false)),
			'username' => new StringField('username', array('null' => false)),
			'password' => new PasswordField('pass', array('null' => false)),
		);
		$this->related = array(
			''
		);
	}
}
//anything below here is basicly a controller
//$user = new User();
//print_r($user->structure());
