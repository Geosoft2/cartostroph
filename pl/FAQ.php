<!doctype HTML>
<html class="no-js" lang="de-de">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cartostroph | FAQ</title>    
	<link rel="stylesheet" href="../css/foundation/foundation.css" />
    <link rel="stylesheet" href="../css/default.css" />
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
    <script src="../js/vendor/modernizr.js"></script>
    <script src="../js/leaflet-Interaktion/Karteninteraktion.js"></script>
</head>
<body>
    <div class="fixed">
        <nav class="top-bar" data-topbar role="navigation">
            <ul class="title-area">
                <li class="name">
                    <h1><a href="index.php">Carto<span style="color: red;">stroph!</span></h1>
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

                  <!-- Pop-Up für Registrierung  -->
                    <li>
                    	<a id="regis" href="#" data-reveal-id="RegisterModal">Rejestracja</a>
                    	<script type="text/javascript">
                    		if (loggedIn() == "Login"){
					
								}else{
									document.getElementById("regis").innerHTML="";
								}
                    	</script>
                        
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

    <!-- Inhalt -->
	<div class="row">
	<div class="large-2 columns">
	</div>
    <div class="large-10 columns" id="faqcontent">
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
    </div>
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
							
						}
						
						if (!fechted){
							echo 'document.getElementById("ort").value = "brak danych";';
							echo 'document.getElementById("plz").value = "brak danych";';
							echo 'document.getElementById("land").value = "brak danych";';
						}

						// free memory
						pg_free_result($result);
						?>	
					</div>
			
			  
			  <br /><a href="infouser.php">Moje wątki i komentarze</a>
			  <br /><a href="logout.php">Wyloguj</a>
			</ul>
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

	
    <!-- Skriptabschnitt -->
    <script src="../js/vendor/jquery.js"></script>
    <script src="../js/foundation/foundation.min.js"></script>
    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
	<script type="text/javascript">
		$(document).foundation();
	</script>

</body>
</html>
