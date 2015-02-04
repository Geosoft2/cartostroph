<!doctype HTML>
<html class="no-js" lang="de-de">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cartostroph | User Info</title>    
	<link rel="stylesheet" href="../css/foundation/foundation.css" />
    <link rel="stylesheet" href="../css/default.css" />
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
    <script src="../js/vendor/modernizr.js"></script>
    <script src="../js/leaflet-Interaktion/Karteninteraktion.js"></script>
	<script src="../js/vendor/jquery.js"></script>
    <script src="../js/foundation/foundation.min.js"></script>
    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
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
<div class="row">
   <div class="large-6 columns">
	<br> </br>
	<h3>Meine Topics:</h3>
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
		$sql = "SELECT url_top, titel, text from topic WHERE autor='$user';";
	
		$result = pg_query($connection, $sql);
		if (!$result) {
			die("Error in SQL query: " . pg_last_error());
		}
		
		$fetched = false;
		
		// iterate over result set
		// print each row
		while ($row = pg_fetch_array($result)) {
			$URL = (string)$row[0];
			$Titel = (string)$row[1];
			$Text = (string)$row[2];
			
			$fetched = true;
			
			echo 'URL: <a href=' . $URL . '>' . $URL . '</a><br />';
			echo 'Titel: ' . $Titel . '<br />';
			echo 'Text: ' . $Text;
			echo '<form action=DynamicMap.php method=get>';
			echo '<input type=hidden name=url value=';
			echo $URL;
			echo '>';
			echo '<input class="button tiny" id=filter type=submit value="Mehr Infos..."/>';
			echo '</form>';
			echo '<br />';
			
		}
		
		// if result couldn't show text
		if (!$fetched){
			echo 'Sie haben bisher keine Topics erstellt.';
		}
		
	
		// free memory
		pg_free_result($result);
	?>
	</div>
	
	<div class="large-6 columns">
	<br> </br>
 	<h3>Meine Kommentare:</h3>
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
		$sql = "SELECT page_id, body, rating from comments WHERE name='$user';";
	
		$result = pg_query($connection, $sql);
		if (!$result) {
			die("Error in SQL query: " . pg_last_error());
		}		
		
		$fetched = false;
			
		// iterate over result set
		// print each row
		while ($row = pg_fetch_array($result)) {
			$URL = pg_escape_string(htmlspecialchars((string)$row[0]));
			$Text = pg_escape_string(htmlspecialchars((string)$row[1]));
			$rating = pg_escape_string(htmlspecialchars((string)$row[2]));
			
			if ($rating == ''){
				$rating = 'keine Bewertung';
			}
			
			$fetched = true;
			
			echo 'URL: <a href=' . $URL . '>' . $URL . '</a><br />';
			echo 'Text: ' . $Text .'<br />';
			echo 'Bewertung: '. $rating .'<br />';
			echo '<form action=DynamicMap.php method=get>';
			echo '<input type=hidden name=url value=';
			echo $URL;
			echo '>';
			echo '<input class="button tiny" id=filter type=submit value="Mehr Infos..."/>';
			echo '</form>';
			echo '<br />';
			
		}
		
		// if result couldn't show text
		if (!$fetched){
			echo 'Sie haben bisher keine Kommentare erstellt.';
		}
		
		
		// free memory
		pg_free_result($result);
	?>
	</div>
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
				document.getElementById("eingeloggtAls").innerHTML = "Eingeloggt als: " + autor();
			</script>
			<ul id="drop" class="[tiny small medium large content]f-dropdown" data-dropdown-content>
			  <a href="#" data-reveal-id="Profile">Profil</a>

					<div id="Profile" class="reveal-modal" data-reveal>
					  <h3 id="benutzername">Mein Profil: </h3>
					  
					  <script>
						document.getElementById("benutzername").innerHTML = "Mein Profil: " + autor();
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
			
			  
			  <br /><a href="#">Meine Topics und Kommentare</a>
			  <br /><a href="logout.php">Logout</a>
			</ul>
	</div>


	
    <!-- Skriptabschnitt -->

	<script type="text/javascript">
		$(document).foundation();
	</script>

</body>
</html>
