<?php
$db = require('connection.inc.php');

// Creating connection function
function createConnection($db)
{
	// Database connection
	$hostname = $db['hostname'];
	$username = $db['username'];
	$password = $db['password'];
	$database = $db['database'];

	$con = mysqli_connect($hostname, $username, $password, $database);

	return $con;
}
$conn = createConnection($db);

// Check connection or error
function conn_error()
{
	global $conn;
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	} else {
		echo 'Connected!';
	}
}
//conn_error();