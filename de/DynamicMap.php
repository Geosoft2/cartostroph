<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Geodatensatz</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
		<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script src="../js/leaflet-Interaktion/Karteninteraktion.js"></script>
		<meta name="author" content="Mazur93" />

 		<link rel="stylesheet" type="text/css" href="../css/commentSys/comment.css" /> 
		<script type="text/javascript" src="commentSys/script.js"></script>
		<link rel="stylesheet" href="../css/foundation/foundation.css" />
	    <link rel="stylesheet" href="../css/default.css" />
	    <script src="../js/vendor/jquery.js"></script>
    	<script src="../js/foundation/foundation.min.js"></script>
	    <script src="../js/vendor/modernizr.js"></script>
		<script src='//api.tiles.mapbox.com/mapbox.js/plugins/leaflet-omnivore/v0.2.0/leaflet-omnivore.min.js'></script>
	<!-- <script src="https://raw.githubusercontent.com/calvinmetcalf/leaflet-ajax/master/dist/leaflet.ajax.min.js"></script> -->
		<!-- Date: 2014-12-17 -->

<?php
/*
/  PHP TEIL vom Comment System
/  muss eingebunden werden
*/ 

// Error reporting:
error_reporting(E_ALL^E_NOTICE);

include "commentSys/connect.php";

include "commentSys/comment.class.php";

/*
/	Select all the comments and populate the $comments array with objects
*/
$cookie = $_COOKIE['URL'];
$comments = array();
$result = pg_query("SELECT * FROM comments
WHERE page_id = '$cookie' ORDER BY id DESC");

while($row = pg_fetch_assoc($result))
{
	$comments[] = new Comment($row);
}

?>

</head>
	<body>
	<div class="fixed">
        <nav class="top-bar" data-topbar role="navigation">
            <ul class="title-area">
                <li class="name">
                    <h1><a href="index.php">Cartostroph!</a></h1>
                </li>
                <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
            </ul>
            <section class="top-bar-section">
                <!-- Right Nav Section -->
                <ul class="right">
                	
                	<!-- Loginfunktion -->
                    <li class="has-dropdown">
                        <a href="#" data-dropdown="login-dropdown">Login</a>
                    </li>
                 <!-- FAQ aufrufen -->
                    <li>
                        <a href="FAQ.html">Hilfe</a>
                    </li>
                    
                    
                    
                    <!-- Pop-Up f�r Registrierung  -->
                    <li>
                        <a href="#" data-reveal-id="RegisterModal">Registrierung</a>
                    </li>
                    
                    
                    <!-- Dropdown-Login-Feld -->
				    <div id="login-dropdown" class="f-dropdown tiny content" data-dropdown-content="true" width="10%" data-options="align:left">
				        <h5>Log In:</h5>
				        <form id="top-nav-login" action="login.php" method="post">
				            <div class="row">
				                <label>User</label>
				                <input type="text" name="user" placeholder="email@example.com" tabindex="1" /><br />
				            </div>
				            <div class="row">
				                <label>Password</label>
				                <input type="password" name="password" placeholder="********" tabindex="2" /><br />
				            </div>
				            <div class="row">
				                <input type="submit" class="button tiny success" value="Login" tabindex="3" />
				            </div>
				            <p><br /> Sie haben noch kein Konto? Zur Registrierung geht es <a onclick="test" data-reveal-id="RegisterModal">hier</a></p>
				        </form>
				    </div>
				    
				    
				    <!-- PopUp-Registrierungs-Formular -->
				    <div id="RegisterModal" class="reveal-modal" data-reveal>
				        <h2> Registrierung </h2>
				        <form action="register.php" method="post">
				            Benutzername: <input type="text" id="Benutzername" name="Benutzername" required />
				            Passwort: <input type="password" id="passwort" name="Passwort" required />
				            Passwort wiederholen:<input type="password" id="passwortWieder" name="Passwort" required />
				            Ort (optional): <input type="text" name="Ort" id="Ort" />
				            PLZ (optional): <input type="text" name="PLZ" id="PLZ" />
				            Land (optional): <input type="text" name="Land" id="Land" />
				            <input id="regist" type="submit" class="button expand" value="Registrieren" />
				            <a style="text-align: right ;position: relative ; font-size: 120%" class="close-reveal-modal">Abbrechen</a><br />
				            <br />
				        </form>
				    </div>
				    
				 
                </ul>
            </section>
        </nav>
    </div>

	<div id="map" style="width: 100%; height: 92.5%;"></div> 
	<script>
	var map = L.map('map').setView([51.505, -0.09], 2);
		
		L.tileLayer('https://{s}.tiles.mapbox.com/v3/{id}/{z}/{x}/{y}.png', {
			maxZoom: 18,
			attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
				'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery � <a href="http://mapbox.com">Mapbox</a>',
			id: 'examples.map-i875mjb7'
		}).addTo(map);
		
		
		
/*      Beispiele von URL:
		geojson: http://giv-geosoft2c.uni-muenster.de/Bartosz/cartostroph/de/leonardttown.geojson
		kml http://giv-geosoft2c.uni-muenster.de/Bartosz/cartostroph/de/balloon-image-rel.kml
		wms: "http://mesonet.agron.iastate.edu/cgi-bin/wms/nexrad/n0r.cgi"
		jpeg: http://basemap.nationalmap.gov/arcgis/rest/services/USGSShadedReliefOnly/MapServer/WMTS/tile/1.0.0/USGSShadedReliefOnly/default/default028mm/4/7/4.jpg
		png: http://fc03.deviantart.net/fs70/f/2013/012/e/c/png_cookie_by_ellatutorials-d5r8nel.png
		jpg mit Koordinaten: http://www.lib.utexas.edu/maps/historical/newark_nj_1922.jpg [[40.712216, -74.22655], [40.773941, -74.12544]]
		* */

		
		
		
		
		//var URL = 'http://giv-geosoft2c.uni-muenster.de/Bartosz/cartostroph/de/leonardttown.geojson'   //diese wird aus der Datenabnk gezogen
		 var URL = getCookie("URL"); 
		 var Typ = URL.split(".");
		 var Laenge = Typ.length;
		 alert(Typ[(Laenge-1)]);
		 showDataOnMap(URL);
		
		
	</script>

<!--
  Div-Container vom Comment System
  zum Kommentar Erstellen
-->


<div id="addCommentContainer" style="
top: 50px;
">

	<p>Kommentar</p>
	<form id="addCommentForm" method="post" action="">
    	<div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" />
            
            <label for="email">Email-Addresse</label>
            <input type="text" name="email" id="email" />
         
            <label for="page_id">URL (optional)</label>
            <input type="hidden" name="page_id" id="page_id" />

<script>
var url1 = getCookie("URL"); 
document.getElementById("page_id").value= url1; 
</script>

  	<p><abbr title="Hier geben Sie an wie gut Sie den Datensatzfinden.Skala von 1(sehr schlecht/unbrauchbar) bis 5(perfekt)"><img src="../img/info.png" width="15px" height="15px"/></abbr> 
		Bewertung (optional): <br /><input id="checkbox1" name="checkbox1" type="checkbox" onclick="activateAssessment()"><label for="checkbox1" >Bewertung ausschalten</label>
  		<div class="row">
  		    <div class="small-10 medium-11 columns">
  		      <div id="Bewertung" name="Bewertung" onclick="activateSlider()" class="range-slider" data-slider enabled data-options="display_selector: #sliderOutput3; start: 1; end: 5;" >
  		      <span class="range-slider-handle" role="slider" tabindex="0"></span>
  		      <span class="range-slider-active-segment"></span> 
			<input type="hidden" name = "rating">
  		    </div> 
  		  </div>
  		<div class="small-2 medium-1 columns">
  		<span id="sliderOutput3"></span>
  		</div>
  	    </div>
  	</p>

            <label for="body">Kommentar</label>
            <textarea name="body" id="body" cols="20" rows="5"></textarea>
            
            <input type="submit" id="submit" value="Abschicken" class="button"/>
        </div>
    </form>
</div>

<?php
/*
/  PHP TEIL vom Comment System
/  Gibt alle Kommentare aus der Datenbank aus
*/

foreach($comments as $c){
	echo $c->markup();
}

?>


	<script>
  		$(document).foundation();
	</script>
	</body>
</html>

