<?php
// Base system. Right now merely pulls in all of the files.
$files = array(
	'database.php',
	'inflector.php',
	'request.php',
	'models.php',
	'record.php',
);
foreach($files as $file){
	require_once($file);
}

class Crane {
	var $database;
	function Crane(){
		$database = new Database();
	}
}
$crane = new Crane();

// Utility function. Nowhere else to put it.
function starts_with($string, $start){
	if(substr($string, 0, strlen($start)) == $start){
		return true;
	}else{
		return false;
	}
}