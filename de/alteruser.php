<?php
	// attempt a connection
	ini_set('display_errors', '1');
	error_reporting(E_ALL | E_STRICT);
	include("config.php");
	global $config;
	
	$connection = pg_connect($config["connection"]);
	if (!$connection) {
		die("Error in connection: " . pg_last_error());
	}
						
	$user = $_COOKIE['Autor'];
	$ort = (string)$_POST['ort'];
	$plz = (string)$_POST['plz'];
	$land = (string)$_POST['land'];

	
	// execute query
	$sql = "UPDATE nutzer SET ort = '$ort', plz = '$plz', land = '$land'  WHERE name='$user';";
	
	$result = pg_query($connection, $sql);
	if (!$result) {
		die("Error in SQL query: " . pg_last_error());
	}

	// free memory
	pg_free_result($result);
	header("Location: index.php");
	exit();
	
?>