<!doctype html>
<html class="no-js" lang="de-de">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cartostroph | Search</title>
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
                        <a href="FAQ.php">Help</a>
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
                    <li><a href="#" data-reveal-id="BboxModal2">Create new topic</a>
                    	
                    	
                    	<div id="myModal" class="reveal-modal" data-reveal>
                    		<h3>Choose a postion on the map</h3>
                    		<a id="setCoordinate" style="text-align: right ;position: relative ; font-size: 120%" class="close-reveal-modal">OK</a>
                    		<script type="text/javascript">
                    			document.getElementById("setCoordinate").onclick = newMarker;
                    		</script>
						</div>
						
						
						<!-- popUp fuer Boundingbox -->
						<div id="BboxModal2" data-options="close_on_background_click:false" class="reveal-modal" data-reveal>
                    		<h3>Define the bounding box, by clicking two points on the map.</h3>
                    		<a id="setBbox2" style="text-align: right ;position: relative ; font-size: 120%" class="close-reveal-modal">Define bounding box</a><br />
                    		<a id="rejectBbox2" onclick="discardTopic" style="text-align: left ;position: relative ; font-size: 120%" class="close-reveal-modal">Cancel</a>
                    		<script type="text/javascript">
                    			document.getElementById("setBbox2").onclick = createTopicBoundingBox;
                    		</script>
						</div>
						
						<!-- popUp fuer Boundingbox -->
						<div id="confirmBbox"data-options="close_on_background_click:false" class="reveal-modal" data-reveal>
							<h3>Are you satisfied with the bounding box?</h3>
							<a id="setBbox3" style="text-align: right ;position: relative ; font-size: 120%"  class="close-reveal-modal" data-reveal-id="newTopicModal">Yes</a><br />
                    		<a id="rejectBbox2" onclick="discardTopic()" style="text-align: left ;position: relative ; font-size: 120%" class="close-reveal-modal">No</a>
                    		<script>
                    			document.getElementById("setBbox3").onclick = fillForm;
                    		</script>
						</div>

                  		<!-- Formular zur Erstellung eines Topics  -->
						<div id="newTopicModal" data-options="close_on_background_click:false" class="reveal-modal" data-reveal>
  							<h3>Add a spatial data set</h3>
  							<form action="topic.php" method="post">
  								<p>Latitude from the center of the bounding box: <input id="Breitengrad" readonly="readonly" type="number" name="Breitengrad"/> </p>
  								<p>Longitude from the center of the bounding box: <input id="Längengrad" readonly="readonly" type="number" name="Längengrad"/> </p>
  								<p><abbr title="Here you enter under which internet address the spatial data set is discoverable"><img src="../img/info.png" width="15px" height="15px" /></abbr> URL: <input type="text" id="URL" name="URL" required/> </p>
  								<p><abbr title="Here you enter a suitable title for the data set , eg'Überflutungsdaten Münster 2014'"><img src="../img/info.png" width="15px" height="15px"/></abbr> Title: <input type="text" id="Titel" name="Titel" required /></p>
  								<p><abbr title="Here you specify what you think about the spatial data set . Is it helpful? Is it good ? Something missing ?"><img src="../img/info.png" width="15px" height="15px"/></abbr> Comment: <textarea type="text"  id="Kommentar" name="Kommentar" required></textarea></p>
  								<p><abbr title="Here you can optionally choose a category for the spatial expansion of your geodata. Choose between:
					                World
					                Continent
					                Country
					                Region
					                City
				                    " style ="text-align:left;">
						            <img src="../img/info.png" width="15px" height="15px"/></abbr>&ensp;Category
									<select id="Kategorie" name="Kategorie">
										<option value="Keine">No Category</option>
  								        <option value="Welt">World</option>
  										<option value="Kontinent">Continent</option>
  										<option value="Land">Country</option>
  										<option value="Region">Region</option>
  										<option value="Stadt">City</option>
								    </select>
								</p>
  								<p><abbr title="Give a date since the data is valid."><img src="../img/info.png" width="15px" height="15px"/></abbr>
  								Time extent - start (optionally) <input type="date" id="start" name="start" />	
  								</p>
  								<p><abbr title="Give a date up to when the data can be valid."><img src="../img/info.png" width="15px" height="15px"/></abbr> 
  								Time extent - end (optionally) <input type="date" id="end" name="end" />	
  								</p>
  								<p><abbr title="Here you can rate the data from 1 (very bad) to 5 (very good)."><img src="../img/info.png" width="15px" height="15px"/></abbr> 
								Rating (optionally): <br /><input id="checkbox1" name="checkbox1" type="checkbox" onclick="activateAssessment()"><label for="checkbox1" >disable rating</label>
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
  								<p><abbr title="Here you can give tags. Later your data can be easier found."><img src="../img/info.png" width="15px" height="15px"/></abbr> 
								Tags (optionally): <input type="text" id="tags" name="tags"/>
								</p>
								<p><abbr title="Here you can add another URL, which gives additional information to your geodata, or is a newer version of it."><img src="../img/info.png" width="15px" height="15px"/></abbr> 
								Hyperlink (optionally): <input type="text" id="hyperlink" name="hyperlink"/>
								</p>
								<p>Author <input id="Autor" type="text" readonly="readonly" name="Autor"/>
								<input type="hidden" id="cTbboxLLcoor" name="cTbboxLLcoor"/>
								<input type="hidden" id="cTbboxURcoor" name="cTbboxURcoor"/>
								
								<input type="submit" class="button expand" value="Topic erstellen"/>
        					</form>
  							<a id="cancelTopic" style="position: relative ; font-size: 120%" class="close-reveal-modal" onclick="discardTopic()">Cancel</a><br />
                            <br />
					    </div>
					</li>

					<!-- Pop-Up für Registrierung  -->
                    <li>
                        <a href="#" data-reveal-id="RegisterModal">Registration</a>
                    </li>
					
					<!-- Schnellsuche -->
						
					<li class="has-form">
						<div class="row collapse">
							<form action="filter.php" method="get">
								<input type="text" placeholder="Quick search" name="search">
							</form>
						</div>
					</li>
					
					<!-- Impressum aufrufen -->
                    <li>
                        <a href="Impressum.php">Imprint</a>
                    </li>
                    
                    
                </ul>
            </section>
        </nav>
    </div>

    <!-- PopUp-Registrierungs-Formular -->
    <div id="RegisterModal" class="reveal-modal" data-reveal>
        <h2> Registration </h2>
        <form action="register.php" method="post">
            Username: <input type="text" id="Benutzername" name="Benutzername" required />
            Password: <input type="password" id="passwort" name="Passwort" required />
            Retype password:<input type="password" id="passwortWieder" name="Passwort2" required />
            City (optional): <input type="text" name="Ort" id="Ort" />
            Zip Code (optional): <input type="text" name="PLZ" id="PLZ" />
            Country (optional): <input type="text" name="Land" id="Land" />
            <input id="regist" type="submit" class="button expand" value="Register" />
            <a style="text-align: right ;position: relative ; font-size: 120%" class="close-reveal-modal">Abort</a><br />
            <br />
        </form>
    </div>
	
    <!-- Dropdown-Login-Feld -->
    <div id="login-dropdown" class="f-dropdown small content" data-dropdown-content="true" width="10%">
        <h5>Log In:</h5>
		
        <form id="top-nav-login" action="login.php" method="post">
            <div class="row">
                <label>User</label>
                <input type="text" name="user" placeholder="name" tabindex="1" />
            </div>
            <div class="row">
                <label>Password</label>
                <input type="password" name="password" placeholder="********" tabindex="2" />
            </div>
            <div class="row">
                <input type="submit" class="button tiny success" value="Login" tabindex="3" />
            </div>
            <p>You do not have an account? You can register one <a onclick="test" data-reveal-id="RegisterModal">here</a></p>
        </form>
    </div>
	
	<!-- Dropdown-Eingeloggt-Feld -->
	<div id="loggedin-dropdown" class="f-dropdown small content" data-dropdown-content="true" width="10%">
		<h5 id="eingeloggtAls"><h5>
			<script>
				document.getElementById("eingeloggtAls").innerHTML = "Logged in as: " + author();
			</script>
			<ul id="drop" class="[tiny small medium large content]f-dropdown" data-dropdown-content>
			  <a href="#" data-reveal-id="Profile">Profile</a>

					<div id="Profile" class="reveal-modal" data-reveal>
					  <h3 id="benutzername">My Profile: </h3>
					  
					  <script>
						document.getElementById("benutzername").innerHTML = "Mein Profil: " + author();
					  </script>
					  <form action="alteruser.php" method="post">
						<p>City: <input type="text" id="ort" name="ort" style="width: 75%;"/></p>
						<p>Zip Code: <input type="text" id="plz" name="plz" style="width: 75%;"/></p>
						<p>Country: <input type="text" id="land" name="land" style="width: 75%;"/></p>
						<button style="float: right;">Edit</button>
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
							}else{ echo 'document.getElementById("ort").value = "not specified";';}
							if ($plz != ''){
								echo 'document.getElementById("plz").value = "'.$plz.'";';
							}else{ echo 'document.getElementById("plz").value = "not specified";';}
							if ($land != ''){
								echo 'document.getElementById("land").value = "'.$land.'";';
							}else{ echo 'document.getElementById("land").value = "not specified";';}
							echo '</script>';
							
							//echo 'Ort: <input value="' . $ort . '"type=\"text\" id=\"ort\" name=\"ort\" style=\"width: 90%;\"/>';
							//echo 'PLZ: <input value="' . $plz . '" type=\"text\" id=\"plz\" name=\"plz\" style=\"width: 90%;\"/>';
							//echo 'Land: <input value="' . $land . '" type=\"text\" id=\"land\" name=\"land\" style=\"width: 90%;\"/>';
						}
						
						if (!fechted){
							echo 'document.getElementById("ort").value = "not specified";';
							echo 'document.getElementById("plz").value = "not specified";';
							echo 'document.getElementById("land").value = "not specified";';
						}

						// free memory
						pg_free_result($result);
						?>	
					</div>
			
			  
			  <br /><a href="infouser.php">My topics and comments</a>
			  <br /><a href="logout.php">Logout</a>
			</ul>
	</div>

   <!-- Pop-Up mit Hilfestellung beim ersten Aufruf  -->
    <div id="HilfeModal" class="reveal-modal" data-reveal>
        <h1>Welcome to the Helpside of Cartostroph!</h1>
        <p>This side helps you using Cartostroph!</p>
        <p>
            Cartostroph! is a Web App trying to muster up geodata. 
			When you found interesting geodata, share it right here!
        </p>
        <p>
            <b>How can I add geodata?</b>
            <br />
            <ul>
                <li>Click "Add new topic" in the toolbar above.</li>
                <li>
                    Click the OK button in the following Window.
					Then click two times to define the bounding box of your geodata.
                </li>
                <li>Add informations to the geodata. <a href="#FormularRichtig">Here</a> you can find help.</li>
                <li>When you filled in all important information click "submit"</li>
                <li>Now you have crated a Marker which is linked to your geodata, which can be commented and rated from other users.</li>
            </ul>
        </p>
        <p id="FormularRichtig">
            <b>How to fill in the form for my geodata?</b>
            <br />
            <ul>
                <li><strong>URL</strong>: Here the link of your geodata is requested</li>
                <li><strong>Title</strong>: Choose a title for your geodata, for example "Hurricane data of Florida"</li>
                <li><strong>Comment</strong>: Here you can comment to the geodata. Is it helpful? Are there any mistakes in it? etc.</li>
                <li>
                    <strong>Category (optionally)</strong>: Choose which region the geodata you want to add is representing. At choice: <ul>
                        <li>World</li>
                        <li>Continent</li>
                        <li>Country</li>
                        <li>Region</li>
                        <li>City</li>
                    </ul>
                </li>
                <li><strong>Time extent - start (optionally)</strong>: Give a date since the data is valid</li>
                <li><strong>Time extent - end (optionally)</strong>: Give a date up to when the data can be valid.</li>
                <li><strong>Bewertung (optionalyl)</strong>: Here you can rate the data from 1 (very bad) to 5 (perfect).</li>
                <li><strong>Tags (optionally)</strong>: Here you can give tags. Later your data can be easier found. </li>
                <li><strong>Hyperlink (optionally)</strong>: Here you can add another URL, which gives additional information to your geodata, or is a newer version of it.</li>
            </ul>
        </p>
        <input id="HilfeAusschalten" type="checkbox"><label for="HilfeAusschalten">Hilfe nicht mehr anzeigen</label><br />
        <a onclick="hilfeCookie()" style="text-align: right ;position: relative ; font-size: 120%" class="close-reveal-modal">Weiter</a><br />
        <br />
    </div>
	
	
    <div class="large-8 columns" id="map" style="height: 100%;">

	</div>
	<div id="SearchContent" class="large-4 columns"> <h3>Search</h3>
        <form action="filter.php" method="get">
                  <p><input type="text" placeholder="Suche" id="search" name="search"></p>
                  <p>Category: <select id="KategorieSuche" name="KategorieSuche">
                      <option value="Keine">No Category</option>
                      <option value="Welt">World</option>
                      <option value="Kontinent">Continent</option>
                      <option value="Land">Country</option>
                      <option value="Region">Region</option>
                      <option value="Stadt">City</option>
                   </select>
                   </p>
                  <p><abbr title="Give a date since the data is valid."><img src="../img/info.png" width="15px" height="15px"/></abbr>
                  Start <input type="date" id="startSuche" name="startSuche" placeholder="yyyy-mm-dd"/> 
                  </p>
                  <p><abbr title="Give a date up to when the data can be valid."><img src="../img/info.png" width="15px" height="15px"/></abbr> 
                  End <input type="date" id="endSuche" name="endSuche" placeholder="yyyy-mm-dd"/>  
                  </p>
                    <p>Rating: <select id="BewertungSuche" name="BewertungSuche">
                                <option value="Keine">No Restriction</option>
                                <option value="1">1 or higher</option>
                                <option value="2">2 or higher</option>
                                <option value="3">3 or higher</option>
                                <option value="4">4 or higher</option>
                                <option value="5">5</option>
                            </select>
                            </p>
					<p><abbr title="Based on your location you can do a spatial search with indication of the radius. Please indicate in km."><img src="../img/info.png" width="15px" height="15px"/></abbr>
					Radius search in kilometres <input type="text" id="radius" placeholder="0" name="radius" onchange="searchCircle()"></p>
					</p>
					<label for="leftpoint"></label>
            		<input type="hidden" name="leftpoint" id="leftpoint" />
            		<label for="rightpoint"></label>
            		<input hidden="hidden" name="rightpoint" id="rightpoint" /> 
					<p>
					<a style="text-align: right ;position: relative ; font-size: 100%" data-reveal-id="BboxModal" class="button tiny" >Bounding Box</a>
                            <p><input id="filter" type="submit" class="button expand" value="Search" />
                            </p>  
					<p>
					my Position: 
					<p>Latitude: <input id="lng" readonly="readonly" type="number" name="lng"/> </p>
  					<p>Longitude: <input id="lat" readonly="readonly" type="number" name="lat"/> </p>
		</form></h1>
	</div>


<!-- popUp fuer Boundingbox -->
<div id="BboxModal" data-options="close_on_background_click:false" class="reveal-modal" data-reveal>
                    		<h3>Define the bounding box, by clicking two points on the map.</h3>
                    		<a id="setBbox" style="text-align: right ;position: relative ; font-size: 120%" class="close-reveal-modal">Define Bounding Box</a><br />
                    		<a id="rejectBbox" style="text-align: left ;position: relative ; font-size: 120%" class="close-reveal-modal">Cancel</a>
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
                        $rating_avg = "No rating";
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
			echo 'var marker = L.marker([' . $Position . '],{icon: AnonymMarker}).addTo(map).bindPopup("Title: " + "' . $Titel . '" + "<br />Rating: "
								       		 + "' . $Bewertung . '" + "<br/> URL: " + "<a href=" + "' . $URL . '" + ">"+ "' . $URL . '"   + "</a>" +  
											 "<br/> Author: " + "' . $Autor . '"  + "<form action=\"DynamicMap.php\" method=\"get\">" + 
											 "<input type=\"hidden\" name=\"url\" value=\"" + "' . $URL . '" + "\"/>" + 
											 "<br /><br /><input class=\"button tiny\" id=\"filter\" type=\"submit\" value=\"More Infos...\"/>" + "</form>");';
			echo'} else {
				var marker = L.marker([' . $Position . '],{icon: EingeloggtMarker}).addTo(map).bindPopup("Title: " + "' . $Titel . '" + "<br />Rating: "
								       		 + "' . $Bewertung . '" + "<br/> URL: " + "<a href=" + "' . $URL . '" + ">"+ "' . $URL . '"   + "</a>" +
											 "<br/> Author: " + "' . $Autor . '"  + "<form action=\"DynamicMap.php\" method=\"get\">" +
											 "<input type=\"hidden\" name=\"url\" value=\"" + "' . $URL . '" + "\"/>" +
											 "<br /><br /><input class=\"button tiny\" id=\"filter\" type=\"submit\" value=\"More Infos...\"/>" + "</form>");
			}';
			echo 'marker.on(\'click\',clickMarker);';
			echo '</script>';
		}

		pg_free_result($result);
		
	?>
</body>
</html>
