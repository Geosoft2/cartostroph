<!doctype HTML>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cartostroph | Login nie powiódł się</title>
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
                    <li><a href="FAQ.php">Pomoc</a></li>

                 <!-- Loginfunktion -->
                    <li class="has-dropdown">
                        <a href="#" data-dropdown="login-dropdown">Login</a>
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

	<<!-- PopUp-Registrierungs-Formular -->
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

    <!-- Inhalt -->
   <div id="registercontent">
       </br>
	<p>Twój login nie powiódł się.</p>
		<p>Proszę sprawdż nazwę użytkownika oraz hasło.</p>
		<p>Jeśli zapomniałeś nazwy użytkownika lub hasła yarejestruj się na nowo.</p>
		 <form id="top-nav-login" action="login.php" method="post">
            <div class="row">
                <label>Użytwonik</label>
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
	
	
	<script src="../js/vendor/jquery.js"></script>
    <script src="../js/foundation/foundation.min.js"></script>
	<script type="text/javascript">
	  $(document).foundation();
	</script>
</body>
</html>