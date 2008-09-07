<?php
// Base system. Right now merely pulls in all of the files.
$files = array(
	'util.php',
	'database.php',
	'request.php',
	'models.php',
	'record.php',
);
/*
	TODO: Major clean-up for these loading systems. Esp. config.
*/
foreach($files as $file){
	require_once($file);
}
foreach (scandir(CONFIG) as $filename) {
    if($filename != '.' && $filename != '..' && ends_with($filename, '.php')) include_once(CONFIG.'/'.$filename);
}
class Crane {
	var $database;
	var $libraries = array();
	function Crane($launch_options = array()){
		// Loading the database.
		$profile = def_param($lauch_options['profile'], 'default');
		$this->database = new Database($GLOBALS['database'][$profile]);
		$this->load('library', 'inflector');
	}
	function load($type, $file){
		switch ($type){
			case 'library':
				$this->load_library($file);
				break;
		}
	}
	function load_library($file){
		if(!in_array($file, $this->libraries)){
			if($file == 'inflector'){
				require_once('libraries/inflector.php');
				$this->inflector = new Inflect();
				array_push($this->libraries, $file);
			}
		}
	}
}
$crane = new Crane();

