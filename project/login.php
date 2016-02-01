<?php
session_start();
require_once("go_to.php");
require_once("validation_function.php");
require_once("connection.php");
require("header.php");
?> 
<?php
$error=array();
if(isset($_POST['submit']))
{
	$user_name=trim($_POST['user_name']);
	$password=trim($_POST['password']);
	if(!value_present($user_name))
	{
		$error['user_name']="Username cannot be blank <br/>";
	}
	if(!value_present($password))
	{
		$error['password']="Password cannot be blank <br/>";
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
		<?php echo form_error($error);
echo "<br/>"; //function present in validation_function.php file
?>
<div class="align">
	<form action="login.php" method="post">
		Username : <input type="text" name="user_name" value="<?php echo $user_name;?>" /><br/><br/>
		Password : <input type="password" name="password" value="" /><br/><br/>

		<div class="move"><input type="submit" name="submit" value="Log In" style="width:100px"><br/><br/>
		</div>
	</form>
</div>
<a href="forgot.php"><h6>forgot password ? </h6></a>
<a href="registration.php"><h3>Sign Up </h3></a>
</center>
<?php require("footer.html");?>