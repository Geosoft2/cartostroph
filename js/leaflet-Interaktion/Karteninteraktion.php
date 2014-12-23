<?php
	header(’Content-Type: text/javascript’);
?>
<script type="text/javascript"> 

var lat;
var lng;
// var URL;
// var Titel;
var MarkerArray = [];
function newMarker(){
	addMarker = true;
	};
		
function resetView(){
	map.setView([30.505, 0.000], 2);
	}
	
function onMapClick(e) {
	if (addMarker == true){ 
				lng = e.latlng.lng;
				lat = e.latlng.lat;
				document.getElementById("Breitengrad").value = lat;
				document.getElementById("Längengrad").value = lng;
				document.getElementById("newTopicModal").setAttribute("overflow","scroll");
				document.getElementById("map").setAttribute("data-reveal-id","newTopicModal",true);
				document.getElementById("URL").value = "";
				document.getElementById("Titel").value = "";
				document.getElementById("Kommentar").value = "";
				document.getElementById("checkbox1").checked="true";
				document.getElementById("Autor").value = autor();
				addMarker = false;
	}
		
}

function submitTopic(){
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


function activateAssessment() {
	 if(document.getElementById("checkbox1").checked == false){
		document.getElementById("Bewertung").removeAttribute("disabled");
	 } else {
	 	document.getElementById("Bewertung").setAttribute("disabled","true",true);
	 }
}

function activateSlider() {
	document.getElementById("Bewertung").removeAttribute("disabled");
	document.getElementById("checkbox1").checked = false;
}

function hilfeCookie() {
	if(document.getElementById("HilfeAusschalten").checked == true){
		document.cookie = "Hilfe=aus";
	} else {
		document.cookie = "Hilfe=an";
	}
	
}


// Man gibt das gesuchte Attribut als String an
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) != -1) return c.substring(name.length,c.length);
    }
    return "";
} 


function HilfeAnzeigen() {
	var c = getCookie("Hilfe");
	if(c=="" || c=="an"){
	$(document).ready(function(){$('#HilfeModal').foundation('reveal', 'open')});
	}
}

function autor() {
	var autor = getCookie("Autor");
	if(autor == ""){
		autor = "Anonym";
	}
	return autor;
}
</script>
