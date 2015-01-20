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
                    <li><a href="FAQ.php">Hilfe</a></li>

                 <!-- Loginfunktion -->
                    <li class="has-dropdown">
                        <a href="#" data-dropdown="login-dropdown">Login</a>
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

    <!-- Inhalt -->
   <div id="registercontent">
       </br>
	<p>Ihr Login schlug fehl.</p>
		<p>Bitte überprüfen Sie Ihr Passwort und Ihren Benutzernamen und versuchen es erneut.</p>
		<p>Wenn sie Ihr Passwort oder Ihren Benutzernamen vergessen haben registrieren Sie sich bitte neu.</p>
		 <form id="top-nav-login" action="login.php" method="post">
            <div class="row">
                <label>Nutzer</label>
                <input type="text" name="user" placeholder="email@example.com" tabindex="1" />
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


    <!-- Dropdown-Login-Feld -->
    <div id="login-dropdown" class="f-dropdown small content" data-dropdown-content="true" width="10%">
        <h5>Log In:</h5>
		
        <form id="top-nav-login" action="login.php" method="post">
            <div class="row">
                <label>Nutzer</label>
                <input type="text" name="user" placeholder="email@example.com" tabindex="1" />
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
	
	
	<script src="../js/vendor/jquery.js"></script>
    <script src="../js/foundation/foundation.min.js"></script>
	<script type="text/javascript">
	  $(document).foundation();
	</script>
</body>
</html>