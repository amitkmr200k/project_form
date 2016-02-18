<?php
session_start();
require("connection.php");
require 'header.php';
$message = '';
$login = '';

if(isset($_GET['email_id']))
{
	$current_time=time();
	$query="SELECT forgot_time,user_name FROM user WHERE email_id='{$_GET["email_id"]}'";
	$result=mysqli_query($connection,$query);
	$row=mysqli_fetch_assoc($result);
	$time_elpased=$current_time-($row['forgot_time']);
	if ($row['forgot_time']!= '0')
	{
		if ($time_elpased<86400)
		{
			$_SESSION['email_id'] = $_GET['email_id'];
			$_SESSION['user_name'] = $row['user_name'];
		}
		else
		{
			$_SESSION['expire']="Link expired, send mail again ";
			header("Location: forgot.php");
		}	
	}
	else
	{
		$_SESSION['expire']="Warning, Invalid password reset";
		header("Location: forgot.php");
	}
	
}

if(isset($_POST['submit']) && ('' != $_SESSION['email_id']))
		{
			if($_POST['password']==$_POST['confirm_password'])
			{

				$password = md5($_POST['password'].md5($_SESSION['user_name']));
				$query="UPDATE user SET password ='{$password}' WHERE email_id='{$_SESSION['email_id']}'";

				$result=mysqli_query($connection,$query);
				if(!$result)
				{
					echo "error in database <br/>";
				}

                $message ="Password Reset !!!";
                $_SESSION['email_id'] = '';
                $login = "<a href='login.php'>LOGIN</a>";
			}
			else
			{
				$message = "Passwords do not match";
			}
		}
else if( isset($_POST['submit']) && ('' == $_SESSION['email_id']))
{
    $message = 'Invalid attempt to change the password <br/> Click on the link again';
}

?>
<div class='well reset_forgot_password_heading'>
    <h3> Reset Password</h3>
</div>
<div class="well reset_forgot_password">
    <form id =reset_form action="reset_forgot_password.php" method="POST">
        <div class='row error'>
        <center><?php echo $message; ?></center>
        </div>
        <br/>
        <div class='row'>
          <div class='col-sm-2'>  <label>Password </label></div>
          </div>
          <div class='row'>
           <div class='col-sm-4'> <input type="password" name="password" value=""></div>
        </div>
        <br/>
        <div class='row'>
            <div class='col-sm-4'> <label>Confirm Password</label></div>
            </div>
            <div class='row'>
             <div class='col-sm-4'><input type="password" name="confirm_password" value=""></div>
        </div>
        <br/>
        <input type="submit" value ="Reset Password" name="submit">
        <?php echo $login; ?>
    </form>
</div>

<?php require 'footer.html'; ?>