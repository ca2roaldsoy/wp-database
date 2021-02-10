<?php

// connect to database
function connect ($database="epiz_27885737_test3000"){
	$host = "sql100.epizy.com";
	$user = "epiz_27885737";
	$password = "ige8PH4QF12qbA";
	
	$db = new mysqli($host, $user, $password, $database);
	if ($db->connect_error) {
		die("Connection failed: " . $db->connect_error);
	 }
	return $db; 
}