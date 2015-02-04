<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Cartostroph | Geodatensatz</title>
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
		<script src="../js/sweetAlert/sweet-alert.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../js/sweetAlert/sweet-alert.css">
	   <!-- <script src="https://raw.githubusercontent.com/calvinmetcalf/leaflet-ajax/master/dist/leaflet.ajax.min.js"></script> -->
	  	<!-- Date: 2014-12-17 -->

<?php
/*
/  PHP TEIL vom Comment System
/  muss eingebunden werden
*/ 

// Error reporting:
//error_reporting(E_ALL^E_NOTICE);

include "commentSys/connect.php";

include "commentSys/comment.class.php";

/*
/	Select all the comments and populate the $comments array with objects
*/
$link = $_GET['url'];
$cookie = $link;
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
        <nav id="topbar" class="top-bar" data-topbar role="navigation">
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
					
					<!-- FAQ aufrufen -->
                    <li>
                        <a href="FAQ.php">Hilfe</a>
                    </li>
                    
                    
                    
                    <!-- Pop-Up f�r Registrierung  -->
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
					
					<!-- Suchfeld -->
					 <li>
						<a href="search.php">Suche</a>
                    </li>
					
					<!-- Impressum aufrufen -->
                    <li>
                        <a href="Impressum.php">Impressum</a>
                    </li>
					
					 </ul>
            </section>
        </nav>
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


					
		<!-- Inhalt -->
	<div class="large-8 columns" >
		<div class="row" id="map" style="height: 92.5%"><h1 style="color: transparent">das</h1>
			<h1 style="color: transparent">Whoop whoop</h1>
			<h1 style="color: transparent">Whoop whoop</h1>
			<h1 style="color: transparent">https://www.youtube.com/watch?v=auMW8u_Ixhs</h1>
			<h1 style="color: transparent">https://www.youtube.com/watch?v=auMW8u_Ixhs</h1>
			<h1 style="color: transparent">Whoop whoop</h1>
			<h1 style="color: transparent">Whoop whoop</h1>
		</div>
		<table>
				<tr><th>URL:</th> <th id="URL"></th></tr>
				<tr><th>Titel:</th> <th id="Titel"></th></tr>
				<tr><th>Autor:</th> <th id="Autor"></th></tr>
				<tr><th>Kommentar:</th> <th id="Commen"></th></tr>
                                <tr><th>Durchschnittliche Bewertung:</th> <th id="DBewertung"></th></tr>
				<tr><th>Kategorie:</th> <th id="Kategorie"></th></tr>
				<tr><th>Hyperlinks:</th> <th id="Hyperlinks"></th></tr>
				<tr><th>Tags:</th> <th  id="tag"></th"></tr>
				<tr><th>Startdatum:</th> <th  id="Startdatum"></th"></tr>
				<tr><th>Enddatum:</th> <th  id="Enddatum"></th"></tr>
			</table>
		</div>
		
		<?php 
	
		// attempt a connection
		//ini_set('display_errors', '1');
		//error_reporting(E_ALL | E_STRICT);

		include("config.php");
		
		// execute query
		$url = (string)$_GET['url'];
		$sql = "SELECT bewertung, hyperlink, kategorie, titel, autor, tag, anfangsdatum ,enddatum, text FROM topic WHERE url_top = '$url'";
		$result = pg_query($connection, $sql);
		if (!$result) {
			die("Error in SQL query: " . pg_last_error());
		}
		
		$sql6 = "SELECT bewertung FROM topic WHERE url_top = '$url'";

                    $sql4 = "SELECT sum(rating) FROM comments WHERE page_id ='$url'";

                    $sql5 = "SELECT count(rating) FROM comments WHERE page_id ='$url'";

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
		
		
		
		
		while ($row = pg_fetch_array($result)) {
			$bewertung = (string)$row[0];
			$hyperlink = (string)$row[1];
			$kategorie = (string)$row[2];
			$titel = (string)$row[3];
			$autor = (string)$row[4];
			$tag = (string)$row[5];
			$startdatum = (string)$row[6];
			$enddatum = (string)$row[7];
			$text = (string)$row[8];
			
			if($startdatum == "0001-01-01") {
				$startdatum = "universell";
			}
			
			if($enddatum == "9999-12-31") {
				$enddatum = "universell";
			}
				
			
			
			echo '<script type="text/javascript"> ';
			echo 'document.getElementById("URL").innerHTML =  "<a href=" + "' . $url . '" + ">"+ "' . $url . '"   + "</a>";';
			echo 'document.getElementById("Titel").innerHTML = "'. $titel .'";';
			echo 'document.getElementById("Autor").innerHTML = "'. $autor .'";';
			echo 'document.getElementById("DBewertung").innerHTML = "'. $Bewertung .'";';
			echo 'document.getElementById("Kategorie").innerHTML = "'. $kategorie .'";';
			echo 'document.getElementById("Hyperlinks").innerHTML = "'. $hyperlink .'";';
			echo 'document.getElementById("tag").innerHTML = "'. $tag .'";';
			echo 'document.getElementById("Startdatum").innerHTML = "'. $startdatum .'";';
			echo 'document.getElementById("Enddatum").innerHTML = "'. $enddatum .'";';
			echo 'document.getElementById("Commen").innerHTML = "'. $text .'";';
			echo '</script>';
			
		};
		
	?>
	</div>
<div class="large-4 columns"> 
	     <div id="addCommentContainer">
	
        <form id="addCommentForm" method="post" action="">
    	<div>
	     <p>Autor <input id="name" type="text" readonly="readonly" name="name"/>
         	<label for="leftpoint"></label>
            <input type="text" readonly="true" name="leftpoint" id="leftpoint" />
            <label for="rightpoint"></label>
            <input type="text" readonly="true" name="rightpoint" id="rightpoint" /> 
			
            <label for="page_id"></label>
            <input type="hidden" name="page_id" id="page_id" />
			<?php
				$url = (string)$_GET['url'];
				echo '<script>';
				//var url1 = getCookie("URL"); 
				//var abc = window.location.href;
				//var url1 = abc.substring(72);
				echo 'document.getElementById("page_id").value= "' . $url . '";'; 
				echo 'document.getElementById("name").value = author();';
				echo '</script>';
			?>
  	<p><abbr title="Hier geben Sie an wie gut Sie den Datensatzfinden.Skala von 1(sehr schlecht/unbrauchbar) bis 5(perfekt)"><img src="../img/info.png" width="15px" height="15px"/></abbr> 
		Bewertung (optional): <br /><input id="checkbox1" checked="true" name="checkbox1" type="checkbox" onclick="activateAssessment()"><label for="checkbox1" >Bewertung ausschalten</label>
  		<div class="row">
  		    <div class="small-10 medium-11 columns">
  		      <div id="Bewertung" name="Bewertung" onclick="activateSlider()" class="range-slider" data-slider enabled data-options="display_selector: #sliderOutput3; start: 1; end: 5;" >
  		      <span class="range-slider-handle" role="slider" tabindex="0"></span>
  		      <span class="range-slider-active-segment"></span> 
			<input type="hidden" name = "rating">
  		    </div>
  		    <script>
  		    	document.getElementById("Bewertung").setAttribute("disabled","true",true);
  		    </script>
  		  </div>
  		<div class="small-2 medium-1 columns">
  		<span id="sliderOutput3"></span>
  		</div>
  	    </div>
  	</p>
			<a style="text-align: right ;position: relative ; font-size: 100%" data-reveal-id="BboxModal" class="button tiny" >Räumliche Ausdehnung</a><br /><br />
            <label for="body">Kommentar</label>
            <textarea name="body" id="body" cols="20" rows="5"></textarea>
            <input type="submit" id="submit" value="Abschicken" class="button"/>
        </div>
    </form>
</div>
						<div id="BboxModal" data-options="close_on_background_click:false" class="reveal-modal" data-reveal>
                    		<h3>Definieren Sie die räumliche Ausdehnung, indem Sie zwei gegenüberliegende Eckpunkte klicken..</h3>
                    		<a id="setBbox" style="text-align: right ;position: relative ; font-size: 120%" class="close-reveal-modal">Räumliche Ausdehnung definieren</a><br />
                    		<a id="rejectBbox" style="text-align: left ;position: relative ; font-size: 120%" class="close-reveal-modal">Abbrechen</a>
                    		<script type="text/javascript">
                    			document.getElementById("setBbox").onclick = searchBoundingBox;
                    			document.getElementById("rejectBbox").onclick = discardTopic;
                    		</script>
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

</div>
	<script>
	var addMarker = false;
	var comBBox = null;
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
	    //map.locate({ setView: true, maxZoom: 12 });

        /*function onLocationFound(e) {
            var radius = e.accuracy / 2;
            L.marker(e.latlng).addTo(map)
                .bindPopup("You are within " + radius + " meters from this point").openPopup(); 
            L.circle(e.latlng, radius).addTo(map);
        }
        map.on('locationfound', onLocationFound);
        function onLocationError(e) {
            
        }
        map.on('locationerror', onLocationError);*/
        //L.control.pan().addTo(map);
		//map.addControl(L.control.search());
		
		
		
/*      Beispiele von URL:
		geojson: http://giv-geosoft2c.uni-muenster.de/Bartosz/cartostroph/de/leonardttown.geojson
		kml http://giv-geosoft2c.uni-muenster.de/Bartosz/cartostroph/de/balloon-image-rel.kml
		wms: "http://mesonet.agron.iastate.edu/cgi-bin/wms/nexrad/n0r.cgi"
		jpeg: http://basemap.nationalmap.gov/arcgis/rest/services/USGSShadedReliefOnly/MapServer/WMTS/tile/1.0.0/USGSShadedReliefOnly/default/default028mm/4/7/4.jpg
		png: http://fc03.deviantart.net/fs70/f/2013/012/e/c/png_cookie_by_ellatutorials-d5r8nel.png
		jpg mit Koordinaten: http://www.lib.utexas.edu/maps/historical/newark_nj_1922.jpg [[40.712216, -74.22655], [40.773941, -74.12544]]
		* */

		
		
		
		
		//var URL = 'http://giv-geosoft2c.uni-muenster.de/Bartosz/cartostroph/de/leonardttown.geojson'   //diese wird aus der Datenabnk gezogen
		 //var URL = getCookie("URL"); 
		 <?php
			$url = (string)$_GET['url'];
			//echo '<script>';
			//var abc = window.location.href;
			//var URL = abc.substring(72);
			echo 'var URL = "' . $url . '";';
			//echo '</script>';
		 ?>
		 var Typ = URL.split(".");
		 var Laenge = Typ.length;
		 showDataOnMap(URL);
		 map.on('click', onMapClick);
		
		
	</script>

	<?php 
	
		// attempt a connection
		include("config.php");
		
		// execute query
		$url = $_GET['url'];
		$sql = "SELECT lpoint, rpoint FROM topic WHERE url_top = '$url'";
		$result = pg_query($connection, $sql);
		if (!$result) {
			die("Error in SQL query: " . pg_last_error());
		}
		
		while ($row = pg_fetch_array($result)) {
			$lp = (string)$row[0];
			$lpoint = substr($lp, 1, -1);
			
			$rp = (string)$row[1];
			$rpoint = substr($rp, 1, -1);
			
			echo '<script type="text/javascript"> ';
			echo 'var bounds = [['. $lpoint .'],[ '. $rpoint .']];';
			echo'var TopicBBox = L.rectangle(bounds, {color: "black", weight: 1}).addTo(map);';
			echo'map.fitBounds(bounds);';
			echo 'document.getElementById("leftpoint").value =  ['. $lpoint.'];';
			echo' var lpoint =['. $lpoint.'];';
			echo 'document.getElementById("rightpoint").value =  ['. $rpoint.'];';
			echo' var rpoint =['. $rpoint.'];';
			echo '</script>';
			
		};
		
	?>






	<script>
  		$(document).foundation();
	</script>
	</body>
</html>

