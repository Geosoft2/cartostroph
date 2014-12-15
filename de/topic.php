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
	$position = '$breitengrad, $laengengrad';
	$autor = $_POST['Autor'];

    $kategorie = $_POST['Kategorie'];
	$katwert = NULL;
    switch ($kategorie) { 
		case 'keine Ausgewählt':
			$katwert = NULL;
			break;
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
    }
	
   	$start = $_POST['start'];
	$end = $_POST['end'];
	//$start = date('$start', 'DD Mon YYYY');   //to_date('05 Dec 2000', 'DD Mon YYYY')
	//$end = date('$end', 'DD Mon YYYY');
	$bewertung = (int) $_POST['Bewertung'];
	$tags = $_POST['tags'];
	$hyperlink = $_POST['hyperlink'];
	$autor = 'Anonym';

	
	
	$result = pg_query($connection, "INSERT INTO topic(url_top, text, bewertung, hyperlink, anfangsdatum, enddatum, kategorie, titel, position, autor, Tag) 
					VALUES('$url', '$kommentar', $bewertung, '$hyperlink', Null, Null, '$katwert', '$titel', Point($breitengrad, $laengengrad), '$autor', '$tags')");
					//VALUES('$url', '$kommentar', $bewertung, '$hyperlink', $start, $end, '$katwert', '$titel', $position, '$autor', '$tags')");

	header("Location: index.html");
	exit();
?>
