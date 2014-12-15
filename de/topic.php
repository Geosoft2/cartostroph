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

	$start = '0001-01-01';
	if ($_POST['start'] != ''){
		$start = $_POST['start'];
		}
	$end = '9999-12-31';
	if ($_POST['end'] != ''){
		$end = $_POST['end'];
		}
	//$bewertung = (int) $_POST['Bewertung'];
	$tags = $_POST['tags'];
	$hyperlink = $_POST['hyperlink'];
	$autor = 'Anonym';

	
	
	$result = pg_query($connection, "INSERT INTO topic(url_top, text, bewertung, hyperlink, anfangsdatum, enddatum, kategorie, titel, position, autor, tag) 
					VALUES('$url', '$kommentar', Null, '$hyperlink', '$start', '$end', '$katwert', '$titel', Point($breitengrad, $laengengrad), '$autor', '$tags')");

	header("Location: index.html");
	exit();
?>
