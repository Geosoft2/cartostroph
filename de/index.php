<?php 

	$host = "http://giv-geosoft2c.uni-muenster.de"; 
	$user = "p_stue07"; 
	$pass = "********"; 
	$db = "postgres"; 

	@pg_connect("host=$host dbname=$db user=$user password=$pass")
		or die ("Could not connect to server\n".pg_last_error()); 
	
		
	$url = $_POST['URL'];
	$titel = $_POST['Titel'];
	$kommentar = $_POST['Kommentar'];
	$breitengrad = $_POST['Breitengrad'];
	$laengengrad = $_POST['Längengrad'];
	
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
	$hyperlink = $_POST['Hyperlink'];
	
	$res = pg_query("INSERT INTO topic(url_top, text, bewertung, hyperlink, anfangsdatum, enddatum, kategorie, titel, position, autor) 
					VALUES($url, $kommentar, $bewertung, $hyperlink, $start, $end, $katwert, $titel, $position);");         //position und autor fehlen!
	
	//$result = pg_query($con, $query) or die ("Cannot execute query: $query\n"); 
	$users = pg_fetch_all($res);
	var_dump($users);
	
	//dump the result object
	var_dump($result);

	//closing connection
	pg_close($con); 

?>
