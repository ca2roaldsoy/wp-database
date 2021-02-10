<?php

// Create Database
$db = new mysqli("sql100.epizy.com", "epiz_27885737", "ige8PH4QF12qbA");
$db->query("CREATE DATABASE IF NOT EXISTS epiz_27885737_test3000;");

require "createTable.php";

?>