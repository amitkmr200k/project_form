<?php
require_once("isset_session.php");
require("connection.php");
require("header.php");
require("validation_function.php");
//if the form is submitted
if(isset($_POST['submit']))
{
	$query="SELECT password from user WHERE id ='{$_SESSION[id]}' ";
	$result=mysqli_query($connection,$query);
// checks for query error
	if(!$result)
	{
		die("Database query failed fetch_record");
	}
	$row=mysqli_fetch_assoc($result);	
	mysqli_free_result($result);
	$error=array();
//validating current password
	if(!value_present($_POST['current_password']))
	{
		$error['current_password']="<b>Current Password</b> cannot be blank";
	}
	elseif ($row['password']!=$_POST['current_password']) 
	{
		$error['current_password']="Please enter correct password";
	}						
//validating new password
	if(!value_present($_POST['new_password']))
	{
		$error['new_password']="<b>New Password</b> cannot be blank";
	}
//validating confirm new password
	if(!value_present($_POST['confirm_new_password']))
	{
		$error['confirm_new_password']="<b>Confirm Password</b> cannot be blank";
	}	
// Passwords do not match
	if($_POST['new_password'] !=$_POST['confirm_new_password'])
	{
		$error['password_not_match']="<b>Password</b> and <b>Confirm Password</b> do not match";
	}
//if no error found
	if(empty($error))
	{
		$query="UPDATE user SET ";
		$query.="password = '{$_POST["new_password"]}' ";
		$query.=" WHERE id = '{$_SESSION[id]}' ";
		$result=mysqli_query($connection,$query);
// checks for query error
		if(!$result)
		{
			die("Database query failed");
		}
		else
		{
			$_SESSION["value"]=2;
			redirect("edit_profile.php");
		}
	}		
//free result 
	mysqli_free_result($result);
//close connection 	
	mysqli_close($connection);
}
?>
<center>
	<?php echo form_error($error);?>
	<form action="reset_password.php" method="post">
		<b>Current Password</b><br/>
		<input type="password" value="" name="current_password">
		<br/>
		<b>New Password</b><br/>
		<input type="password" value="" name="new_password">
		<br/>
		<b>Confirm Password</b><br/>
		<input type="password" value="" name="confirm_new_password">
		<br/><br/>
		<input type="submit" value="Submit" name="submit">
	</form>
</center>
<?php require("footer.html");?>