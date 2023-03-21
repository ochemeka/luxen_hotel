<?php
foreach (array_merge($_GET, $_POST) as $key => $val) {
  global $$key;
  $$key = addslashes($val);
}

require("constants.php");

// 1. Create a database connection Procedural style
$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS);
if (!$connection) {
	die("Database connection failed: " . mysqli_error($connection));
}

// 2. Select a database to use 
$db_select = mysqli_select_db($connection, DB_NAME);
if (!$db_select) {
	die("Database selection failed: " . mysqli_error($connection));
}



//DB details
$dbHost = DB_SERVER;
$dbUsername = DB_USER;
$dbPassword = DB_PASS;
$dbName = DB_NAME;

//Create connection and select DB Object Oriented
$connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($connection->connect_error) {
    die("Unable to connect database: " . $connection->connect_error);
} 

?>
