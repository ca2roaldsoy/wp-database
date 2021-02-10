<?php

$db = new mysqli("sql100.epizy.com", "epiz_27885737", "ige8PH4QF12qbA", "epiz_27885737_test3000");
mysqli_select_db($db,"epiz_27885737_test3000");

// Create Table
$sql  = "CREATE TABLE IF NOT EXISTS allusers (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    uidUsers varchar(100) NOT NULL,
    emailUsers varchar(100) NOT NULL,
    pwdUsers varchar(100) NOT NULL
    )";
