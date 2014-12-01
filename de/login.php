<?php 

	ini_set('display_errors', '1');
	error_reporting(E_ALL | E_STRICT);

	include("config.php");
	global $config;
	$connection = pg_connect($config["connection"]); 
	
	$Benutzername = $_POST['Benutzername'];
	$Passwort = $_POST['Passwort'];

	$result = pg_query($connection, "SELECT nutzer WHERE name=$Benutzername
									AND passwort=$Passwort");

?>