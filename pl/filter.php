<!doctype html>
<html class="no-js" lang="de-de">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cartostroph | Szukaj</title>
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
                        <a href="FAQ.php">Pomoc</a>
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
                    <li><a href="#" data-reveal-id="BboxModal2">Załóż nowy wątek</a>
                      
                      <div id="BboxModal2" data-options="close_on_background_click:false" class="reveal-modal" data-reveal>
                        <h3>Zdefiniuj rozmieszczenie przestrzenne, klikając dwa na przeciwko siebie leżące punkty.</h3>
                        <a id="setBbox2" style="text-align: right ;position: relative ; font-size: 120%" class="close-reveal-modal">Zdefiniuj rozmieszczenie przestrzenne</a><br />
                        <a id="rejectBbox2" onclick="discardTopic" style="text-align: left ;position: relative ; font-size: 120%" class="close-reveal-modal">Anuluj</a>
                        <script type="text/javascript">
                          document.getElementById("setBbox2").onclick = createTopicBoundingBox;
                        </script>
            </div>
            
            <!-- popUp fuer Boundingbox -->
            <div id="confirmBbox"data-options="close_on_background_click:false" class="reveal-modal" data-reveal>
              <h3>Jesteś zadowolny z rozmieszczenia przestrzennego?</h3>
              <a id="setBbox3" style="text-align: right ;position: relative ; font-size: 120%"  class="close-reveal-modal" data-reveal-id="newTopicModal">Tak</a><br />
                        <a id="rejectBbox2" onclick="discardTopic()" style="text-align: left ;position: relative ; font-size: 120%" class="close-reveal-modal">Nie</a>
                        <script>
                          document.getElementById("setBbox3").onclick = fillForm;
                        </script>
            </div>
                      
                      <!-- Formular zur Erstellung eines Topics  -->
            <div id="newTopicModal" data-options="close_on_background_click:false" class="reveal-modal" data-reveal>
                <h3>Dodaj zestaw danych geograficznych</h3>
                <form action="topic.php" method="post">
                  <p>Szerokość geograficzna: <input id="Breitengrad" readonly="readonly" type="number" name="Breitengrad"/> </p>
                  <p>Długość geograficzna: <input id="Längengrad" readonly="readonly" type="number" name="Längengrad"/> </p>
                  <p><abbr title="Tutaj należy podać adres, pod którym można znależć zestaw danych geograficznych "><img src="../img/info.png" width="15px" height="15px" /></abbr> URL: <input type="text" id="URL" name="URL" required/> </p>
                  <p><abbr title="Tutaj należy podać właściwy tytuł, np. 'Powódź na Śląsku 2011'"><img src="../img/info.png" width="15px" height="15px"/></abbr> Tytuł: <input type="text" id="Titel" name="Titel" required /></p>
                  <p><abbr title="Tutaj należy podać co sądzisz o zestawie danych geograficznych . Czy jest pomocny? Zawiera błedy? itp."><img src="../img/info.png" width="15px" height="15px"/></abbr> Komentarz: <textarea type="text"  id="Kommentar" name="Kommentar" required></textarea></p>
                  <p><abbr title="Tutaj należy podać jakiego rodzaju obszaru dotyczy zestaw danych geograficznych . Do wyboru są:
                          Świat
                          Kontynent
                          Kraj
                          Region
                          Miasto
                            ">
                        <img src="../img/info.png" width="15px" height="15px"/></abbr>&ensp;Kategoria
                  <select id="Kategorie" name="Kategorie">
                      <option value="brak kategorii">brak kategorii</option>
                      <option value="Świat">Świat</option>
                      <option value="Kontynent">Kontynent</option>
                      <option value="Kraj">Kraj</option>
                      <option value="Region">Region</option>
                      <option value="Miasto">Miasto</option>
                    </select>
                </p>
                  <p><abbr title="Tutaj należy podać  od kiedy zestaw danych geograficznych jest aktualny"><img src="../img/info.png" width="15px" height="15px"/></abbr>
                  Aktualność czasowa - początek (opcjonalnie) <input type="date" id="start" name="start" placeholder="rrrr-mm-dd" /> 
                  </p>
                  <p><abbr title="Tutaj należy podać  do kiedy zestaw danych geograficznych jest bądź prawdopodobnie będzie ważny"><img src="../img/info.png" width="15px" height="15px"/></abbr> 
                  Aktualność czasowa - koniec (opcjonalnie) <input type="date" id="end" name="end" placeholder="rrrr-mm-dd"" />  
                  </p>
                  <p><abbr title="Tutaj się ocenia zestaw danych geograficznych w skali od 1(bezwartościowy) do 5(bardzo dobry)"><img src="../img/info.png" width="15px" height="15px"/></abbr> 
                Ocena (opcjonalnie): <br /><input id="checkbox1" name="checkbox1" type="checkbox" onclick="activateAssessment()"><label for="checkbox1" >Wyłączyć ocenę</label>
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
                  <p><abbr title="Tutaj podaje się tagi aby póżniej łatwiej znaleźć ten zestaw danych geograficznych."><img src="../img/info.png" width="15px" height="15px"/></abbr> 
                Tagi (opcjonalnie): <input type="text" id="tags" name="tags"/>
                </p>
                <p><abbr title="Tutaj podaje się linki do innych źródeł, które uzupełniają ten zestaw danych geograficznych, np. lepsze lub nowsze dane, dodatkowe informacje na temat tego obszaru itp."><img src="../img/info.png" width="15px" height="15px"/></abbr> 
                Hyperlącze (opcjonalnie): <input type="text" id="hyperlink" name="hyperlink"/>
                </p>
                <p>Autor <input id="Autor" type="text" readonly="readonly" name="Autor"/>
                <input type="hidden" id="cTbboxLLcoor" name="cTbboxLLcoor"/>
                <input type="hidden" id="cTbboxURcoor" name="cTbboxURcoor"/>
                
                <input type="submit" class="button expand" value="Topic erstellen"/>
                  </form>
                <a id="cancelTopic" style="position: relative ; font-size: 120%" class="close-reveal-modal" onclick="discardTopic()">Anuluj</a><br />
                            <br />
              </div>
          </li>

          <!-- Pop-Up für Registrierung  -->
                    <li>
                        <a href="#" data-reveal-id="RegisterModal">Rejestracja</a>
                    </li>
                    
          <!-- Schnellsuche -->
            
          <li class="has-form">
            <div class="row collapse">
              <form action="filter.php" method="get">
                <input type="text" placeholder="Szybkie wyszukiwanie" name="search">
              </form>
            </div>
          </li>
		  
		  <!-- Suchfeld -->
					 <li>
						<a href="search.php">Wyszukaj</a>
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
        <h2> Rejestracja </h2>
        <form action="register.php" method="post">
            Nazwa użytkownika: <input type="text" id="Benutzername" name="Benutzername" required />
            Hasło: <input type="password" id="passwort" name="Passwort" required />
            Powtórz hasło:<input type="password" id="passwortWieder" name="Passwort2" required />
            Miejscowość (opcjonalnie): <input type="text" name="Ort" id="Ort" />
            Kod pocztowy (opcjonalnie): <input type="text" name="PLZ" id="PLZ" />
            Kraj (opcjonalnie): <input type="text" name="Land" id="Land" />
            <input id="regist" type="submit" class="button expand" value="Registrieren" />
            <a style="text-align: right ;position: relative ; font-size: 120%" class="close-reveal-modal">Anuluj</a><br />
            <br />
        </form>
    </div>
  
    <!-- Dropdown-Login-Feld -->
    <div id="login-dropdown" class="f-dropdown small content" data-dropdown-content="true" width="10%">
        <h5>Login:</h5>
		
        <form id="top-nav-login" action="login.php" method="post">
            <div class="row">
                <label>Użytkownik</label>
                <input type="text" name="user" placeholder="name" tabindex="1" />
            </div>
            <div class="row">
                <label>Hasło</label>
                <input type="password" name="password" placeholder="********" tabindex="2" />
            </div>
            <div class="row">
                <input type="submit" class="button tiny success" value="Login" tabindex="3" />
            </div>
            <p>Nie masz jeszcze konta? Zarejestrować możesz się tutaj <a onclick="test" data-reveal-id="RegisterModal">tutaj</a></p>
        </form>
    </div>
  
<!-- Dropdown-Eingeloggt-Feld -->
	<div id="loggedin-dropdown" class="f-dropdown small content" data-dropdown-content="true" width="10%">
		<h5 id="eingeloggtAls"><h5>
			<script>
				document.getElementById("eingeloggtAls").innerHTML = "Zalogowany jako: " + author();
			</script>
			<ul id="drop" class="[tiny small medium large content]f-dropdown" data-dropdown-content>
			  <a href="#" data-reveal-id="Profile">Profil</a>

					<div id="Profile" class="reveal-modal" data-reveal>
					  <h3 id="benutzername">Mój profil: </h3>
					  
					  <script>
						document.getElementById("benutzername").innerHTML = "Mój profil: " + author();
					  </script>
					  <form action="alteruser.php" method="post">
						<p>Miejscowość: <input type="text" id="ort" name="ort" style="width: 75%;"/></p>
						<p>Kod pocztowy: <input type="text" id="plz" name="plz" style="width: 75%;"/></p>
						<p>Kraj: <input type="text" id="land" name="land" style="width: 75%;"/></p>
						<button style="float: right;">Zmień dane</button>
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
              }else{ echo 'document.getElementById("ort").value = "brak danych";';}
              if ($plz != ''){
                echo 'document.getElementById("plz").value = "'.$plz.'";';
              }else{ echo 'document.getElementById("plz").value = "brak danych";';}
              if ($land != ''){
                echo 'document.getElementById("land").value = "'.$land.'";';
              }else{ echo 'document.getElementById("land").value = "brak danych";';}
              echo '</script>';
              
              //echo 'Ort: <input value="' . $ort . '"type=\"text\" id=\"ort\" name=\"ort\" style=\"width: 90%;\"/>';
              //echo 'PLZ: <input value="' . $plz . '" type=\"text\" id=\"plz\" name=\"plz\" style=\"width: 90%;\"/>';
              //echo 'Land: <input value="' . $land . '" type=\"text\" id=\"land\" name=\"land\" style=\"width: 90%;\"/>';
            }
            
            if (!fechted){
              echo 'document.getElementById("ort").value = "brak danych";';
              echo 'document.getElementById("plz").value = "brak danych";';
              echo 'document.getElementById("land").value = "brak danych";';
            }

            // free memory
            pg_free_result($result);
            ?>  
            </form>
          </div>
      
        
        <br /><a href="infouser.php">Moje wątki i komentarze</a>
			  <br /><a href="logout.php">Wyloguj</a>
      </ul>
  </div>

    <!-- Pop-Up mit Hilfestellung beim ersten Aufruf  -->
    <div id="HilfeModal" class="reveal-modal" data-reveal>
        <h1>FAQ</h1>
        <p>Na tej stronie uzyskasz pomoc jak korzystać z Cartostroph!</p>
        <p>
            Cartostroph! jest aplikacją sieciową, której celem jest zgormadzenia danych geograficznych( a raczej linków do nich). 
            Jeśli znalazłeś w internecie dobry zestaw danych geograficznych, 
            z którym chciałbyś sie podzielić z innymi jesteś we właściwym miejscu!
        </p>
        <p>
            <b> Jak dodać zestaw danych geograficznych?  </b>
            <br />
            <ul>
                <li>W górnej listwie kliknąć "Załóż nowy wątek".</li>
                <li>
                    Fenster bestätigen und per Klick 2 Punkte auf der Karte festlegen (Räumliche Ausdehnung definieren).
                    Zatwierdzić okienko i kliknąć 2 miejsca na mapie (zdefiniować rozmieszczenie przestrzenne).
                </li>
                <li>Podać informacje dotyczące tego zestawu danych. Pomoc w tej kwestii uzyskasz <a href="#FormularRichtig">tutaj</a></li>
                <li>Jeśli jesteś pewny, że wszystko zostało prawidłowo wypełnione kliknij "wyślij"</li>
                <li>Teraz na mapie pojawił się nowy znacznik( w centrum zdefiniowanego rozmieszczenia przestrzennego ) z twoim zestawem danych geograficznych, który inni użytkowincy mogą komentować i oceniać.</li>
            </ul>
        </p>
        <p id="FormularRichtig">
            <b> Jak wypełnić formularz dotyczący zestawu danych geograficznych prawidłowo? </b>
            <br />
            <ul>
                <li><strong>URL</strong>: Tutaj się podaje adres internetowy zestawu danych geograficznych.</li>
                <li><strong>Tytuł</strong>: Tutaj się wpisuje tytuł zestawu danych geograficznych, np. "Powódź Śląsk 2011".</li>
                <li><strong>Komentarz</strong>: Tutaj oddaje się komentarz dotyczący danych geograficznych. Czy są one pomocne? Czy są błedy? itp.</li>
                <li>
                    <strong>Kategoria</strong>: Tutaj podaje się jak dużej powierchni dotyczy zestaw danych geograficznych. Do wyboru są: <ul>
                        <li>Świat</li>
                        <li>Kontynent</li>
                        <li>Kraj</li>
                        <li>Region</li>
                        <li>Miasto</li>
                    </ul>
                </li>
                <li><strong>Aktualność czasowa - początek (opcjonalnie)</strong>: Tutaj podaje się od kiedy zestaw danych geograficznych jest ważny.</li>
                <li><strong>Aktualność czasowa - koniec (opcjonalnie)</strong>: Tutaj podaje się do kiedy zestaw danych geograficznych jest bądź prawdopodobnie będzie ważny.</li>
                <li><strong>Ocena (opcjonalnie)</strong>: Tutaj się ocenia zestaw danych geograficznych w skali od 1(bezwartościowy) do 5(bardzo dobry).</li>
                <li><strong>Tagi (opcjonalnie)</strong>: Tutaj podaje się tagi aby póżniej łatwiej znaleźć ten zestaw danych geograficznych. </li>
                <li><strong>Hyperlącze (opcjonalnie)</strong>: Tutaj podaje się linki do innych źródeł, które uzupełniają ten zestaw danych geograficznych, np. lepsze lub nowsze dane, dodatkowe informacje na temat tego obszaru itp. </li>
            </ul>
        </p>
        <input id="HilfeAusschalten" type="checkbox"><label for="HilfeAusschalten">Nie pokazuj już tej pomocy</label><br />
        <a onclick="hilfeCookie()" style="text-align: right ;position: relative ; font-size: 120%" class="close-reveal-modal">Dalej</a><br />
        <br />
    </div>
  
  
  
    <div class="large-8 columns" id="map" style="height: 100%;">

</div>
<div id="SearchContent" class="large-4 columns">  <h3 style="display: inline">Wyszukaj</h3>
  
        <?php 
          echo '<h6>Aktywne filtry</h6>';
          echo '<ul class="breadcrumbs">';
          
          $suchbegriff = '';
          if ($_GET['search'] != ''){
            $suchbegriff = "Hasło: ".htmlspecialchars($_GET['search']);
            echo '<li class="current"><a href="#">' . $suchbegriff . '</a></li>';
          }
          
          $kategorie = '';
          if ($_GET['KategorieSuche'] != '' && $_GET['KategorieSuche'] != 'Keine'){
            $kategorie = "Kategoria: ".$_GET['KategorieSuche'];
            echo '<li class="current"><a href="#">' . $kategorie . '</a></li>';
          }
          
          $start = '';
          if ($_GET['startSuche'] != ''){
            $start = "Początek: ".$_GET['startSuche'];
            echo '<li class="current"><a href="#">' . $start . '</a></li>';
          }
          
          $end = '';
          if ($_GET['endSuche'] != ''){
            $end = "Koniec: ".$_GET['endSuche'];
            echo '<li class="current"><a href="#">' . $end . '</a></li>';
          }
          
          $bewertung = '';
          if ($_GET['BewertungSuche'] != '' && $_GET['BewertungSuche'] != 'Keine'){
            $bewertung = "Ocena: ".$_GET['BewertungSuche'];
            echo '<li class="current"><a href="#">' . $bewertung . '</a></li>';
          }
          
          $bbox = '';
          if ($_GET['leftpoint'] != ''){
            $bbox = "Ograniczenia przestrzenne aktywne";
            echo '<li class="current"><a href="#">' . $bbox . '</a></li>';
          }
          
          $radius = '';
          if ($_GET['radius'] != ''){
            $radius = "Wyszukiwanie w obrębie: ".$_GET['radius'];
            echo '<li class="current"><a href="#">' . $radius . '</a></li>';
          }
          
          echo '</ul>';
        ?>
        
        <button class="tiny button" data-reveal-id="PermalinkModal">Odnośnik bezpośredni</button>
  
            <div id="PermalinkModal" class="reveal-modal" data-reveal>
                        <h3>Odnośnik bezpośredni twojego wyszukiwania</h3>
                        <input id="permalink" readonly="true" type="text" />
                        <a style="text-align: right ;position: relative ; font-size: 120%" class="close-reveal-modal">OK</a>
                        <script>
                          document.getElementById("permalink").value = window.location.href;
                        </script>
            </div>
            
    
  
  
  
                            <form action="filter.php" method="get">
                            <p><input type="text" placeholder="Szukaj" id="search" name="search"></p>
                            <p>Kategoria (opcjonalnie)<select id="KategorieSuche" name="KategorieSuche">
                                <option value="brak kategorii">brak Kategorii</option>
                                <option value="Świat">Świat</option>
                                <option value="Kontynent">Kontynent</option>
                                <option value="Kraj">Kraj</option>
                                <option value="Region">Region</option>
                                <option value="Miasto">Miasto</option>
                            </select>
                            </p>
                            <p><abbr title="Tutaj podaje się od kiedy zestaw danych geograficznych jest ważny"><img src="../img/info.png" width="15px" height="15px"/></abbr>
                  Początek <input type="date" id="startSuche" name="startSuche" placeholder="rrrr-mm-dd"/> 
                  </p>
                  <p><abbr title="HTutaj podaje się do kiedy zestaw danych geograficznych jest bądź prawdopodobnie będzie ważny."><img src="../img/info.png" width="15px" height="15px"/></abbr> 
                  Koniec <input type="date" id="endSuche" name="endSuche" placeholder="rrrr-mm-dd"/>  
                  </p>
                    <p>Ocena: <select id="BewertungSuche" name="BewertungSuche">
                                <option value="brak">Brak ograniczenia</option>
                                <option value="1">1 lub więcej</option>
                                <option value="2">2 lub więcej</option>
                                <option value="3">3 lub więcejr</option>
                                <option value="4">4 lub więcej</option>
                                <option value="5">5</option>
                            </select>
                            </p>
              <p><abbr title="Tutaj możesz podać w jakiej odległości od ciebie wyszukiwanie się ma odbyć."><img src="../img/info.png" width="15px" height="15px"/></abbr>
                    Promień w kilometrach<input type="text" id="radius" placeholder="0" name="radius" onchange="searchCircle()"></p>
                    </p>
                    <label for="leftpoint"></label>
                    <input type="hidden" name="leftpoint" id="leftpoint" />
                    <label for="rightpoint"></label>
                    <input hidden="hidden" name="rightpoint" id="rightpoint" /> 
                    <p>
                    <a style="text-align: right ;position: relative ; font-size: 100%" data-reveal-id="BboxModal" class="button tiny" >Rozmieszczenie przestrzennene</a>
                            <p><input id="filter" type="submit" class="button expand" value="Szukaj" />
                            </p>  
                    </p>
    </form></h1>
</div>


            <!-- popUp fuer Boundingbox -->
            <div id="BboxModal" data-options="close_on_background_click:false" class="reveal-modal" data-reveal>
                       <h3>Zdefiniuj rozmieszczenie przestrzenne, klikając dwa na przeciwko siebie leżące punkty.</h3>
                    		<a id="setBbox" style="text-align: right ;position: relative ; font-size: 120%" class="close-reveal-modal">Zdefiniuj rozmieszczenie przestrzenne</a><br />
                    		<a id="rejectBbox" style="text-align: left ;position: relative ; font-size: 120%" class="close-reveal-modal">Anuluj</a>
                    		<script type="text/javascript">
                    			document.getElementById("setBbox").onclick = searchBoundingBox;
                    			document.getElementById("rejectBbox").onclick = discardTopic;
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
      case 'Świat': 
        $katwert = 'Świat';
        break; 
      case 'Kontynent': 
        $katwert = 'Kontynent';
        break; 
      case 'Kraj': 
        $katwert = 'Kraj';
        break; 
      case 'Region': 
        $katwert = 'Region';
        break; 
      case 'Miasto': 
        $katwert = 'Miasto';
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
      case 'brak':
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
                            $rating_avg = "brak oceny";
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
      echo 'var marker = L.marker([' . $Position . '],{icon: AnonymMarker}).addTo(map).bindPopup("Tytuł: " + "' . $Titel . '" + "<br />Ocena: "
								       		 + "' . $Bewertung . '" + "<br/> URL: " + "<a href=" + "' . $URL . '" + ">"+ "' . $URL . '"   + "</a>" +  
											 "<br/> Autor: " + "' . $Autor . '"  + "<form action=\"DynamicMap.php\" method=\"get\">" + 
											 "<input type=\"hidden\" name=\"url\" value=\"" + "' . $URL . '" + "\"/>" + 
											 "<br /><br /><input class=\"button tiny\" id=\"filter\" type=\"submit\" value=\"Więcej informacji...\"/>" + "</form>");';
			echo'} else {
				var marker = L.marker([' . $Position . '],{icon: EingeloggtMarker}).addTo(map).bindPopup("Tytuł: " + "' . $Titel . '" + "<br />Ocena: "
								       		 + "' . $Bewertung . '" + "<br/> URL: " + "<a href=" + "' . $URL . '" + ">"+ "' . $URL . '"   + "</a>" +
											 "<br/> Autor: " + "' . $Autor . '"  + "<form action=\"DynamicMap.php\" method=\"get\">" +
											 "<input type=\"hidden\" name=\"url\" value=\"" + "' . $URL . '" + "\"/>" +
											 "<br /><br /><input class=\"button tiny\" id=\"filter\" type=\"submit\" value=\"Mehr Infos...\"/>" + "</form>");
			}';
      echo 'marker.on(\'click\',clickMarker);';
      echo '</script>';

    }

        }
    //pg_free_result($result);
    
  ?>
</body>
</html>
