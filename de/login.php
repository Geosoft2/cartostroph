<?php
	ini_set('display_errors', '1');
	error_reporting(E_ALL | E_STRICT);

	include("config.php");
	global $config;
	$connection = pg_connect($config["connection"]); 

		$user = $_POST['user'];
		$pw = $_POST['password'];
		$password = hash('sha512', $pw);
		
		// Benutzername und Passwort werden überprüft
		$result = pg_query($connection, "SELECT name, passwort FROM nutzer WHERE name='$user'
									AND passwort='$password';");

		if (pg_num_rows($result)>0) {
			session_start();
                 
            setcookie('name', $user, strtotime("+1 month"));
            $_COOKIE['name'] = $user; // fake-cookie setzen

			header("Location: login1.php");
			exit;
        }
		else{
			header("Location: login2.php");
		}
?>