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

	// execute query
	$sql = "SELECT url_top, titel, position, bewertung, autor FROM topic";
	$result = pg_query($connection, $sql);
	if (!$result) {
		die("Error in SQL query: " . pg_last_error());
	}
/*
	// iterate over result set
	// print each row
	while ($row = pg_fetch_array($result)) {
		echo "URL: " . $row[0] . "<br />";
		echo "Titel: " . $row[1] . "<br />";
		echo "Position: " . $row[2] . "<br />";
		echo "Bewertung: " . $row[3] . "<br />";
	}
	
	echo '<script type="text/javascript"> URL = ' . $row[0] . '; </script>';*/

	// free memory
	pg_free_result($result);

	
	//pg_escape_string($_POST['cname'])
	//http://www.techrepublic.com/blog/how-do-i/how-do-i-use-php-with-postgresql/
	//http://www.treibsand.com/2009/01/26/volltextsuche-mit-postgresql/
?>