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