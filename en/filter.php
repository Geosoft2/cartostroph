<!doctype html>
<html class="no-js" lang="de-de">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cartostroph | Search Filter</title>
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
                    <li><a href="#" data-reveal-id="BboxModal2">Add New Topic</a>
                      
                      <div id="BboxModal2" data-options="close_on_background_click:false" class="reveal-modal" data-reveal>
                        <h3>Define the spatial extent , by clicking two opposite corners .</h3>
                        <a id="setBbox2" style="text-align: right ;position: relative ; font-size: 120%" class="close-reveal-modal">Define the spatial extent</a><br />
                        <a id="rejectBbox2" onclick="discardTopic" style="text-align: left ;position: relative ; font-size: 120%" class="close-reveal-modal">Abort</a>
                        <script type="text/javascript">
                          document.getElementById("setBbox2").onclick = createTopicBoundingBox;
                        </script>
            </div>
            
           <!-- popUp fuer Boundingbox -->
            <div id="confirmBbox"data-options="close_on_background_click:false" class="reveal-modal" data-reveal>
              <h3>re you satisfied with the spatial extent?</h3>
              <a id="setBbox3" style="text-align: right ;position: relative ; font-size: 120%"  class="close-reveal-modal" data-reveal-id="newTopicModal">Yes</a><br />
                        <a id="rejectBbox2" onclick="discardTopic()" style="text-align: left ;position: relative ; font-size: 120%" class="close-reveal-modal">No</a>
                        <script>
                          document.getElementById("setBbox3").onclick = fillForm;
                        </script>
            </div>

                      <!-- Formular zur Erstellung eines Topics  -->
            <div id="newTopicModal" data-options="close_on_background_click:false" class="reveal-modal" data-reveal>
                <h3>Add a spatial dataset</h3>
                <form action="topic.php" method="post">
                  <p>Latitude from the center of the bounding box: <input id="Breitengrad" readonly="readonly" type="number" name="Breitengrad"/> </p>
                  <p>Longitude from the center of the bounding box: <input id="Längengrad" readonly="readonly" type="number" name="Längengrad"/> </p>
                  <p><abbr title=" Here the link of your geodata is requested"><img src="../img/info.png" width="15px" height="15px" /></abbr> URL: <input type="text" id="URL" name="URL" required/> </p>
                  <p><abbr title="Choose a title for your geodata, for example 'Hurricane data of Florida'"><img src="../img/info.png" width="15px" height="15px"/></abbr> Title: <input type="text" id="Titel" name="Titel" required /></p>
                  <p><abbr title="Here you can comment to the geodata. Is it helpful? Are there any mistakes in it? etc."><img src="../img/info.png" width="15px" height="15px"/></abbr> Comment: <textarea type="text"  id="Kommentar" name="Kommentar" required></textarea></p>
                  <p><abbr title="Choose which region the geodata you want to add is representing. At choice:
                          World
                          Continent
                          Country
                          Region
                          City
                            " style ="text-align:left;">
                        <img src="../img/info.png" width="15px" height="15px"/></abbr>&ensp;Categorie
                  <select id="Kategorie" name="Kategorie">
                    <option value="Keine">No Categorie</option>
                          <option value="Welt">World</option>
                      <option value="Kontinent">Continent</option>
                      <option value="Land">Country</option>
                      <option value="Region">Region</option>
                      <option value="Stadt">City</option>
                    </select>
                </p>
                  <p><abbr title="Give a date since the data is valid"><img src="../img/info.png" width="15px" height="15px"/></abbr>
                  Time extent - start  (optional) <input type="date" id="start" name="start" /> 
                  </p>
                  <p><abbr title="Give a date up to when the data can be valid."><img src="../img/info.png" width="15px" height="15px"/></abbr> 
                  Time extent - end (optional) <input type="date" id="end" name="end" />  
                  </p>
                  <p><abbr title="Here you can rate the data from 1 (very bad) to 5 (perfect)."><img src="../img/info.png" width="15px" height="15px"/></abbr> 
                Rating (optional): <br /><input id="checkbox1" name="checkbox1" type="checkbox" onclick="activateAssessment()"><label for="checkbox1" >Rating inactive</label>
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
                Tags (optional): <input type="text" id="tags" name="tags"/>
                </p>
                <p><abbr title="Here you can add another URL, which gives additional information to your geodata, or is a newer version of it."><img src="../img/info.png" width="15px" height="15px"/></abbr> 
                Hyperlink (optional): <input type="text" id="hyperlink" name="hyperlink"/>
                </p>
                <p>Author <input id="Autor" type="text" readonly="readonly" name="Autor"/>
                <input type="hidden" id="cTbboxLLcoor" name="cTbboxLLcoor"/>
                <input type="hidden" id="cTbboxURcoor" name="cTbboxURcoor"/>
                
                <input type="submit" class="button expand" value="Create Topic"/>
                  </form>
                <a id="cancelTopic" style="position: relative ; font-size: 120%" class="close-reveal-modal" onclick="discardTopic()">Abort</a><br />
                            <br />
              </div>
          </li>


          <!-- Pop-Up für Registrierung  -->
                    <li>
                        <a href="#" data-reveal-id="RegisterModal">Register</a>
                    </li>
                    
          <!-- Schnellsuche -->
            
          <li class="has-form">
            <div class="row collapse">
              <form action="filter.php" method="get">
                <input type="text" placeholder="Quick search" name="search">
              </form>
            </div>
          </li>
		  
		  <!-- Suchfeld -->
					 <li>
						<a href="search.php">Search</a>
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
            Retype password :<input type="password" id="passwortWieder" name="Passwort2" required />
            City (optional): <input type="text" name="Ort" id="Ort" />
            Zip code (optional): <input type="text" name="PLZ" id="PLZ" />
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
                <input type="text" name="user" placeholder="user" tabindex="1" />
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
            <h3 id="benutzername">My profile: </h3>
            
            <script>
            document.getElementById("benutzername").innerHTML = "My profile: " + author();
            </script>
            <form action="alteruser.php" method="post">
            <button style="float: right;"> Edit</button>
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

            // iterate over result set
            // print each row
            while ($row = pg_fetch_array($result)) {
              $ort = (string)$row[0];
              $plz = (string)$row[1];
              $land = (string)$row[2];
            
              echo '<p>City: ' . $ort . ' </p>';
              echo '<p>Zip code: ' . $plz . '</p>';
              echo '<p>Country: ' . $land . '</p>';
              //echo '<p>Ort: <input value=' . $ort . ' type=\"text\" id=\"ort\" name=\"ort\" style=\"width: 90%;\"/></p>';
              //echo '<p>PLZ: <input value=' . $plz . ' type=\"text\" id=\"plz\" name=\"plz\" style=\"width: 90%;\"/></p>';
              //echo '<p>Land: <input value=' . $land . ' type=\"text\" id=\"land\" name=\"land\" style=\"width: 90%;\"/></p>';
            }

            // free memory
            pg_free_result($result);
            ?>
            <input value="ort" type="text" id="ort" name="ort" style="width: 90%;"/>
            <input value="plz" type="text" id="plz" name="plz" style="width: 90%;"/>
            <input value="land" type="text" id="land" name="land" style="width: 90%;"/>
            <a class="close-reveal-modal">&#215;</a>
            </form>
          </div>
      
        
        <br /><a href="infouser.php">My Topics and comments</a>
        <br /><a href="logout.php">Logout</a>
      </ul>
  </div>

    <!-- Pop-Up mit Hilfestellung beim ersten Aufruf  -->
    <div id="HilfeModal" class="reveal-modal" data-reveal>
        <h1>Welcome to Cartostroph!</h1>
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
<li><strong>Titel</strong>: Choose a title for your geodata, for example "Hurricane data of Florida"</li>
<li><strong>Comment</strong>: Here you can comment to the geodata. Is it helpful? Are there any mistakes in it? etc.</li>
<li>
<strong>Category (optionally)</strong>: Choose which region the geodata you want to add is representing. At choice: <ul>
<li>World</li>
<li>Continent</li>
<li>Coutry</li>
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

        <input id="HilfeAusschalten" type="checkbox"><label for="HilfeAusschalten">Do not show again</label><br />
        <a onclick="hilfeCookie()" style="text-align: right ;position: relative ; font-size: 120%" class="close-reveal-modal">Continue</a><br />
        <br />
    </div>
  
  
  
    <div class="large-8 columns" id="map" style="height: 100%;">

</div>
<div id="SearchContent" class="large-4 columns">  <h3 style="display: inline">Search  </h3>
  
        <?php 
          echo '<h6>Aktive filter</h6>';
          echo '<ul class="breadcrumbs">';
          
          $suchbegriff = '';
          if ($_GET['search'] != ''){
            $suchbegriff = "Search text: ".htmlspecialchars($_GET['search']);
            echo '<li class="current"><a href="#">' . $suchbegriff . '</a></li>';
          }
          
          $kategorie = '';
          if ($_GET['KategorieSuche'] != '' && $_GET['KategorieSuche'] != 'Keine'){
            $kategorie = "Category: ".$_GET['KategorieSuche'];
            echo '<li class="current"><a href="#">' . $kategorie . '</a></li>';
          }
          
          $start = '';
          if ($_GET['startSuche'] != ''){
            $start = "Start: ".$_GET['startSuche'];
            echo '<li class="current"><a href="#">' . $start . '</a></li>';
          }
          
          $end = '';
          if ($_GET['endSuche'] != ''){
            $end = "End: ".$_GET['endSuche'];
            echo '<li class="current"><a href="#">' . $end . '</a></li>';
          }
          
          $bewertung = '';
          if ($_GET['BewertungSuche'] != '' && $_GET['BewertungSuche'] != 'Keine'){
            $bewertung = "Rating: ".$_GET['BewertungSuche'];
            echo '<li class="current"><a href="#">' . $bewertung . '</a></li>';
          }
          
          $bbox = '';
          if ($_GET['leftpoint'] != ''){
            $bbox = "Search based on Boundingbox active";
            echo '<li class="current"><a href="#">' . $bbox . '</a></li>';
          }
          
          $radius = '';
          if ($_GET['radius'] != ''){
            $radius = "Search based on radius: ".$_GET['radius'];
            echo '<li class="current"><a href="#">' . $radius . '</a></li>';
          }
          
          echo '</ul>';
        ?>
        
        <button class="tiny button" data-reveal-id="PermalinkModal">Permalink</button>
  
            <div id="PermalinkModal" class="reveal-modal" data-reveal>
                        <h3>The permalink of your search</h3>
                        <input id="permalink" readonly="true" type="text" />
                        <a style="text-align: right ;position: relative ; font-size: 120%" class="close-reveal-modal">OK</a>
                        <script>
                          document.getElementById("permalink").value = window.location.href;
                          
                        
                        </script>
            </div>
            
    
  
  
  
                            <form action="filter.php" method="get">
                            <p><input type="text" placeholder="Search" id="search" name="search"></p>
                            <p>Category (optional)<select id="KategorieSuche" name="KategorieSuche">
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
                    Radius search in km <input type="text" id="radius" placeholder="0" name="radius" onchange="searchCircle()"></p>
                    </p>
                    <label for="leftpoint"></label>
                    <input type="hidden" name="leftpoint" id="leftpoint" />
                    <label for="rightpoint"></label>
                    <input hidden="hidden" name="rightpoint" id="rightpoint" /> 
                    <p>
                    <a style="text-align: right ;position: relative ; font-size: 100%" data-reveal-id="BboxModal" class="button tiny" >Spatial Expansion</a>
                            <p><input id="filter" type="submit" class="button expand" value="Search" />
                            </p>  
                    </p>
    </form></h1>
</div>


            <!-- popUp fuer Boundingbox -->
            <div id="BboxModal" data-options="close_on_background_click:false" class="reveal-modal" data-reveal>
                        <h3>Define the spatial extent , by clicking two opposite corners.</h3>
                        <a id="setBbox2" style="text-align: right ;position: relative ; font-size: 120%" class="close-reveal-modal">Define the spatial extent</a><br />
                        <a id="rejectBbox2" onclick="discardTopic" style="text-align: left ;position: relative ; font-size: 120%" class="close-reveal-modal">Abort</a>
                        <script type="text/javascript">
                          document.getElementById("setBbox2").onclick = createTopicBoundingBox;
                        </script>
            </div>

</div>
    <!-- Skriptabschnitt -->
    <script src="../js/vendor/jquery.js"></script>
    <script src="../js/foundation/foundation.min.js"></script>
    <script type="text/javascript">
        $(document).foundation();

        // create a map in the "map" div, set the view to a given place and zoom
        var addMarker = false;
        var TopicBBox = null;
       
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
      //map.locate({ setView: false, maxZoom: 12 });

        map.on('locationfound', onLocationFound);
    
        map.on('locationerror', onLocationError);
    L.control.pan().addTo(map);
    map.addControl(L.control.search());
    
    <?php
      $lp = (string)$_GET['leftpoint'];
      $rp = (string)$_GET['rightpoint'];
      echo 'bboxURcoor2 = "'.$lp.'";';
      echo 'bboxLLcoor2 = "'.$rp.'";';
    ?>
    
    /*bboxURcoor2 = String(getCookie("bboxURcoor"));
    bboxLLcoor2 = String(getCookie("bboxLLcoor"));
    bboxURcoor2 = bboxURcoor2.substring(6,bboxURcoor2.length);
    bboxLLcoor2 = bboxLLcoor2.substring(6,bboxLLcoor2.length);
    bboxURcoor2 = bboxURcoor2.replace(/[{()}]/g, '');
      bboxLLcoor2 = bboxLLcoor2.replace(/[{()}]/g, '');*/
      coords1 = bboxLLcoor2.split(",");
      coords2 = bboxURcoor2.split(",");
      
      if(coords1[0].length > 0) {

        coor1 = coords1[0];
      coor2 = coords1[1];
      coor3 = coords2[0];
      coor4 = coords2[1];
      var bounds2 = [[coor1, coor2], [coor3, coor4]];
      map.fitBounds(bounds2);
    // create an orange rectangle
    L.rectangle(bounds2, {color: "red", weight: 1}).addTo(map);
    
    }

    map.on('click', onMapClick);
    // map.on('mouseout',resetView);
    </script>
  <?php 
    echo '<script>';  
    echo 'document.getElementById("search").value = "'.$_GET['search'].'";';
    echo 'document.getElementById("KategorieSuche").value = "'.$_GET['KategorieSuche'].'";';
    echo 'document.getElementById("BewertungSuche").value = "'.$_GET['BewertungSuche'].'";';
    echo 'document.getElementById("radius").value = "'.$_GET['radius'].'";';
    echo 'document.getElementById("startSuche").value = "'.$_GET['startSuche'].'";';
    echo 'document.getElementById("endSuche").value = "'.$_GET['endSuche'].'";';
    echo '</script>';                      


    // attempt a connection
    include("config.php");
    global $config;
    $connection = pg_connect($config["connection"]);
    if (!$connection) {
      die("Error in connection: " . pg_last_error());
    }

    // execute query
    $suchbegriff =  pg_escape_string(htmlspecialchars($_GET['search']));
    $kategorie =  $_GET['KategorieSuche'];
    $katwert = NULL;
    switch ($kategorie) { 
      case 'Keine':
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
    if ($_GET['startSuche'] != ''){
      $start = $_GET['startSuche'];
        }
    $end = '9999-12-31';
    if ($_GET['endSuche'] != ''){
      $end = $_GET['endSuche'];
        }

    $bewertung = $_GET['BewertungSuche'];
    $bewert = NULL;
    switch ($bewertung) { 
      case 'Keine':
        $bewert = NULL;
        break;
      case '1': 
        $bewert = 1;
        break; 
      case '2': 
        $bewert = 2;
        break; 
      case '3': 
        $bewert = 3;
        break; 
      case '4': 
        $bewert = 4;
        break; 
      case '5': 
        $bewert = 5;
        break;  
      default:
        $bewert = NULL;
    } 

    
        $bboxLeft = $_GET['leftpoint'];
        $bboxRight = $_GET['rightpoint'];

        $ownPositionlng = $_GET['lat'];
        $ownPositionlat = $_GET['lng'];  
        $radius =  pg_escape_string(htmlspecialchars($_GET['radius']));
        $radius = (float)$radius;
        $radius = ($radius/111);

         //Hilfsvariable für den SQL Befehl
    //$sqlContent = "";
    $suchbegriffHilf = "";

    if ($suchbegriff != "") {
      $suchbegriffHilf = "(UPPER(text) LIKE UPPER('%$suchbegriff%') OR UPPER (titel) LIKE UPPER('%$suchbegriff%') OR UPPER(tag) LIKE UPPER('%$suchbegriff%') OR UPPER(body) LIKE UPPER('%$suchbegriff%') OR UPPER(url_top) LIKE UPPER('%$suchbegriff%'))";
    }


    $sqlContent = $suchbegriffHilf;


    if ($katwert == NULL) {
      $kategorieHilf = "";
    } elseif ($suchbegriff == "" and $katwert != NULL) {
      $kategorieHilf = "kategorie  = '$katwert'";
    } else {
      $kategorieHilf = "AND kategorie = '$katwert'";
    }


    $sqlContent = $sqlContent.$kategorieHilf;
                

        if ($bboxLeft == "") {
            $bbox = "";
        }  elseif ($suchbegriff =="" and $katwert == NULL and $bbox != "") {
            $bbox = "box '(($bboxLeft),($bboxRight))' @> position";
        } else {
            $bbox = " AND (box '(($bboxLeft),($bboxRight))' @> position)";
        }


           $sqlContent = $sqlContent.$bbox; 


           if ($radius == "") {
                $center = "";
           } elseif ($sqlContent == "") {
            $center = "circle '(($ownPositionlng,$ownPositionlat),$radius)' @> position";
           } 
           else {
            $center = " AND (circle '(($ownPositionlng,$ownPositionlat),$radius)' @> position)";
           }

           $sqlContent = $sqlContent.$center;

              /*  if ($bewert == NULL) {
                    $bewertungHilf = "";
                } elseif ($suchbegriff == "" and $katwert == NULL) {
                    $bewertungHilf = "$rating_avg >= '$bewert'";
                } else {
                    $bewertungHilf = " AND $rating_avg >= '$bewert'";
                    }     */


                //$sqlContent = $sqlContent.$bewertungHilf;


                if ($suchbegriff == "" and $katwert == NULL and $bboxLeft == "" and $ownPositionlng =="") {
                $zeitlichesAusmaß = "(anfangsdatum <= '$start' AND enddatum >= '$start') OR (anfangsdatum <= '$end' AND enddatum >= '$end') OR (anfangsdatum >= '$start' AND anfangsdatum <= '$end') OR (enddatum >= '$start' AND enddatum <= '$end');";
                } else {
                $zeitlichesAusmaß = " AND ((anfangsdatum <= '$start' AND enddatum >= '$start') OR (anfangsdatum <= '$end' AND enddatum >= '$end') OR (anfangsdatum >= '$start' AND anfangsdatum <= '$end') OR (enddatum >= '$start' AND enddatum <= '$end'));";
                    }

                $sqlContent = $sqlContent.$zeitlichesAusmaß;


                if ($sqlContent == ""){
                    $sqlBegin = "SELECT url_top, titel, position, bewertung, autor FROM topic LEFT OUTER JOIN comments on topic.url_top = comments.page_id ";
                } else {
                    $sqlBegin = "SELECT url_top, titel, position, bewertung, autor FROM topic LEFT OUTER JOIN comments on topic.url_top = comments.page_id WHERE ";
                   } 
                    
                $sql = $sqlBegin.$sqlContent ;


                $result = pg_query($connection, $sql);
    
  
    // iterate over result set
    // print each row
    
    while ($row = pg_fetch_array($result)) {
      $URL = (string)$row[0];
      $Titel = (string)$row[1];
      $Pos = (string)$row[2];
      $Position = substr($Pos, 1, -1);
      $Autor = (string)$row[4];
                        
                        //average berechnen 
                        $sql6 = "SELECT bewertung FROM topic WHERE url_top = '$URL'";
                        $sql4 = "SELECT sum(rating) FROM comments WHERE page_id ='$URL'";
                        $sql5 = "SELECT count(rating) FROM comments WHERE page_id ='$URL'";

                        $sql7 = pg_query($connection, $sql6);
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
                        } else {
                            $rating_avg = ($bewertungTopic + $sum) / ($count); 
                            }
                        
                        if ($rating_avg >= $bewert) { 
                            $Bewertung = round($rating_avg,2);
      
          
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
                       "<br /><br /><input class=\"button tiny\" id=\"filter\" type=\"submit\" value=\"More information...\"/>" + "</form>");';
      echo'} else {
        var marker = L.marker([' . $Position . '],{icon: EingeloggtMarker}).addTo(map).bindPopup("Title: " + "' . $Titel . '" + "<br />Rating: "
                           + "' . $Bewertung . '" + "<br/> URL: " + "<a href=" + "' . $URL . '" + ">"+ "' . $URL . '"   + "</a>" +
                       "<br/> Author: " + "' . $Autor . '"  + "<form action=\"DynamicMap.php\" method=\"get\">" +
                       "<input type=\"hidden\" name=\"url\" value=\"" + "' . $URL . '" + "\"/>" +
                       "<br /><br /><input class=\"button tiny\" id=\"filter\" type=\"submit\" value=\"More infosrmation...\"/>" + "</form>");
      }';
      echo 'marker.on(\'click\',clickMarker);';
      echo '</script>';

    }

        }
    //pg_free_result($result);
    
  ?>
</body>
</html>
