<?php
class PasswordField {
	var $options;
	function PasswordField($name, $options){
		// Assign the options it's passed with.
		$this->options = $options;$this->name = $name;
	}
	function create(){
		$options = $this->options;
		$name = $this->name;
		$base = "`$name` VARCHAR(40)";
		// Depending on if it can be null or not.
		if(is_null($options['null'])){
			$options['null'] == true;
		}
		if($options['null'] == true){
			$base .= ' NULL';
		}else{
			$base .= ' NOT NULL';
		}
		// Check if it specifies a default value
		if(!empty($options['default'])){
			// Results in: DEFAULT 'string'
			$hashed = sha1($options['default']);
			$base .= ' DEFAULT \'' . $hashed . '\'';
		}
		return $base;
	}
	function insert($value, $hashed = true){
		if(!($hashed == false)){
			$value = sha1($value);
		}
		return array(
			'name' => $this->name,
			'value' => "'$value'",
		);
	}
}