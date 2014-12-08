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
	$sql = "SELECT url_top, tag FROM topic";
	$result = pg_query($connection, $sql);
	if (!$result) {
		die("Error in SQL query: " . pg_last_error());
	}

	// iterate over result set
	// print each row
	while ($row = pg_fetch_array($result)) {
		echo "URL: " . $row[0] . "<br />";
		echo "Tags: " . $row[1] . "<p />";
	}

	// free memory
	pg_free_result($result);

	// close connection
	pg_close($dbh);
	
	//pg_escape_string($_POST['cname'])
	//http://www.techrepublic.com/blog/how-do-i/how-do-i-use-php-with-postgresql/
	//http://www.treibsand.com/2009/01/26/volltextsuche-mit-postgresql/
?>