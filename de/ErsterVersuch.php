<?php 

$host = "http://giv-geosoft2c.uni-muenster.de"; 
$user = "p_stue07"; 
$pass = "********"; 
$db = "postgres"; 

$con = pg_connect("host=$host dbname=$db user=$user password=$pass")
    or die ("Could not connect to server\n"); 

$result = pg_query($con, "INSERT INTO test(spalte1, spalte2)
					VALUES('asdf', 'jfghj');");


//dump the reuslut object
var_dump($result);

//closing connection
pg_close($con); 

?>
