<!doctype HTML>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cartostroph | Login fehlgeschlagen</title>
    <link rel="stylesheet" href="../css/foundation/foundation.css" />
    <link rel="stylesheet" href="../css/register.css" />
    <script src="../js/vendor/modernizr.js"></script>
    <script src="../js/vendor/jquery.js"></script>
    <script src="../js/foundation/foundation.min.js"></script>
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
                	<li>
                    	</a> <a href="../de"><img src="../img/germany.gif"></a>
                    </li>
                    
                    <li>
                    	</a> <a href="../en"><img src="../img/uk.gif"></a>
                    </li>
                    
                    <li>
                    	</a> <a href="../pl"><img src="../img/poland.gif"></a>
                    </li>
                    <li><a href="FAQ.php">Help</a></li>

                 <!-- Loginfunktion -->
                    <li class="has-dropdown">
                        <a href="#" data-dropdown="login-dropdown">Login</a>
                    </li>
					
				 <!-- Pop-Up für Registrierung  -->
                    <li>
                    	<a id="regis" href="#" data-reveal-id="RegisterModal">Registration</a>
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
	

    <!-- Inhalt -->
   <div id="registercontent">
       </br>
	<p>Your Login failed.</p>
		<p>Please check your password and username and try again.</p>
		<p>When you forgot your password or username, please make a new registration.</p>
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
            <p>You don't have a registry? Please register <a onclick="test" data-reveal-id="RegisterModal">here</a></p>
        </form>
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
	
	
	<script src="../js/vendor/jquery.js"></script>
    <script src="../js/foundation/foundation.min.js"></script>
	<script type="text/javascript">
	  $(document).foundation();
	</script>
</body>
</html>