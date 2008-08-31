<?php
class BelongsTo {
	var $name, $parent;
	function BelongsTo($parent, $name, $autoload = true){
		$this->parent = $parent;$this->name = $name;
		// Auto-load tells it whether or not to auto-matically load the parent when the load() event is called.
		$this->autoload = $autoload;
	}
	function load($id){
		// Load the data from the database
		/*
		$parent = new $this->parent();
		$data = query('SELECT ' . build_schema($parent->structure) . ' FROM ' . $parent->name . ' WHERE id = ' . $id);
		foreach($data as $key => $value){
			$parent->$key = $value;
		}
		return $parent;
		*/
	}
}

// EOF