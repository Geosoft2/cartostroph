<?php

header('content-type application/json charset=utf-8');

// attempt a connection
		ini_set('display_errors', '1');
		error_reporting(E_ALL | E_STRICT);

		include("config.php");
		global $config;
		$connection = pg_connect($config["connection"]);
		if (!$connection){
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
		$URL = $row[0];
		$id = ("http://giv-geosoft2c.uni-muenster.de/Joana/Github/de/DynamicMap.php?url=".(string)$row[0]);
		$text = $row[2];
		
					$sql6 = "SELECT bewertung FROM topic WHERE url_top = '$URL'";

                    $sql4 = "SELECT sum(rating) FROM comments WHERE page_id ='$URL'";

                    $sql5 = "SELECT count(rating) FROM comments WHERE page_id ='$URL'";

                    $sql7 =  pg_query($connection, $sql6);
                    $sql2 = pg_query($connection, $sql4);
                    $sql3 = pg_query($connection, $sql5);


                   while ($row = pg_fetch_array($sql7)) {
                            $bewertungTopic = (float)$row[0]; 
                        }

                    while ($row = pg_fetch_array($sql2)) {
                            $sum = (float)$row[0]; 
                        }

                    while ($row = pg_fetch_array($sql3)) {
                            $count = (float)$row[0]; 
                        }
                    
                    if ($bewertungTopic == NULL and $count == NULL) {
                        $rating_avg = "Keine Bewertung";
                        }
                    elseif ($bewertungTopic != NULL) {
                        
                        $rating_avg = ($bewertungTopic + $sum) / ($count + 1);
                        $rating_avg = round($rating_avg,2);
                    } else {
                     
                     $rating_avg = ($bewertungTopic + $sum) / ($count); 
                     $rating_avg = round($rating_avg,2);
                    }

                    $Bewertung = (string)$rating_avg;
					
	
	$arr = array("id"=>htmlspecialchars($id), "text"=>htmlspecialchars((string)$text), "rating" => (float)htmlspecialchars($Bewertung), "itemUnderReview"=> htmlspecialchars($URL));

	if ($Bewertung == NULL) {
		unset($arr["rating"]);
	}

	array_push($array2, $arr);
}


$array = array("resource" => "http://giv-geosoft2c.uni-muenster.de/api/v1", "comments" => $array2);


echo json_encode($array);



?>
