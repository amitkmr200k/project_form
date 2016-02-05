<?php
session_start();
require("header.php");
?>
<div class="form_password">
	<h4 class="error_login" id='activate_error'></h4> 
	<form method="POST">
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-3"><label>Username</label> </div> 
			<input id="user_name_jq" type="text" name="user_name" value="<?php echo $user_name;?>" />
			<div class="col-sm-12"><p class="error_login" id='user_name_error'></p></div>
		</div>
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-3"><label>Password</label> </div> 
			<input id="password_jq" type="password" name="password" value="" />
			<div class="col-sm-12"><p class="error_login" id='password_error'></p></div>
		</div>
		<br/>
		<div class="row">
			<div class="col-sm-3"></div>
			<input id="login" type="button" name="submit" value="Log In" style="width:45%"><br/><br/>
		</div>
	</form>
	<a href="forgot.php"><h6>forgot password ? </h6></a>
	<a href="registration.php"><h3>Sign Up </h3></a>
</div>
<?php require("footer.html");?>