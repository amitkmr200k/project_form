<?php
session_start();
require("connection.php");
$error = array();
$query = "SELECT COUNT(*) AS email from user where email_id='{$_POST["email_id"]}' AND id != '{$_SESSION["id"]}'";
$result = mysqli_query($connection,$query);
$get_email_id = mysqli_fetch_assoc($result);
					//mysqli_free_result($result);
if($get_email_id['email'] == 1)
{
	$error['email_id'] = "1";	
}		
else
{
	$error['email_id'] = "0";
}
echo json_encode($error);
