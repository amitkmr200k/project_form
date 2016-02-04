<?php
require("header.php");
require("connection.php");
if(isset($_POST['submit']))
{
	$error;
	$query="SELECT COUNT(*) AS email from user where email_id='{$_POST["email_id"]}'";
	$result=mysqli_query($connection,$query);
	$get_email_id=mysqli_fetch_assoc($result);
	if($get_email_id['email']==1)
	{	
		$email=$_POST['email_id'];
		$password=md5(uniqid(rand(1,100),true));;
		$change_password="UPDATE user SET password='{$password}' WHERE email_id='{$email}'";
		$result=mysqli_query($connection,$change_password);
//sending the password			
		$res = mail ( $email, "activation link","Your new Password is {$password}");
	}	
	else
	{
		$error= "Email ID not in database";
	}
// if no error	
	if(empty($error))
	{
		$error="Password has been sent, please check your inbox";	
	}
}
?>
<center>
	<div class="jumbotron">
		<h2>fogot password ?</h2>
		<font color=red><?php echo $error;?></font>
		<br/><br/>
		<form action="forgot.php" method="POST">
			Enter your Email ID : <input type="text" value="" name="email_id">
			<input type="submit" value="Submit" name="submit"> 
		</form>
	</div>
</center>
<?php require("footer.html");?>