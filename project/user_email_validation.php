<?php
require("connection.php");
$error = array();
$query = "SELECT COUNT(*) AS email from user where email_id='{$_POST["email_id"]}'";
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
//
$query = "SELECT COUNT(*) AS user_duplicate from user where user_name='{$_POST["user_name"]}'";
$result = mysqli_query($connection,$query);
$row = mysqli_fetch_assoc($result);
					//mysqli_free_result($result);
if($row['user_duplicate'] == 1)
{
	$error['user_name'] = "1";	
}		
else
{
	$error['user_name'] = "0";
}

echo json_encode($error);
