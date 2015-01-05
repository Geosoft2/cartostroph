<?php 
	

	ini_set('display_errors', '1');
	error_reporting(E_ALL | E_STRICT);

	include("config.php");
	global $config;
	$connection = pg_connect($config["connection"]); 
	
	$Benutzername = $_POST['Benutzername'];
	$Passwort = $_POST['Passwort'];
	
	include("user.php");
	
	var user = new User($Benutzername,$Passwort);
	if (user->authentify()) {
		header("location:index.html");
	}
	else {
		header("location:login.php");
	}
	
	$result = pg_query($connection, "SELECT name, passwort FROM nutzer WHERE name=$Benutzername
									AND passwort=$Passwort");

	header("Location: index.php");
	exit();
?>