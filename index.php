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
$request = '/desert/2/abc/a-b_c:123';
$route = '/desert/$3:{[0-9]}/$1:{[a-z]+}/$2';
// Dash must be first or else it will raise and error and won't match.
$default = '([-a-zA-Z0-9._:\\]+)';
//ereg('\$([0-9]+):{[^/]+}', $route, $subs);
preg_match_all('/\$([0-9]+)(:\{[^\/]+\})?/', $route, $subs);
// Define all of the result data from the original match.
$parts = $subs[0];
$order = $subs[1];
$exprs = $subs[2];
$regs = array();
$match = $route;
$c = 0;
foreach($parts as $part){
	$expr = $exprs[$c];
	if(starts_with($expr, ':{')){
		$match = str_replace($part, '(' . substr($expr, 2, (strlen($expr) - 3)) . ')', $match);
	}else{
		$match = str_replace($part, $default, $match);
	}
	$c++;
}
ereg($match, $request, $matches);
$matches = array_slice($matches, 1);
$segments = array();
for($c = 0; $c < count($order); $c++){
	$segments[$order[$c]] = $matches[$c];
}
print_r($segments);
?>