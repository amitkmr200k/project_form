<?php
session_start();
require("validation_function.php");
require("connection.php");
$error=array();
$user_name=trim($_POST['user_name']);
$password=trim($_POST['password']);
//validating user name
if(!value_present($user_name))
{
	$error['user_name']="<b>Username</b> cannot be blank <br/>";
}
else if(!preg_match("/^[a-zA-Z0-9_@]*$/",$_POST['user_name']))
{	
	$error['user_name']="Only charatcers,numbers, @ and underscore(_) allowed in <b>user name</b>";
}
//validating password
if(!value_present($password))
{
	$error['password']="<b>Password</b> cannot be blank <br/>";
}
//if no error found
if(empty($error))
{	$error['activate']="";
	$query="SELECT id,password,activate from user WHERE user_name='$user_name'";
	$result=mysqli_query($connection,$query);
	if($row=mysqli_fetch_assoc($result))
	{	
		if($password==$row["password"] && isset($row['activate']))
		{
			$_SESSION['id']=$row['id']; // decalring session id which is used to track user information
			$error['login']="correct";
		}
		else if($password!=$row["password"])
		{
			$error['password']="Wrong password";	
		}
		else if($password==$row["password"] && !isset($row['activate']))
		{
			$error['activate']=" Account not activated";
		}
	}				
	else
	{
		$error['user_name']="user does not exist";
	}

echo json_encode($error);
}
else
 {	
 	echo json_encode($error);
 }	
