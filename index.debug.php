<?php
define('ROOT', dirname(__FILE__));
define('SYSTEM', ROOT.'/system');
foreach (scandir(SYSTEM) as $filename) {
    if($filename != '.' && $filename != '..') include_once(SYSTEM.'/'.$filename);
}
require('app/models/user.php');
$user = new User();
print_r($user->structure['username']->create('username'));
?>