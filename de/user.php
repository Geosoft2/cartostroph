<?php
 class User{
	var $name, $password;
 
	function getName() {
		return this->name;
	}
 
	function User($name,$password) {
		$this->name= $name;
		//The password is submitted to a hash that will encrypt it.
		$this->password= md5($password);
	}
 
	function authentify() {
		//Here is where we access the database.
		$name= $this->name;
		$password= $this->password;
		$query = "SELECT name, passwort FROM nutzer WHERE name=$Benutzername
									AND passwort=$Passwort";
		$results = pg_query($connection, $query);
		if (pg_num_rows($results)>0) {
			$this->geraSessao($this);
			return true;
		}
		else{
			return false;
		}
	}
	
	function startSession($user) {
		session_start();
		$_SESSION['user'] = $user;
	}
 }
?>