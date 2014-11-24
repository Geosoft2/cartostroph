<?php 

	ini_set('display_errors', '1');
	error_reporting(E_ALL | E_STRICT);

	@connection = pg_connect("host=localhost dbname=postgres user=j_gock02 password=***"); 
	
	$Benutzername = $_POST['Benutzername'];
	$Passwort = $_POST['Passwort'];
	$Ort = $_POST['Ort'];
	$PLZ = $_POST['PLZ'];
	$Land = $_POST['Land'];

	$result = pg_query($connection, "INSERT INTO nutzer(name, passwort, ort, plz, land) 
					VALUES($Benutzername, $Passwort, $Ort, $PLZ, $Land)");

?>