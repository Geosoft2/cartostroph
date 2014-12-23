function addMarkers(){
    var URL = document.getElementById("URL").value;
	var Titel = document.getElementById("Titel").value;
	var Bewertung = document.getElementById("sliderOutput3").innerHTML;
	var Autor = autor();
	var Position;
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
	
	// iterate over result set
	// print each row
	while ($row = pg_fetch_array($result)) {
		$URL = $row[0];
		$Titel = row[1];
		$Position = $row[2];
		$Bewertung = $row[3];
		$Autor = $row[4];
	
		echo '
		var URL = $URL;
		var Titel = $Titel;
		var Bewertung = $Bewertung;
		var Autor = $Autor;
		var Position = $Position;
		
		L.marker([lat, lng]).addTo(map).bindPopup("Titel: " + Titel + "<br />Bewertung: "
								       		 + Bewertung + "<br />Breitengrad: " + "<br/> Autor: " + Autor  + "<br /><br /><a>Mehr Infos...</a>")';
	}
	pg_free_result($result);
       
    ?>   
	
		
	addMarker = false;
	document.getElementById("map").removeAttribute("data-reveal-id");				       		 								
}
