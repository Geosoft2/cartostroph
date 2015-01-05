<?php 

	ini_set('display_errors', '1');
	error_reporting(E_ALL | E_STRICT);

	include("config.php");
	global $config;
	$connection = pg_connect($config["connection"]); 	
	
	$Benutzername = $_POST['Benutzername'];
	$Passwort = $_POST['Passwort'];
	$Ort = $_POST['Ort'];
	$PLZ = $_POST['PLZ'];
	$Land = $_POST['Land'];
	// Passwort verschluesseln
	$Passwort = hash('sha512', $Passwort);

	$result = pg_query($connection, "INSERT INTO nutzer(name, passwort, ort, plz, land) 
					VALUES('$Benutzername', '$Passwort', '$Ort', '$PLZ', '$Land')");
					
	header("Location: index.php");
	exit();

?>
