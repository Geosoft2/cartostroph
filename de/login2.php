<!doctype HTML>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cartostroph | Willkommen</title>
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
                    <h1><a href="index.php">Cartostroph</a></h1>
                </li>

                <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
            </ul>
            <section class="top-bar-section">

                <!-- Right Nav Section -->
                <ul class="right">
                    <li><a href="FAQ.html">Hilfe</a></li>

                 <!-- Loginfunktion -->
                    <li class="has-dropdown">
                        <a href="#" data-dropdown="login-dropdown">Login</a>
                    </li>

                    <!-- Suche  -->
                    <li class="has-form">
                        <div>
                            <input type="text" placeholder="Suche">
                        </div>
                    </li>
                </ul>
            </section>
        </nav>
    </div>


    <!-- Inhalt -->
   <div id="registercontent">
       </br>
	<p>Ihr Login schlug fehl.</p>
		<p>Bitte überprüfen Sie ihr Passwort und ihren Benutzernamen und versuchen es erneut.</p>
		<a href="#" data-reveal-id="passwortVergessen">Ich habe mein Passwort vergessen</a>
		<div id="passwortVergessen" class="reveal-modal" data-reveal>
					  <form>
					  	<p> Geben Sie bitte die E-Mail an, welche Sie bei der Registrierung benutzt haben</p>
					  	<p>E-Mail: </p><input type="email" />
					  	<input class="button" type="submit" />
					  </form>
					  <a class="close-reveal-modal">&#215;</a>
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