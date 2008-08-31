<?php
class KeyField {
	var $name, $options;
	function KeyField($name, $options = array()){
		// Assign the options it's passed with.
		$this->options = $options;$this->name = $name;
	}
	function create(){
		$options = $this->options;
		$name = $this->name;
		$base = "`$name` INT";
		// Depending on if it can be null or not.
		if($options['null'] == true){
			$base .= ' NULL';
		}else{
			$base .= ' NOT NULL';
		}
		// Check if it specifies a default value
		if(!empty($options['default'])){
			// Results in: DEFAULT 'string'
			$base .= ' DEFAULT ' . $options['default'];
		}
		return $base;
	}
	function insert($value){
		return array(
			'name' => $this->name,
			'value' => $value,
		);
	}
}