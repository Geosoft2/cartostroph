<!doctype HTML>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cartostroph | Rejestracja nie powiodła się</title>
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
	
<!-- Dropdown-Eingeloggt-Feld -->
	<div id="loggedin-dropdown" class="f-dropdown small content" data-dropdown-content="true" width="10%">
		<h5 id="eingeloggtAls"><h5>
			<script>
				document.getElementById("eingeloggtAls").innerHTML = "Zalogowany jako: " + author();
			</script>
			<ul id="drop" class="[tiny small medium large content]f-dropdown" data-dropdown-content>
			  <a href="#" data-reveal-id="Profile">Profil</a>

					<div id="Profile" class="reveal-modal" data-reveal>
					  <h3 id="benutzername">Mój profil: </h3>
					  
					  <script>
						document.getElementById("benutzername").innerHTML = "Mój profil: " + author();
					  </script>
					  <form action="alteruser.php" method="post">
						<p>Miejscowość: <input type="text" id="ort" name="ort" style="width: 75%;"/></p>
						<p>Kod pocztowy: <input type="text" id="plz" name="plz" style="width: 75%;"/></p>
						<p>Kraj: <input type="text" id="land" name="land" style="width: 75%;"/></p>
						<button style="float: right;">Zmień dane</button>
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
              }else{ echo 'document.getElementById("ort").value = "brak danych";';}
              if ($plz != ''){
                echo 'document.getElementById("plz").value = "'.$plz.'";';
              }else{ echo 'document.getElementById("plz").value = "brak danych";';}
              if ($land != ''){
                echo 'document.getElementById("land").value = "'.$land.'";';
              }else{ echo 'document.getElementById("land").value = "brak danych";';}
              echo '</script>';
              
              //echo 'Ort: <input value="' . $ort . '"type=\"text\" id=\"ort\" name=\"ort\" style=\"width: 90%;\"/>';
              //echo 'PLZ: <input value="' . $plz . '" type=\"text\" id=\"plz\" name=\"plz\" style=\"width: 90%;\"/>';
              //echo 'Land: <input value="' . $land . '" type=\"text\" id=\"land\" name=\"land\" style=\"width: 90%;\"/>';
            }
            
            if (!fechted){
              echo 'document.getElementById("ort").value = "brak danych";';
              echo 'document.getElementById("plz").value = "brak danych";';
              echo 'document.getElementById("land").value = "brak danych";';
            }

            // free memory
            pg_free_result($result);
            ?>  
            </form>
          </div>
      
        
        <br /><a href="infouser.php">Moje wątki i komentarze</a>
			  <br /><a href="logout.php">Wyloguj</a>
      </ul>
  </div>
    

    <!-- Inhalt -->
   <div id="registercontent">
   <b> </b>
   <p>Nazwa użytkownika już jest zajęta!</p>
    <p>Proszę podać inną nazwę użytkownika!</p>
   <form action="register.php" method="post" >
                        Nazwa użytkownika: <input type="text" id="Benutzername" name="Benutzername" required />
			            Hasło: <input type="password" id="passwort" name="Passwort" required />
			            Powtórz hasło:<input type="password" id="passwortWieder" name="Passwort2" required />
			            Miejscowość (opcjonalnie): <input type="text" name="Ort" id="Ort" />
			            Kod pocztowy (opcjonalnie): <input type="text" name="PLZ" id="PLZ" />
			            Kraj (opcjonalnie): <input type="text" name="Land" id="Land" />
                        <input type="submit" class="button expand" value="Registrieren" name="Submit" />
                        <a style="text-align: right ;position: relative ; font-size: 120%" class="close-reveal-modal">Anuluj</a>
                      </form>
	</div>
	
	<!-- Skriptabschnitt -->
	<script type="text/javascript">
		$(document).foundation();
	</script>

	</body>
</html>
