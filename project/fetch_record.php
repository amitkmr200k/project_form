<?php
require("connection.php");
// fetching record 
$query="SELECT * from user WHERE id ='{$_SESSION[id]}' ";
$result=mysqli_query($connection,$query);
// checks for query error
if(!result)
{
	die("Database query failed fetch_record");
}
$row=mysqli_fetch_assoc($result);	
?>


