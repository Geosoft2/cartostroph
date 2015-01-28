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



// Suchvariable und Limitbegrenzung aus URL auslesen
 if (isset($_GET['q'])) {
 	$q = $_GET['q'];	} else {$q = "";}				
 if (isset($_GET['count'])) {
 	$count = $_GET['count'];	} else {$count = "";}				

if ($count != "") {
    $sql = "SELECT url_top, Bewertung, body FROM topic LEFT OUTER JOIN comments on topic.url_top = comments.page_id WHERE UPPER (body) LIKE UPPER('%$q%') LIMIT $count";
} else {
    $sql = "SELECT url_top, bewertung, body FROM topic LEFT OUTER JOIN comments on topic.url_top = comments.page_id WHERE UPPER(body) LIKE UPPER('%$q%')";
   }

//$sql = "SELECT url_top, bewertung, body FROM topic LEFT OUTER JOIN comments on topic.url_top = comments.page_id WHERE body LIKE '%Klasse%'";

$result = pg_query($connection, $sql);

$array2 = array();

while ($row = pg_fetch_array($result)) {
	$arr = array("text"=>($row[2]), "rating" => (float)$row[1], "itemUnderReview"=> $row[0]);

	if ($row[1] == NULL) {
		unset($arr["rating"]);
	}

	array_push($array2, $arr);
}


$array = array("resource" => "http://giv-geosoft2c.uni-muenster.de/api/v1", "comments" => $array2);


echo json_encode($array);



?>
