<?php 

	ini_set('display_errors', '1');
	error_reporting(E_ALL | E_STRICT);

	include("config.php");
	global $config;
	$connection = pg_connect($config["connection"]); 	
	
	/*function holeWert($schluessel) {
	if (isset($_POST[$schluessel])  {
		return htmlspecialchars($_POST[$schluessel]);
		} else {
		return "";
		}
	}	



	$Benutzername = holeWert("Benutzername");
	$Passwort = holeWert("Passwort");
	$Passwort2 = holeWert("Passwort2"); 
	$Ort = holeWert("Ort");
	$PLZ = holeWert("PLZ");
	$Land = holeWert("Land"); */

	$Benutzername = pg_escape_string(htmlspecialchars($_POST['Benutzername']));
	$Passwort = pg_escape_string(htmlspecialchars($_POST['Passwort']));
	$Passwort2 = pg_escape_string(htmlspecialchars($_POST['Passwort2']));
	$Ort = pg_escape_string(htmlspecialchars($_POST['Ort']));
	$PLZ = pg_escape_string(htmlspecialchars($_POST['PLZ']));
	$Land = pg_escape_string(htmlspecialchars($_POST['Land']));
	
	$sql = "SELECT name FROM nutzer WHERE name='$Benutzername'";
	$result = pg_query($connection, $sql); 
	$count = pg_num_rows($result);

	if($count == 1) {
		header("Location: register1.php");
		exit();
	} 

	elseif($Passwort!=$Passwort2) {

	header("Location: register2.php");
		exit();

	} else {

	// Passwort ueber sha1 verschluesseln
	$Passwort = hash('sha512', $Passwort);

	$result = pg_query($connection, "INSERT INTO nutzer(name, passwort, ort, plz, land) 
					VALUES('$Benutzername', '$Passwort', '$Ort', '$PLZ', '$Land')"); 
	header("Location: index.php");
	exit();		
		
		
	}
					
	

?>
