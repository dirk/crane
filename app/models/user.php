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
			'role_id' => new KeyField('role_id'),
		);
		// Defines how the model is related to other models.
		$this->related = array(
			'role' => new BelongsTo('Role', 'role_id'),
		);
	}
}

// EOF