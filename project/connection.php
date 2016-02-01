<?php
$dbhost='localhost';
$dbuser='user';
$dbpass='mindfire';
$dbname='user';
$connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
//checking for connection
if(mysqli_connect_errno())
{
	die("Database connection failed : ".mysqli_connect_error()."and error nnumber".mysqli_connect_errno());
}
?>
