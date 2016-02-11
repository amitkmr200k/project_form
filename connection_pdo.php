<?php
$user = "root";
$password = "mindfire";
$database_name = "user";
$hostname = "localhost";
$dsn = 'mysql:dbname=' . $database_name . ';host=' . $hostname;

//initialize the connection to the database
$conn = new PDO($dsn, $user, $password);
?>