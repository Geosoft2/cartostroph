<?php 

	ini_set('display_errors', '1');
	error_reporting(E_ALL | E_STRICT);
	
	include("config.php");
	global $config;
	$connection = pg_connect($config["connection"]); 
	
	$url = $_POST['URL'];
	$titel = $_POST['Titel'];
	$kommentar = $_POST['Kommentar'];
	$breitengrad = $_POST['Breitengrad'];
	$laengengrad = $_POST['Längengrad'];
	$autor = $_POST['Autor'];

    $kategorie = $_POST['Kategorie'];
	$katwert = NULL;
    switch ($kategorie) { 
		case 'No Category':
			$katwert = NULL;
			break;
        case 'World': 
            $katwert = 'World';
            break; 
        case 'Continent': 
            $katwert = 'Continent';
            break; 
        case 'Country': 
            $katwert = 'Country';
            break; 
        case 'Region': 
            $katwert = 'Region';
            break; 
        case 'City': 
            $katwert = 'City';
            break; 	
        default:
			$katwert = NULL;
    }

	$start = '0001-01-01';
	if ($_POST['start'] != ''){
		$start = $_POST['start'];
		}
	$end = '9999-12-31';
	if ($_POST['end'] != ''){
		$end = $_POST['end'];
		}
		
	$checkbox = $_POST['checkbox1'];
	$tags = $_POST['tags'];
	$hyperlink = $_POST['hyperlink'];
	
	$Lcoordinate = (string) $_POST['cTbboxLLcoor'];
	$Rcoordinate = (string) $_POST['cTbboxURcoor'];
	$Lcoord = substr($Lcoordinate, 7, -1);
	$Rcoord = substr($Rcoordinate, 7, -1);
	
	if($checkbox){
	$result = pg_query($connection, "INSERT INTO topic(url_top, text, bewertung, hyperlink, anfangsdatum, enddatum, kategorie, titel, position, autor, tag, Lpoint, Rpoint) 
					VALUES('$url', '$kommentar', Null, '$hyperlink', '$start', '$end', '$katwert', '$titel', Point($breitengrad, $laengengrad), '$autor', '$tags', Point($Lcoord), Point($Rcoord))");

	}else{
	$bewertung = (int) $_POST['Bewertung'];
	$result = pg_query($connection, "INSERT INTO topic(url_top, text, bewertung, hyperlink, anfangsdatum, enddatum, kategorie, titel, position, autor, tag, Lpoint, Rpoint) 
					VALUES('$url', '$kommentar', $bewertung, '$hyperlink', '$start', '$end', '$katwert', '$titel', Point($breitengrad, $laengengrad), '$autor', '$tags', Point($Lcoord), Point($Rcoord))");
	}
	
	header("Location: index.php");
	exit();
?>
