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
                    	<a id="regis" href="#" data-reveal-id="RegisterModal">Registrierung</a>
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

    <!-- Inhalt -->
    <div id="faqcontent">
        <h1>FAQ</h1>
        <p>Auf dieser Seite bekommen Sie Hilfestellung zur Nutzung von Cartostroph!</p>
        <p>
            Cartostroph! ist eine Webapplikation mit dem Ziel Geodatensätze, bzw. URLs dieser, zu Sammeln. Wenn Sie einen
            Geodatensatz im Internet gefunden haben und ihn mit anderen teilen möchten, sind Sie hier genau richtig!
        </p>
        <p>
            <b> Wie füge ich einen neuen Geodatensatz hinzu? </b>
            <br />
            <ul>
                <li>In der oberen Leiste auf "Neues Topic anlegen" klicken.</li>
                <li>
                    Fenster bestätigen und per Klick 2 Punkte auf der Karte festlegen (Räumliche Ausdehnung definieren).
                </li>
                <li>Informationen zum Geodatensatz angeben. Hilfestellung dazu finden sie <a href="#FormularRichtig">hier</a>.</li>
                <li>Wenn Sie sich sicher sind alles richtig ausgefüllt zu haben, klicken Sie auf "Topic erstellen".</li>
                <li>Nun gibt es einen Marker (im Zentrum der von Ihnen definierten räumlichen Ausdehnung) mit Ihrem gefundenen Datensatz, welcher von anderen Nutzern kommentiert und bewertet werden kann.</li>
            </ul>
        </p>
        <p id="FormularRichtig">
            <b> Wie fülle ich das Formular zum Geodatensatz richtig aus? </b>
            <br />
            <ul>
                <li><strong>URL</strong>: Hier geben Sie an unter welcher Internetadresse der Geodatensatz auffindbar ist.</li>
                <li><strong>Titel</strong>: Hier geben Sie einen geeigneten Titel des Datensatzens an, z.B. "Überflutungsdaten Münster 2014".</li>
                <li><strong>Kommentar</strong>: Hier können Sie den Geodatensatz kommentieren. Ist er hilfreich? Ist er gut? Fehlt etwas? etc.</li>
                <li>
                    <strong>Kategorie (optional)</strong>: Hier können Sie die räumliche Ausdehnung des Geodatensatzes klassifizieren. Zur Auswahl stehen: <ul>
                        <li>Welt</li>
                        <li>Kontinent</li>
                        <li>Land</li>
                        <li>Region</li>
                        <li>Stadt</li>
                    </ul>
                </li>
                <li><strong>Zeitliche Ausdehnung - Start (optional)</strong>: Hier geben Sie an ab wann der Geodatensatz gültig ist.</li>
                <li><strong>Zeitliche Ausdehnung - Ende (optional)</strong>: Hier geben Sie an bis wann der Datensatz gültig war bzw. voraussichtlich sein wird.</li>
                <li><strong>Bewertung (optional)</strong>: Hier können Sie den Datensatz bewerten von 1 (sehr schlecht) bis 5 (sehr gut).</li>
                <li><strong>Tags (optional)</strong>: Hier geben Sie Tags an, damit der Datensatz später leichter zu finden ist. </li>
                <li><strong>Hyperlink (optional)</strong>: Hier geben Sie weitere Internetquellen an, welche den Geodatensatz ergänzen - z.B. neuer oder besserer Datensatz, Zusatzinformationen zum betroffenen Gebiet, etc.</li>
            </ul>
        </p>
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
					  <button style="float: right;"> Daten ändern</button>
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
						
							echo '<p>Ort: ' . $ort . ' </p>';
							echo '<p>PLZ: ' . $plz . '</p>';
							echo '<p>Land: ' . $land . '</p>';
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

	
    <!-- Skriptabschnitt -->
    <script src="../js/vendor/jquery.js"></script>
    <script src="../js/foundation/foundation.min.js"></script>
    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
	<script type="text/javascript">
		$(document).foundation();
	</script>

</body>
</html>
