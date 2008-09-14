<?php
// TODO: Decide how ActiveRecord and it's finding, inserting, and updating methods will interface with models and queries.

// The beginnings of the dauntingly complex ActiveRecord system in PHP.
class Record {
	var $model, $crane;
	function Record($model, $crane = null){
		$this->model = $model;
		if(is_null($crane)){
			global $crane;
		}
		$this->crane = $crane;
		$this->database = $crane->database;
	}
	// Currently all methods left public; since there's no need to keep them hidden.
	function find($range, $settings){
		if($range == 'first'){
			$settings['limit'] = 1;
		}elseif($range == 'all'){
			$settings['limit'] = null;
		}
		$this->query($settings);
	}
	function query($settings = array()){
		$result = $this->database->query("SELECT * FROM users");
		$return = array();
		while($row = mysql_fetch_assoc($result)){
			foreach($this->model->structure as $key => $value){
				$return[$key] = $row[$value->name];
			}
		}
		print_r($return);
	}
	function test(){
		print_r($this->model->structure);
	}
	function conditions($query, $values){
		// Parses through a statement like array('id = ? OR id = ?', array(1,2))
		// and replaces the question marks with their respective values while also 
		// making the values database-safe.
		$items = explode('?', $query);
		$nv = array();
		foreach($values as $value){
			array_push($nv, db_clean($value));
		}
		$return = "";
		for($i = 0; $i < count($items); $i++){
			$return .= $items[$i] . $nv[$i];
		}
		return $return;
	}
}

// EOF