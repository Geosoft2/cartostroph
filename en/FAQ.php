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
                    	<a id="regis" href="#" data-reveal-id="RegisterModal">Register</a>
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
    <div id="faqcontent">
        <h1>FAQ</h1>
        <p>This side helps you using Cartostroph!</p>
        <p>
            Cartostroph! is a Web App trying to muster up geological data. 
			When you found interesting geodata, share it right here!
        </p>
        <p>
            <b>How can I add geological data?</b>
            <br />
            <ul>
                <li>Click "Add new topic" in the toolbar above.</li>
                <li>
                    Click the OK button in the following Window.
					Then click two times to define the bounding box of your geodata.
                </li>
                <li>Add informations to the geodata. <a href="#FormularRichtig">Here</a> you can find help.</li>
                <li>When you filled in all important information click "submit"</li>
                <li>Now you have crated a Marker which is linked to your geological data, which can be commented and rated from other users.</li>
            </ul>
        </p>
        <p id="FormularRichtig">
            <b>How to fill in the form for my geological data?</b>
            <br />
            <ul>
                <li><strong>URL</strong>: Here the link of your geological data is requested</li>
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

    <!-- PopUp-Registrierungs-Formular -->
    <div id="RegisterModal" class="reveal-modal" data-reveal>
        <h1> Registration </h1>
        <form action="register.php" method="post">
            Username: <input type="text" id="Benutzername" name="Benutzername" required />
            Password: <input type="password" id="passwort" name="Passwort" required />
            Repeat password:<input type="password" id="passwortWieder" name="Passwort" required />
            Location (optionally): <input type="text" name="Ort" id="Ort" />
            Postcode (optionally): <input type="text" name="PLZ" id="PLZ" />
            Country (optionally): <input type="text" name="Land" id="Land" />
            <input id="regist" type="submit" class="button expand" value="Registrieren" />
            <a style="text-align: right ;position: relative ; font-size: 120%" class="close-reveal-modal">Abbrechen</a>
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
