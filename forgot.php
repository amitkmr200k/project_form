<?php
session_start();
require("header.php");
require("connection.php");

if(isset($_POST['submit']))
{	
	$_SESSION['expire']='';
	$error;
	$query="SELECT COUNT(*) AS email from user where email_id='{$_POST["email_id"]}'";
	$result=mysqli_query($connection,$query);
	$get_email_id=mysqli_fetch_assoc($result);
	
	if($get_email_id['email'] == 1)
	{	
		$email=$_POST['email_id'];
		$time=time();
		$record_time="UPDATE user SET forgot_time='{$time}' WHERE email_id='{$email}'";
		$result=mysqli_query($connection,$record_time);
		$message="http://localhost/projects/assignment/reset_forgot_password.php?email_id=$email";
		$res = mail ( $email, "Reset password",$message);
	}	
	else
	{
		$error= "Email ID not in database";
	}
// if no error	
	if(empty($error))
	{
		$error="Link has been sent to reset the password, please check your inbox";	
	}
}
?>
<center>
	<div class="jumbotron">
		<h2>fogot password ?</h2>
		
	<?php	if(isset($_SESSION['expire']))
		{
			echo $_SESSION['expire'];
		}
		?>
		<font color=red><?php echo $error;?></font>
		<br/><br/>
		<form action="forgot.php" method="POST">
			Enter your Email ID : <input type="text" value="" name="email_id">
			<input type="submit" value="Submit" name="submit"> 
		</form>
	</div>
</center>
<?php require("footer.html");?>