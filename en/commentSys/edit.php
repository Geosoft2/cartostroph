<?php
	include("config.php");
	global $config;
	
	$connection = pg_connect($config["connection"]);
	if (!$connection) {
		die("Error in connection: " . pg_last_error());
	}

	$ID =     $_POST['id1'];
	$body = (string)$_POST['body1'];

	
	// execute query
	$sql = "UPDATE comments SET body = '$body' WHERE id= $ID";
	
	$result = pg_query($connection, $sql);
	if (!$result) {
		die("Error in SQL query: " . pg_last_error());
	}

	

?>
