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
	$autor = 'Anonym';
/**
    $kategorie = $_POST['Kategorie'];
	$katwert = NULL;
    switch ($kategorie) { 
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
	
	$start = $_POST['star'];
	$end = $_POST['end'];
	$bewertung = $_POST['Bewertung'];
	$tags = $_POST['Tags'];
	$hyperlink = $_POST['Hyperlink'];*/
	
	$result = pg_query($connection, "INSERT INTO topic(url_top, text, bewertung, hyperlink, anfangsdatum, enddatum, kategorie, titel, position, autor, Tag) 
					VALUES('$url', '$kommentar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$autor', NULL)");
					//VALUES('$url', '$kommentar', $bewertung, '$hyperlink', $start, $end, '$katwert', '$titel', $position, '$autor', '$tags')");

	//header("Location: index.html");
	//exit();
?>