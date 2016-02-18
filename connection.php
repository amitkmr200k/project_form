<?php
$dbhost     = 'localhost';
$dbuser     = 'user';
$dbpass     = 'mindfire';
$dbname     = 'user';
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// Checking for connection.
if (mysqli_connect_errno())
{
    die('Database connection failed : '.mysqli_connect_error().'and error number'.mysqli_connect_errno());
}
?>
