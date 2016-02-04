<?php
session_start();
require("header.php");
?>
<center>
	<!-- for showing the errors client side -->		
	<p id='fix_error'></p>
	<p id='user_name_error'></p>
	<p id='password_error'></p>
	<h4 id='activate_error'></h4> 
	<br/> 
	<div class="align">
		<form method="POST">
			Username : <input id="user_name_jq" type="text" name="user_name" value="<?php echo $user_name;?>" /><br/><br/>
			Password : <input id="password_jq" type="password" name="password" value="" /><br/><br/>
			<div class="move"><input id="login" type="button" name="submit" value="Log In" style="width:100px"><br/><br/>
			</div>
		</form>
	</div>
	<a href="forgot.php"><h6>forgot password ? </h6></a>
	<a href="registration.php"><h3>Sign Up </h3></a>
</center>
<?php require("footer.html");?>