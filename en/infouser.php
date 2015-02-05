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

    <!-- Inhalt -->
<div class="row">
   <div class="large-6 columns">
	<br> </br>
	<h3>My Topics:</h3>
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
			$URL = pg_escape_string(htmlspecialchars((string)$row[0]));
			$Titel = pg_escape_string(htmlspecialchars((string)$row[1]));
			$Text = pg_escape_string(htmlspecialchars((string)$row[2]));
			
			$fetched = true;
			
			echo 'URL: <a href=' . $URL . '>' . $URL . '</a><br />';
			echo 'Title: ' . $Titel . '<br />';
			echo 'Text: ' . $Text;
			echo '<form action=DynamicMap.php method=get>';
			echo '<input type=hidden name=url value=';
			echo $URL;
			echo '>';
			echo '<input class="button tiny" id=filter type=submit value="More Infos..."/>';
			echo '</form>';
			echo '<br />';
			
		}
		
		// if result couldn't show text
		if (!$fetched){
			echo 'You did not generate any topics yet.';
		}
		
	
		// free memory
		pg_free_result($result);
	?>
	</div>
	
	<div class="large-6 columns">
	<br> </br>
 	<h3>My Comments:</h3>
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
				$rating = 'no rating';
			}
			
			$fetched = true;
			
			echo 'URL: <a href=' . $URL . '>' . $URL . '</a><br />';
			echo 'Text: ' . $Text .'<br />';
			echo 'Rating: '. $rating .'<br />';
			echo '<form action=DynamicMap.php method=get>';
			echo '<input type=hidden name=url value=';
			echo $URL;
			echo '>';
			echo '<input class="button tiny" id=filter type=submit value="More Infos..."/>';
			echo '</form>';
			echo '<br />';
			
		}
		
		// if result couldn't show text
		if (!$fetched){
			echo 'You did not generate any comments yet.';
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
                <label>User</label>
                <input type="text" name="user" placeholder="email@example.com" tabindex="1" />
            </div>
            <div class="row">
                <label>Password</label>
                <input type="password" placeholder="********" tabindex="2" />
            </div>
            <div class="row">
                <input type="submit" class="button tiny success" value="Login" tabindex="3" />
            </div>
            <p>You don't have a login? Click <a onclick="test" data-reveal-id="RegisterModal">here</a> for registration.</p>
        </form>
    </div>
	
	<!-- Dropdown-Eingeloggt-Feld -->
	<div id="loggedin-dropdown" class="f-dropdown small content" data-dropdown-content="true" width="10%">
		<h5 id="eingeloggtAls"><h5>
			<script>
				document.getElementById("eingeloggtAls").innerHTML = "Eingeloggt als: " + author();
			</script>
			<ul id="drop" class="[tiny small medium large content]f-dropdown" data-dropdown-content>
			  <a href="#" data-reveal-id="Profile">Profile</a>

					<div id="Profile" class="reveal-modal" data-reveal>
					  <h3 id="benutzername">My profile: </h3>
					  
					  <script>
						document.getElementById("benutzername").innerHTML = "Mein Profil: " + author();
					  </script>
					  <form action="alteruser.php" method="post">
					  <button style="float: right;">change data</button>
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
						
							echo '<p>Location: ' . $ort . ' </p>';
							echo '<p>Postcode: ' . $plz . '</p>';
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
			
			  
			  <br /><a href="infouser.php">My Topics and Comments</a>
			  <br /><a href="logout.php">Logout</a>
			</ul>
	</div>

	
    <!-- Skriptabschnitt -->

	<script type="text/javascript">
		$(document).foundation();
	</script>

</body>
</html>
