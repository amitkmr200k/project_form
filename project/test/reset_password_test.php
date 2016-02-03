<?php
session_start();
require("../connection.php");
if(isset($_GET['email_id']))
{
	$current_time=time();
	$query="SELECT forgot_time FROM user WHERE email_id='{$_GET["email_id"]}'";
	$result=mysqli_query($connection,$query);
	$row=mysqli_fetch_assoc($result);
	$time_elpased=$current_time-($row['forgot_time']);
	if($time_elpased<86400)
	{
		if(isset($_POST['submit']))
		{
			if($_POST['password']==$_POST['confirm_password'])
			{
				$query="UPDATE user SET password='{$_POST["password"]}' WHERE email_id='{$_GET["email_id"]}'";
				$result=mysqli_query($connection,$query);			
			}
			else
			{
				echo "Passwords do not match";
			}
		}
	}
	else
	{
		$_SESSION['expire']="Link expired, send mail again ";
		header("Location: forgot_test.php");
	}	
}
?>

<form id =reset_form action="reset_password_test.php" method="POST">
Password : <input type="password" name="password" value="">
Confirm Password : <input type="password" name="confirm_password" value="">
<input type="submit" value ="submit" name="submit">
</form>