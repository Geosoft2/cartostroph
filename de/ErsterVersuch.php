<?php 

$host = "http://giv-geosoft2c.uni-muenster.de"; 
$user = "p_stue07"; 
$pass = "********"; 
$db = "postgres"; 

$con = pg_connect("host=$host dbname=$db user=$user password=$pass")
    or die ("Could not connect to server\n"); 

$result = pg_query($con, "INSERT INTO test(spalte1, spalte2)
					VALUES('asdf', 'jfghj');");
					
	$url = $_POST['URL'];
	$titel = $_POST['Titel'];
	$kommentar = $_POST['Kommentar'];
	
    $kategorie = $_POST['Kategorie'];
	$katwert = NULL;
    switch ($klasse) { 
        case 'Welt': 
            $katwert = 'Welt';
            break; 
        case 'Kontinent': 
            $katwert = 'Kontinent';
            break; 
        case 'Land': 
            $katwert = 'Land';
            break; 
        case 'Region': 
            $katwert = 'Region';
            break; 
        case 'Stadt': 
            $katwert = 'Stadt';
            break; 	
        default:
			$katwert = NULL;
            echo 'NULL<br />';
    }
	
	$start = $_POST['star'];
	$end = $_POST['end'];
	$bewertung = $_POST['Bewertung'];
	$tags = $_POST['Tags'];
	$hyperlink = $_POST['Hyperlink'];


	//dump the result object
	var_dump($result);

	//closing connection
	pg_close($con); 

?>
