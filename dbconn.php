<?php
$username = "";
$password = "";
$host = "localhost";

$link = mysql_connect($host, $username, $password);
if(!$link){
    die("Could not connect to database. ".  mysql_error() );
}
        
mysql_close($link);        
?>
