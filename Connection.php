<?php
$username = "Porapipat";
$password = "Porapipat159753654";
$hostname = "localhost";
$dbname = "cherrydb";

$connection = mysqli_connect($hostname, $username, $password);
$link = mysqli_select_db($connection, $dbname);

if (!$link) {
    die("Connection failed" . mysqli_connect_error());
}

?>