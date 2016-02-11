<?php
// $dbhost='localhost';
// $dbuser='user';
// $dbpass='mindfire';
// $dbname='user';
// $connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
// //checking for connection
// if(mysqli_connect_errno())
// {
// 	die("Database connection failed : ".mysqli_connect_error()."and error number".mysqli_connect_errno());
// }



$user = "root";
$password = "mindfire";
$database_name = "user";
$hostname = "localhost";
$dsn = 'mysql:dbname=' . $database_name . ';host=' . $hostname;

//initialize the connection to the database
$conn = new PDO($dsn, $user, $password);

?>
