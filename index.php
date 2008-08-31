<?php
define('ROOT', dirname(__FILE__));
define('SYSTEM', ROOT.'/system');
require_once(SYSTEM . '/base.php');
//foreach (scandir(SYSTEM) as $filename) {
//    if($filename != '.' && $filename != '..') include_once(SYSTEM.'/'.$filename);
//}
require('app/models/user.php');
$user = new User();
//print_r($user->structure['username']->insert('test'));

// Testing routing
$route = '/desert/$3:{[0-9]}/$2:{[a-z]+}/$1/';
$default = '([a-zA-Z0-9,_-\:\\\.]+)';
//ereg('\$([0-9]+):{[^/]+}', $route, $subs);
preg_match_all('/\$([0-9]+)(:\{[^\/]+\})?/', $route, $subs);
print_r($subs);
?>