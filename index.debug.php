<?php
define('ROOT', dirname(__FILE__));
define('SYSTEM', ROOT.'/system');
foreach (scandir(SYSTEM) as $filename) {
    if($filename != '.' && $filename != '..') include_once(SYSTEM.'/'.$filename);
}
$Request = new Request();
$Debug = new Debug();
$Debug->addCondition(true);
if($Debug->run) {
	$Debug->includeDependencies();
	$Debug->createSection($Request->get, 'get', 'Request GET');
	$Debug->createSection($Request->post, 'post', 'Request POST');
}
require('app/models/user.php');
$user = new User();
print_r($user->structure['username']->create('username'));
if($Debug->run) {
	$Debug->createConsole();
}
?>