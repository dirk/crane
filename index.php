<?php
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('SYSTEM', ROOT.'/system');
foreach (scandir(SYSTEM) as $filename) {
    if($filename != '.' && $filename != '..') include_once(SYSTEM.'/'.$filename);
}
$Request = new Request();
require('app/models/user.php');
$user = new User();
print_r($user->structure['username']->create('username'));
?>