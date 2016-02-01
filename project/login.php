<?php
session_start();
require("go_to.php");
require("validation_function.php");
require("connection.php");
require("header.php");
if(isset($_POST['submit']))
{	$error=array();
	$user_name=trim($_POST['user_name']);
	$password=trim($_POST['password']);
	if(!value_present($user_name))
	{
		$error['user_name']="<b>Username</b> cannot be blank <br/>";
	}
	else if(!preg_match("/^[a-zA-Z0-9_@]*$/", $_POST['user_name']))
	{	
		$error['user_name']="Only charatcers,numbers, @ and underscore(_) allowed in <b>user name</b>";
	}
	if(!value_present($password))
	{
		$error['password']="<b>Password</b> cannot be blank <br/>";
	}
	//if no error found
	if(empty($error))
	{
		$query="SELECT id,password,activate from user WHERE user_name='$user_name'";
		$result=mysqli_query($connection,$query);
		if($row=mysqli_fetch_assoc($result))
		{	
			if($password!=$row["password"])
			{
				echo "<center> Wrong password</center><br/>";
				$user_name=$_POST['user_name'];		
			}
			else if($password==$row["password"] && isset($row['activate']))
			{
					$_SESSION['id']=$row['id']; // decalring session id which is used to track user information
					redirect("home.php");   // using function in go_to.php file
				}
				else if($password==$row["password"] && !isset($row['activate']))
				{
					echo "<center> Account not activated </center>";
				}
		}		
		else
		{
			echo "<center> user does not exist</center> ";
		}
	}	
}
else
{
	$user_name="";
	$password="";
}
?>
	<center>
		<?php echo form_error($error);//function present in validation_function.php file
// for showing the errors client side		
		echo "<p id='fix_error'></p><p id='user_name_error'></p><p id='password_error'></p> ";
echo "<br/>"; 
?>
<div class="align">
	<form action="login.php" method="post">
		Username : <input id="user_name_jq" type="text" name="user_name" value="<?php echo $user_name;?>" /><br/><br/>
		Password : <input id="password_jq" type="password" name="password" value="" /><br/><br/>

		<div class="move"><input id = "login" type="submit" name="submit" value="Log In" style="width:100px"><br/><br/>
		</div>
	</form>
</div>
<a href="forgot.php"><h6>forgot password ? </h6></a>
<a href="registration.php"><h3>Sign Up </h3></a>
</center>
<?php require("footer.html");?>