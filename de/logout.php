<?php
	ini_set('display_errors', '1');
	error_reporting(E_ALL | E_STRICT);

	include("config.php");
	global $config;
	$connection = pg_connect($config["connection"]); 
	
	setcookie('name', 0, strtotime("+1 month"));
    $_COOKIE['name'] = 0;
	
    header('Location: logout1.php');
?>