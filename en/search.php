<!doctype html>
<html class="no-js" lang="de-de">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cartostroph | Suche</title>
    <link rel="stylesheet" href="../css/foundation/foundation.css" />
    <link rel="stylesheet" href="../css/default.css" />
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
    <script src="../js/vendor/modernizr.js"></script>
    <script src="../js/leaflet-Interaktion/Karteninteraktion.js"></script>
    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
    <script src="../js/leaflet-Interaktion/Leaflet-Search.js"</script>
    <script src="../js/leaflet-Interaktion/sprite.coffee"</script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css">
    <link rel="stylesheet" href="../js/dist(Marker)/leaflet.awesome-markers.css">
    <script src="../js/dist(Marker)/leaflet.awesome-markers.js"</script>
    <script src="../js/dist(Marker)/leaflet.awesome-markers.min.js"</script>		
    <link rel="stylesheet" href="../js/PanControl/L.Control.Pan.css">
    <link rel="stylesheet" href="../js/PanControl/L.Control.Pan.ie.css">
    <script src="../js/PanControl/L.Control.Pan.js"</script>	
</head>
<body id="index">
	<script>
		window.onload=HilfeAnzeigen;
		//window.onload=addMarkers;
	</script>
	
	
    <div class="fixed">
        <nav class="top-bar" data-topbar role="navigation">
            <ul class="title-area">
                <li class="name">
                    <h1><a href="index.php">Carto<span style="color: red;">stroph!</span></a></h1>
                </li>
                <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
            </ul>
            <section class="top-bar-section">
                <!-- Right Nav Section -->
                <ul class="right">
                	<li>
                    	</a> <a href="../de"><img src="../img/germany.gif"></a>
                    </li>
                    
                    <li>
                    	</a> <a href="../en"><img src="../img/uk.gif"></a>
                    </li>
                    
                    <li>
                    	</a> <a href="../pl"><img src="../img/poland.gif"></a>
                    </li>
                    
                    <!-- FAQ aufrufen -->
                    <li>
                        <a href="FAQ.php">Hilfe</a>
                    </li>

                   <!-- Loginfunktion -->
                    <li class="has-dropdown">
                        <a href="#" id="login-drop">Login</a>
						<script type="text/javascript">
                    			document.getElementById("login-drop").innerHTML = loggedIn();
								if (loggedIn() == "Login"){
									document.getElementById("login-drop").setAttribute("data-dropdown", "login-dropdown");
								}else{
									document.getElementById("login-drop").setAttribute("data-dropdown", "loggedin-dropdown");
								}
                    	</script>
						
                    </li>

                    <!-- Neues Topic erstellen -->
                    <li><a href="#" data-reveal-id="BboxModal2">Neues Topic anlegen</a>
                    	
                    	<!-- popUp fuer Boundingbox -->
						<div id="BboxModal2" data-options="close_on_background_click:false" class="reveal-modal" data-reveal>
                    		<h3>Definieren Sie die räumliche Ausdehnung, indem Sie zwei gegenüberliegende Eckpunkte klicken.</h3>
                    		<a id="setBbox2" style="text-align: right ;position: relative ; font-size: 120%" class="close-reveal-modal">Räumliche Ausdehnung definieren</a><br />
                    		<a id="rejectBbox2" onclick="discardTopic" style="text-align: left ;position: relative ; font-size: 120%" class="close-reveal-modal">Abbrechen</a>
                    		<script type="text/javascript">
                    			document.getElementById("setBbox2").onclick = createTopicBoundingBox;
                    		</script>
						</div>
						
						<!-- popUp fuer Boundingbox -->
						<div id="confirmBbox"data-options="close_on_background_click:false" class="reveal-modal" data-reveal>
							<h3>Sind Sie mit der räumlichen Ausdehnung zufrieden?</h3>
							<a id="setBbox3" style="text-align: right ;position: relative ; font-size: 120%"  class="close-reveal-modal" data-reveal-id="newTopicModal">Ja</a><br />
                    		<a id="rejectBbox2" onclick="discardTopic()" style="text-align: left ;position: relative ; font-size: 120%" class="close-reveal-modal">Nein</a>
                    		<script>
                    			document.getElementById("setBbox3").onclick = fillForm;
                    		</script>
						</div>

                  		<!-- Formular zur Erstellung eines Topics  -->
						<div id="newTopicModal" data-options="close_on_background_click:false" class="reveal-modal" data-reveal>
  							<h3>Fügen Sie einen Geodatensatz hinzu</h3>
  							<form action="topic.php" method="post">
  								<p>Breitengrad vom Zentrum der Bbox: <input id="Breitengrad" readonly="readonly" type="number" name="Breitengrad"/> </p>
  								<p>Längengrad vom Zentrum der Bbox: <input id="Längengrad" readonly="readonly" type="number" name="Längengrad"/> </p>
  								<p><abbr title="Hier geben Sie an unter welcher Internetadresse der Geodatensatz auffindbar ist"><img src="../img/info.png" width="15px" height="15px" /></abbr> URL: <input type="text" id="URL" name="URL" required/> </p>
  								<p><abbr title="Hier geben Sie einen geeigneten Titel des Datensatzens an, z.B. 'Überflutungsdaten Münster 2014'"><img src="../img/info.png" width="15px" height="15px"/></abbr> Titel: <input type="text" id="Titel" name="Titel" required /></p>
  								<p><abbr title="Hier geben Sie an was Sie über den Geodatensatz denken. Ist er hilfreich? Ist er gut? Fehlt etwas? etc."><img src="../img/info.png" width="15px" height="15px"/></abbr> Kommentar: <textarea type="text"  id="Kommentar" name="Kommentar" required></textarea></p>
  								<p><abbr title="Hier geben Sie an wie groß das Gebiet ist, welches vom Geodatensatz abgedeckt wird. Zur Auswahl stehen:
					                Welt
					                Kontinent
					                Land
					                Region
					                Stadt
				                    ">
						            <img src="../img/info.png" width="15px" height="15px"/></abbr>&ensp;Kategorie
									<select id="Kategorie" name="Kategorie">
										<option value="Keine">Keine Kategorie</option>
  								        <option value="Welt">Welt</option>
  										<option value="Kontinent">Kontinent</option>
  										<option value="Land">Land</option>
  										<option value="Region">Region</option>
  										<option value="Stadt">Stadt</option>
								    </select>
								</p>
  								<p><abbr title="Hier geben Sie an ab wann der Geodatensatz gültig ist"><img src="../img/info.png" width="15px" height="15px"/></abbr>
  								Zeitliche Ausdehnung - Start (optional) <input type="date" id="start" name="start" />	
  								</p>
  								<p><abbr title="Hier geben Sie an bis wann der Datensatz gültig war bzw. voraussichtlich sein wird."><img src="../img/info.png" width="15px" height="15px"/></abbr> 
  								Zeitliche Ausdehnung - Ende (optional) <input type="date" id="end" name="end" />	
  								</p>
  								<p><abbr title="Hier geben Sie an wie gut Sie den Datensatzfinden.Skala von 1(sehr schlecht/unbrauchbar) bis 5(perfekt)"><img src="../img/info.png" width="15px" height="15px"/></abbr> 
								Bewertung (optional): <br /><input id="checkbox1" name="checkbox1" type="checkbox" onclick="activateAssessment()"><label for="checkbox1" >Bewertung ausschalten</label>
  									<div class="row">
  									    <div class="small-10 medium-11 columns">
  										    <div id="Bewertung" name="Bewertung" onclick="activateSlider()" class="range-slider" data-slider disabled data-options="display_selector: #sliderOutput3; start: 1; end: 5;" >
  											    <span class="range-slider-handle" role="slider" tabindex="0"></span>
  												<span class="range-slider-active-segment"></span> 
												<input type="hidden" name = "Bewertung">
  											</div> 
  										</div>
  										<div class="small-2 medium-1 columns">
  											<span id="sliderOutput3"></span>
  										</div>
  									</div>
  								</p>
  								<p><abbr title="Hier geben Sie Tags an, damit der Datensatz später leichter zu finden ist."><img src="../img/info.png" width="15px" height="15px"/></abbr> 
								Tags (optional): <input type="text" id="tags" name="tags"/>
								</p>
								<p><abbr title="Hier geben Sie andere Internetquellen an, welche den Geodatensatz ergänzen - z.B. neuer oder besserer Datensatz, Zusatzinformationen zum betroffenen Gebiet, etc."><img src="../img/info.png" width="15px" height="15px"/></abbr> 
								Hyperlink (optional): <input type="text" id="hyperlink" name="hyperlink"/>
								</p>
								<p>Autor <input id="Autor" type="text" readonly="readonly" name="Autor"/>
								<input type="hidden" id="cTbboxLLcoor" name="cTbboxLLcoor"/>
								<input type="hidden" id="cTbboxURcoor" name="cTbboxURcoor"/>
								
								<input type="submit" class="button expand" value="Topic erstellen"/>
        					</form>
  							<a id="cancelTopic" style="position: relative ; font-size: 120%" class="close-reveal-modal" onclick="discardTopic()">Abbrechen</a><br />
                            <br />
					    </div>
					</li>

					<!-- Pop-Up für Registrierung  -->
                    <li>
                        <a href="#" data-reveal-id="RegisterModal">Registrierung</a>
                    </li>
					
					<!-- Schnellsuche -->
						
					<li class="has-form">
						<div class="row collapse">
							<form action="filter.php" method="get">
								<input type="text" placeholder="Schnellsuche" name="search">
							</form>
						</div>
					</li>
					
					<!-- Impressum aufrufen -->
                    <li>
                        <a href="Impressum.php">Impressum</a>
                    </li>
                    
                    
                </ul>
            </section>
        </nav>
    </div>

    <!-- PopUp-Registrierungs-Formular -->
    <div id="RegisterModal" class="reveal-modal" data-reveal>
        <h2> Registrierung </h2>
        <form action="register.php" method="post">
            Benutzername: <input type="text" id="Benutzername" name="Benutzername" required />
            Passwort: <input type="password" id="passwort" name="Passwort" required />
            Passwort wiederholen:<input type="password" id="passwortWieder" name="Passwort2" required />
            Ort (optional): <input type="text" name="Ort" id="Ort" />
            PLZ (optional): <input type="text" name="PLZ" id="PLZ" />
            Land (optional): <input type="text" name="Land" id="Land" />
            <input id="regist" type="submit" class="button expand" value="Registrieren" />
            <a style="text-align: right ;position: relative ; font-size: 120%" class="close-reveal-modal">Abbrechen</a><br />
            <br />
        </form>
    </div>
	
    <!-- Dropdown-Login-Feld -->
    <div id="login-dropdown" class="f-dropdown small content" data-dropdown-content="true" width="10%">
        <h5>Log In:</h5>
		
        <form id="top-nav-login" action="login.php" method="post">
            <div class="row">
                <label>Nutzer</label>
                <input type="text" name="user" placeholder="name" tabindex="1" />
            </div>
            <div class="row">
                <label>Passwort</label>
                <input type="password" name="password" placeholder="********" tabindex="2" />
            </div>
            <div class="row">
                <input type="submit" class="button tiny success" value="Login" tabindex="3" />
            </div>
            <p>Sie haben noch kein Konto? Zur Registrierung geht es <a onclick="test" data-reveal-id="RegisterModal">hier</a></p>
        </form>
    </div>
	
	<!-- Dropdown-Eingeloggt-Feld -->
	<div id="loggedin-dropdown" class="f-dropdown small content" data-dropdown-content="true" width="10%">
		<h5 id="eingeloggtAls"><h5>
			<script>
				document.getElementById("eingeloggtAls").innerHTML = "Eingeloggt als: " + author();
			</script>
			<ul id="drop" class="[tiny small medium large content]f-dropdown" data-dropdown-content>
			  <a href="#" data-reveal-id="Profile">Profil</a>

					<div id="Profile" class="reveal-modal" data-reveal>
					  <h3 id="benutzername">Mein Profil: </h3>
					  
					  <script>
						document.getElementById("benutzername").innerHTML = "Mein Profil: " + author();
					  </script>
					  <form action="alteruser.php" method="post">
						<p>Ort: <input type="text" id="ort" name="ort" style="width: 75%;"/></p>
						<p>PLZ: <input type="text" id="plz" name="plz" style="width: 75%;"/></p>
						<p>Land: <input type="text" id="land" name="land" style="width: 75%;"/></p>
						<button style="float: right;">Daten ändern</button>
						<a class="close-reveal-modal">&#215;</a>
					  </form>
						<?php
						// attempt a connection
						//ini_set('display_errors', '1');
						//error_reporting(E_ALL | E_STRICT);
						include("config.php");
						global $config;

						$connection = pg_connect($config["connection"]);
						if (!$connection) {
							die("Error in connection: " . pg_last_error());
						}
						
						$user = $_COOKIE['Autor'];

						// execute query
						$sql = "SELECT ort, plz, land FROM nutzer WHERE name='$user';";
	
						$result = pg_query($connection, $sql);
						if (!$result) {
							die("Error in SQL query: " . pg_last_error());
						}

						$fetched = false;
						
						// iterate over result set
						// print each row
						while ($row = pg_fetch_array($result)) {
							$ort = (string)$row[0];
							$plz = (string)$row[1];
							$land = (string)$row[2];
						
							$fetched = true;
							
							echo '<script>';
							if ($ort != ''){
								echo 'document.getElementById("ort").value = "'.$ort.'";';
							}else{ echo 'document.getElementById("ort").value = "keine Angabe";';}
							if ($plz != ''){
								echo 'document.getElementById("plz").value = "'.$plz.'";';
							}else{ echo 'document.getElementById("plz").value = "keine Angabe";';}
							if ($land != ''){
								echo 'document.getElementById("land").value = "'.$land.'";';
							}else{ echo 'document.getElementById("land").value = "keine Angabe";';}
							echo '</script>';
							
							//echo 'Ort: <input value="' . $ort . '"type=\"text\" id=\"ort\" name=\"ort\" style=\"width: 90%;\"/>';
							//echo 'PLZ: <input value="' . $plz . '" type=\"text\" id=\"plz\" name=\"plz\" style=\"width: 90%;\"/>';
							//echo 'Land: <input value="' . $land . '" type=\"text\" id=\"land\" name=\"land\" style=\"width: 90%;\"/>';
						}
						
						if (!fechted){
							echo 'document.getElementById("ort").value = "keine Angabe";';
							echo 'document.getElementById("plz").value = "keine Angabe";';
							echo 'document.getElementById("land").value = "keine Angabe";';
						}

						// free memory
						pg_free_result($result);
						?>	
					</div>
			
			  
			  <br /><a href="infouser.php">Meine Topics und Kommentare</a>
			  <br /><a href="logout.php">Logout</a>
			</ul>
	</div>

    <!-- Pop-Up mit Hilfestellung beim ersten Aufruf  -->
    <div id="HilfeModal" class="reveal-modal" data-reveal>
        <h1>Willkommen auf der Hilfeseite von Cartostroph!</h1>
        <p>Auf dieser Seite bekommen Sie Hilfestellung zur Nutzung von Cartostroph!</p>
        <p>
            Cartostroph! ist eine Webapplikation, welche als Ziel hat Geodatensätze an einem Ort zu versammeln (oder eher gesagt Verweise darauf). Wenn Sie einen
            tollen Geodatensatz im Internet gefunden haben und ihn mit anderen teilen möchten, sind Sie hier genau richtig!
        </p>
        <p>
            <b> Welche Formate können visualisiert werden?</b><br />
            <ul>
                <li>OGC WMS</li>
                <li>OGC WFS</li>
                <li>GML</li>
                <li>KML</li>
                <li>OGC WMTS</li>
                <li>h-geo(microfromat)</li>
                <li>JPEG</li>
                <li>PNG</li>
            </ul>
        </p>

        <p>
            <b> Wie füge ich einen neuen Geodatensatz hinzu? </b><br />
            <ul>
                <li>In der oberen Leiste auf "Neues Topic anlegen" klicken.</li>
                <li>Fenster bestätigen und einen Punkt auf der Karte per Klick auswählen, wo der Datensatz hinzugefügt werden soll.</li>
                <li>Informationen zum Geodatensatz angeben.
                <li>Wenn Sie sich sicher sind alles richtig ausgefüllt zu haben, klicken Sie auf "Abschicken"</li>
                <li>Nun gibt es einen Marker mit dem von Ihnen gefundenen Datensatz, welcher von anderen Nutzern kommentiert und bewertet werden kann.</li>
            </ul>
        </p>

        <p>
            <b> Wie fülle ich das Formular zum Geodatensatz richtig aus?</b><br />
            <ul>
                <li><strong>URL</strong>: Hier geben Sie an, unter welcher Internetadresse der Geodatensatz auffindbar ist.</li>
                <li><strong>Titel</strong>: Hier geben Sie einen geeigneten Titel des Datensatzens an, z.B. "Überflutungsdaten Münster 2014"</li>
                <li><strong>Kommentar</strong>: Hier geben Sie an, was Sie über den Geodatensatz denken. Ist er hilfreich? Ist er gut? Fehlt etwas? etc.</li>
                <li>
                    <strong>Kategorie</strong>: Hier geben Sie an wie groß das Gebiet ist, welches vom Geodatensatz abgedeckt wird. Zur Auswahl stehen:
                    <ul>
                        <li>Welt</li>
                        <li>Kontinent</li>
                        <li>Land</li>
                        <li>Region</li>
                        <li>Stadt</li>
                    </ul>
                </li>
                <li><strong>Zeitliche Ausdehnung - Start (optional)</strong>: Hier geben Sie an, ab wann der Geodatensatz gültig ist.</li>
                <li><strong>Zeitliche Ausdehnung - Ende (optional)</strong>: Hier geben Sie an, bis wann der Datensatz gültig war bzw. voraussichtlich sein wird.</li>
                <li><strong>Bewertung (optional)</strong>: Hier geben Sie an, wie gut Sie den Datensatzfinden. Skala von 1 (sehr schlecht/unbrauchbar) bis 5 (perfekt).</li>
                <li><strong>Tags (optional)</strong>: Hier geben Sie Tags an, damit der Datensatz später leichter zu finden ist. </li>
                <li><strong>Hyperlink (optional)</strong>: Hier geben Sie andere Internetquellen an, welche den Geodatensatz ergänzen - z.B. neuer oder besserer Datensatz, Zusatzinformationen zum betroffenen Gebiet, etc.</li>
            </ul>
        </p>
        <input id="HilfeAusschalten" type="checkbox"><label for="HilfeAusschalten">Hilfe nicht mehr anzeigen</label><br />
        <a onclick="hilfeCookie()" style="text-align: right ;position: relative ; font-size: 120%" class="close-reveal-modal">Weiter</a><br />
        <br />
    </div>
	
	
	
    <div class="large-8 columns" id="map" style="height: 100%;">

	</div>
	<div id="SearchContent" class="large-4 columns"> <h3>Suche</h3>
        <form action="filter.php" method="get">
                  <p><input type="text" placeholder="Suche" id="search" name="search"></p>
                  <p>Kategorie: <select id="KategorieSuche" name="KategorieSuche">
                      <option value="Keine">Keine Kategorie</option>
                      <option value="Welt">Welt</option>
                      <option value="Kontinent">Kontinent</option>
                      <option value="Land">Land</option>
                      <option value="Region">Region</option>
                      <option value="Stadt">Stadt</option>
                   </select>
                   </p>
                  <p><abbr title="Hier geben Sie an ab wann der Geodatensatz gültig ist"><img src="../img/info.png" width="15px" height="15px"/></abbr>
                  Start <input type="date" id="startSuche" name="startSuche" placeholder="jjjj-mm-tt"/> 
                  </p>
                  <p><abbr title="Hier geben Sie an bis wann der Datensatz gültig war bzw. voraussichtlich sein wird."><img src="../img/info.png" width="15px" height="15px"/></abbr> 
                  Ende <input type="date" id="endSuche" name="endSuche" placeholder="jjjj-mm-tt"/>  
                  </p>
                    <p>Bewertung: <select id="BewertungSuche" name="BewertungSuche">
                                <option value="Keine">Keine Einschränkung</option>
                                <option value="1">1 oder höher</option>
                                <option value="2">2 oder höher</option>
                                <option value="3">3 oder höher</option>
                                <option value="4">4 oder höher</option>
                                <option value="5">5</option>
                            </select>
                            </p>
					<p><abbr title="Hier können Sie auf Ihren Standort basiert eine räumliche Suche mit Radius machen. Bitte geben Sie die Kilometer an."><img src="../img/info.png" width="15px" height="15px"/></abbr>
					Radiussuche in Kilometer <input type="text" id="radius" placeholder="0" name="radius" onchange="searchCircle()"></p>
					</p>
					<label for="leftpoint"></label>
            		<input type="hidden" name="leftpoint" id="leftpoint" />
            		<label for="rightpoint"></label>
            		<input hidden="hidden" name="rightpoint" id="rightpoint" /> 
					<p>
					<a style="text-align: right ;position: relative ; font-size: 100%" data-reveal-id="BboxModal" class="button tiny" >Räumliche Ausdehnung</a>
                            <p><input id="filter" type="submit" class="button expand" value="Suchen" />
                            </p>  
					<p>
					mein Standort: 
					<p>Breitengrad: <input id="lng" readonly="readonly" type="number" name="lng"/> </p>
  					<p>Längengrad: <input id="lat" readonly="readonly" type="number" name="lat"/> </p>
		</form></h1>
	</div>


<!-- popUp fuer Boundingbox -->
<div id="BboxModal" data-options="close_on_background_click:false" class="reveal-modal" data-reveal>
                    		<h3>Definieren Sie die räumliche Ausdehnung, indem Sie zwei gegenüberliegende Eckpunkte klicken.</h3>
                    		<a id="setBbox" style="text-align: right ;position: relative ; font-size: 120%" class="close-reveal-modal">Räumliche Ausdehnung definieren</a><br />
                    		<a id="rejectBbox" style="text-align: left ;position: relative ; font-size: 120%" class="close-reveal-modal">Abbrechen</a>
                    		<script type="text/javascript">
                    			document.getElementById("setBbox").onclick = searchBoundingBox;
                    			document.getElementById("rejectBbox").onclick = discardTopic;
                    		</script>
						</div>



    <!-- Skriptabschnitt -->
    <script src="../js/vendor/jquery.js"></script>
    <script src="../js/foundation/foundation.min.js"></script>
    <!-- <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script> -->
    <script type="text/javascript">
        $(document).foundation();
		
        // create a map in the "map" div, set the view to a given place and zoom
        var addMarker = false;
        var TopicBBox = null;
        var lpoint = null;
        var rpoint = null
       
        var osmLink = '<a href="http://openstreetmap.org">OpenStreetMap</a>',
    		thunLink = '<a href="http://thunderforest.com/">Thunderforest</a>';

	    var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    		osmAttrib = '&copy; ' + osmLink + ' Contributors',
    		landUrl = 'http://{s}.tile.thunderforest.com/landscape/{z}/{x}/{y}.png',
    		thunAttrib = '&copy; '+osmLink+' Contributors & '+thunLink;
            mapUrl = 'https://{s}.tiles.mapbox.com/v3/examples.map-i875mjb7/{z}/{x}/{y}.png',
            mapAttrib = '<a href="http://www.mapbox.com/about/maps/" target="_blank">Terms &amp; Feedback</a>';
            aerialUrl = 'http://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}.png';

	    var osmMap = L.tileLayer(osmUrl, {attribution: osmAttrib}),
    		landMap = L.tileLayer(landUrl, {attribution: thunAttrib});
            mapBox = L.tileLayer(mapUrl, {attribution: mapAttrib});
            aerial = L.tileLayer(aerialUrl, {attribution: mapAttrib});

	    var map = L.map('map', {
      		layers: [mapBox], // only add one!
			minZoom: 2 ,
    		worldCopyJump : true
    	})
    		.setView([30.505, 0], 2);

	    var baseLayers = {
  		    "OSM Mapnik": osmMap,
  		    "Landscape": landMap,
            "MapBox": mapBox,
            "Aerial": aerial
	    };

	    L.control.layers(baseLayers, null, {position: 'bottomleft'}).addTo(map);

        //zoom to location of user 
	    map.locate({ setView: true, maxZoom: 12 });
        
        map.on('locationfound', onLocationFound);
      
        map.on('locationerror', onLocationError);
        L.control.pan().addTo(map);
		map.addControl(L.control.search());
		
		map.on('click', onMapClick);
		// map.on('mouseout',resetView);
    </script>
	<?php 
	
		// attempt a connection
		//ini_set('display_errors', '1');
		//error_reporting(E_ALL | E_STRICT);

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
			$URL = (string)$row[0];
			$Titel = (string)$row[1];
			$Pos = (string)$row[2];
			$Position = substr($Pos, 1, -1);
                        $Autor = (string)$row[4];

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
					
			echo '<script type="text/javascript"> ';
			
			echo 'var AnonymMarker = L.AwesomeMarkers.icon({
    			  markerColor: "red",
    			  });';
				  
			echo 'var EingeloggtMarker = L.AwesomeMarkers.icon({
    			  markerColor: "blue",
    			  });';	  
			
			echo 'var autor = "' . $Autor . '";';
			echo 'if(autor == "" || autor == 0 || autor == "Gość" || autor == "Gast" || autor == "Guest"){';
			echo 'var marker = L.marker([' . $Position . '],{icon: AnonymMarker}).addTo(map).bindPopup("Titel: " + "' . $Titel . '" + "<br />Bewertung: "
								       		 + "' . $Bewertung . '" + "<br/> URL: " + "<a href=" + "' . $URL . '" + ">"+ "' . $URL . '"   + "</a>" +  
											 "<br/> Autor: " + "' . $Autor . '"  + "<form action=\"DynamicMap.php\" method=\"get\">" + 
											 "<input type=\"hidden\" name=\"url\" value=\"" + "' . $URL . '" + "\"/>" + 
											 "<br /><br /><input class=\"button tiny\" id=\"filter\" type=\"submit\" value=\"Mehr Infos...\"/>" + "</form>");';
			echo'} else {
				var marker = L.marker([' . $Position . '],{icon: EingeloggtMarker}).addTo(map).bindPopup("Titel: " + "' . $Titel . '" + "<br />Bewertung: "
								       		 + "' . $Bewertung . '" + "<br/> URL: " + "<a href=" + "' . $URL . '" + ">"+ "' . $URL . '"   + "</a>" +
											 "<br/> Autor: " + "' . $Autor . '"  + "<form action=\"DynamicMap.php\" method=\"get\">" +
											 "<input type=\"hidden\" name=\"url\" value=\"" + "' . $URL . '" + "\"/>" +
											 "<br /><br /><input class=\"button tiny\" id=\"filter\" type=\"submit\" value=\"Mehr Infos...\"/>" + "</form>");
			}';
			echo 'marker.on(\'click\',clickMarker);';
			echo '</script>';
		}

		pg_free_result($result);
		
	?>
</body>
</html>
