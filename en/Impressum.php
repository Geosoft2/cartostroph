<!doctype HTML>
<html class="no-js" lang="de-de">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cartostroph | Imprint</title>    
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
					
                </ul>
            </section>
        </nav>
    </div>

    <!-- Inhalt -->
<div class="row">
	<div class="large-1 columns">
	</div>
	<div class="large-11 columns" id="impressumcontent">
		<h1>Imprint</h1>
		
		<p>Cartostroph <br> Heisenbergstr. 2<br> 48149 Münster <br> </p>
		<p> <strong>Represented by: </strong><br>Bartosz Mazurkiewicz<br>Simon Schulte<br>Marco Ruhe<br>Philipp Stüwe<br>Joana Gockel<br></p><p><strong>Contact:</strong> <br>E-Mail: 
		<a href='mailto:s_sch032@uni-muenster.de'>s_sch032@uni-muenster.de</a></br></p>
		
		<p><strong>Disclaimer: </strong><br><br><strong>Liability for content</strong>
		<br><br>
		The contents of these pages were created with great care . For the accuracy, completeness or timeliness of the content, we can not take any responsibility . As a service provider we are responsible according to 7 paragraph 1 of TMG for own contents on these pages under the general law. According to  8 to 10 TMG we are not obligated as a service provider to monitor transmitted or stored information, or to investigate circumstances that indicate illegal activity. Obligations to remove or block access to information under the general laws remain unaffected . However , a relevant liability is only possible from the date of knowledge of a specific infringement . Upon notification of such violations, we will remove the content immediately.
		<br><br><strong>Liability for Links</strong>
		<br><br>
		Our site contains links to external websites over which we have no control. Therefore we can not accept any responsibility for their content. The respective provider or operator is always responsible for the contents of any Linked Site. The linked sites were checked at the time of linking for possible violations of law. Illegal contents were at the time of linking. A permanent control of the linked pages is unreasonable without concrete evidence of a violation . Upon notification of violations, we will remove such links immediately.<br><br><strong>copyright</strong><br><br>
		The content and works provided on these pages created by the site operators are subject to German copyright law. The reproduction, modification , distribution or any kind of exploitation outside the limits of copyright require the written consent of its respective author or creator. Downloads and copies are permitted only for private, non -commercial use. As far as the content is not created by the website operator, the copyrights of third parties. Any duplication or labeled as such. Should you still be aware of copyright infringement , we ask for a hint . Upon notification of violations, we will remove the content immediately .<br><br><strong>Privacy Policy</strong><br><br>
		Use of our website is usually possible without providing personal information . The collection of any personal data ( eg name, address or e- mail address) , this is as far as possible , on a voluntary basis. These data are not without your express permission to third parties. <br>
		We point out that the Data transmission over the Internet ( eg communication by e -mail ) security vulnerabilities. A complete protection of data against unauthorized access by third parties is not possible. <br>
		The use of published under the imprint obligation by third parties for marketing purposes of not expressly requested advertising and information materials is hereby expressly contradicted . The operators of the sites expressly legal steps in case of unsolicited advertising information, such as spam e - mails. <br>
		<p>Information in accordance with 5 TMG</p>
		
		<p><strong>source code</strong><br><br>
Our source code , you can find <a href='https://github.com/mruhe/cartostroph'> code here . < / Br > < / p >
  </div>

 <!-- Dropdown-Login-Feld -->
    <div id="login-dropdown" class="f-dropdown small content" data-dropdown-content="true" width="10%">
        <h5>Log In:</h5>
		
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
            <p>You do not have an account? You can register one <a onclick="test" data-reveal-id="RegisterModal">here</a></p>
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

	
    <!-- Skriptabschnitt -->
    <script src="../js/vendor/jquery.js"></script>
    <script src="../js/foundation/foundation.min.js"></script>
    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
	<script type="text/javascript">
		$(document).foundation();
	</script>

</body>
</html>
