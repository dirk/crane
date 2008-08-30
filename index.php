<?php
require('system/models.php');
require('app/models/user.php');
$user = new User();
print_r($user->structure['username']->create('username'));
?>