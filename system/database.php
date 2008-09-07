<?php
// FIXME: Actually put in connection and query processing methods. (Processing methods must be ORM-independent.)

class Database {
	var $connection;
	function Database($profile){
		$host = $profile['host'];$username = $profile['username'];$password = $profile['password'];
		$this->connection = mysql_connect($host, $username, $password) or die("Error connecting to database");
		mysql_select_db($profile['database'], $this->connection);
		//$result = mysql_query("SELECT * FROM members ORDER BY id", $connection) or die("error querying database");
		//$i = 0;
		//while($result_ar = mysql_fetch_assoc($result)){
		//}
	}
	function query($query){
		$result = mysql_query("SELECT * FROM users", $this->connection) or die("error querying database");
		while($row = mysql_fetch_assoc($result)){
			print_r($row);
		}
	}
}






//--