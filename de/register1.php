<!doctype HTML>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cartostroph | Registrierung fehlgeschlagen</title>
    <link rel="stylesheet" href="../css/foundation/foundation.css" />
    <link rel="stylesheet" href="../css/register.css" />
    <script src="../js/vendor/modernizr.js"></script>
    <script src="../js/vendor/jquery.js"></script>
    <script src="../js/foundation/foundation.min.js"></script>
	<script src="../js/leaflet-Interaktion/Karteninteraktion.js"></script>
</head>
<body>
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
                    <li><a href="FAQ.php">Hilfe</a></li>


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
    

    <!-- Inhalt -->
   <div id="registercontent">
   <b> </b>
   <p>Der Benutzername ist schon vergeben!</p>
    <p>Bitte geben Sie einen anderen Benutzernamen an!</p>
   <form action="register.php" method="post" >
                        Benutzername: <input type="text" id="Benutzername" name="Benutzername"/>
                        Passwort: <input type="password" id="Passwort" name="Passwort"/>
                        Passwort wiederholen:<input type="password" id="Passwort2" name="Passwort2"/>
                        Ort (optional): <input type="text" name="Ort" id="Ort" />
                        PLZ (optional): <input type="text" name="PLZ" id="PLZ"/>
                        Land (optional): <input type="text" name="Land" id="Land" />
                        <input type="submit" class="button expand" value="Registrieren" name="Submit" />
                        <a style="text-align: right ;position: relative ; font-size: 120%" class="close-reveal-modal">Abbrechen</a>
                      </form>
	</div>
	
	<!-- Skriptabschnitt -->
	<script type="text/javascript">
		$(document).foundation();
	</script>

	</body>
</html>
