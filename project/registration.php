<?php 
require("header.php");
require("registration_validation.php")
?>
<div class="container">
	<div class="respnosive">
		<div class="jumbotron">
			<h1> Registration Form</h1>
			<?php echo form_error($error); ?>
		</div>
	</div>
</div>
<div class="form">
	<div class="container">
		<div class="respnosive">
			<form action="registration.php" enctype="multipart/form-data" method="POST">
				<div class="col-sm-4"><b>First name</b> <br/><input type=text value="<?php echo "{$_POST['first_name']}";?>" name="first_name" placeholder="First Name"> 
				</div>
				<div class="col-sm-4"><b>Middle name</b> <br/><input type=text value="<?php echo "{$_POST['middle_name']}";?>" name="middle_name" placeholder="Middle Name"> 
				</div>
				<div class="col-sm-4"><b>Last name </b><br/><input type=text value="<?php echo "{$_POST['last_name']}";?>" name="last_name" placeholder="Last Name"> 
				</div>
				<br/><br/><br/>
				<div class="col-sm-4"><b>User name </b><br/><input type="text" value="<?php echo "{$_POST['user_name']}";?>" name="user_name" placeholder="User Name">
				</div>
				<div class="col-sm-4"><b>Password</b> <br/><input type="password" value="" name="password" placeholder="password">
				</div>
				<div class="col-sm-4"><b>Confirm Password </b><br/><input type="password" value="" name="retype_password" placeholder="password">
				</div>  
				<br/><br/><br/>
				<div class="col-sm-4"><b>email id </b><br/><input type="text" value="<?php echo "{$_POST['email_id']}";?>" name="email_id" placeholder="abc@gmail.com">
				</div>
				<div class="col-sm-4"><b>Age </b><br/><input type="text" value="<?php echo "{$_POST['age']}";?>" name="age" placeholder="age">  </div>
				<div class="col-sm-4"><b>Date Of Birth</b> <br/><input type="date" value="<?php echo "{$_POST['dob']}";?>" name="dob"></div>
				<br/><br/><br/>		
				<div class="col-sm-4"><b>Gender</b> <br/> 
					<input type="radio" name="gender" value="male" <?php 
					if(isset($_POST['submit']))
					{
						if($_POST['gender']=="male") {echo "checked";}
					}
					else 
					{
						echo "checked";
					}	
					?> > Male<br>
					<input type="radio" name="gender" value="female"<?php if($_POST['gender']=="female") {echo "checked";}?> > Female<br>
				</div>
				<div class="col-sm-4"><b>Marital Status</b> <br/>
					<select name="marital_status">
						<option value="married" <?php if($_POST['marital_status']=="married") {echo "selected";}?> >Married</option>
						<option value="unmarried" <?php if($_POST['marital_status']=="unmarried") {echo "selected";}?> >Unmarried</option>
					</select>
				</div>
				<div class="col-sm-4"><b>Employed</b> <br/>
					<select name="employment">
						<option value="yes" <?php if($_POST['employment']=="yes") {echo "selected";}?> >yes</option>
						<option value="no" <?php if($_POST['employment']=="no") {echo "selected";}?> >no</option>
					</select>
				</div>
				<div class="col-sm-4"></div>
				<div class="col-sm-4"><b>Employer</b> <br/><input type="text" value="<?php echo "{$_POST['employer']}";?>" name="employer"></div>
				<br/><br/><br/><br/><br/>
				<div class="address">
					<!-- Residence Address -->				
					<div class="col-sm-4"><h4><strong>Residence address</strong></h4></div><br/><br/><br/>
					<div class="col-sm-4"><b>Street</b> <br/><input type="text" value="<?php echo "{$_POST['residence_street']}";?>" name="residence_street"></div>
					<div class="col-sm-4"><b>City</b> <br/><input type="text" value="<?php echo "{$_POST['residence_city']}";?>" name="residence_city"></div>
					<div class="col-sm-4"><b>State</b> <br/><input type="text" value="<?php echo "{$_POST['residence_state']}";?>" name="residence_state"></div>
					<br/><br/><br/>
					<div class="col-sm-4"><b>Pin Code</b> <br/><input type="text" value="<?php echo "{$_POST['residence_pincode']}";?>" name="residence_pincode"></div>
					<div class="col-sm-4"><b>Contact No.</b> <br/><input type="text" value="<?php echo "{$_POST['residence_contact_no']}";?>" name="residence_contact_no"></div>
					<div class="col-sm-4"><b>Fax</b> <br/><input type="text" value="<?php echo "{$_POST['residence_fax_no']}";?>" name="residence_fax_no"></div>
					<br/><br/><br/>
					<!-- Permanent Address -->
					<div class="col-sm-4"><h4><strong>Permanent address</strong></h4></div><br/><br/><br/>
					<div class="col-sm-4"><b>Street</b> <br/><input type="text" value="<?php echo "{$_POST['permanent_street']}";?>" name="permanent_street"></div>
					<div class="col-sm-4"><b>City</b> <br/><input type="text" value="<?php echo "{$_POST['permanent_city']}";?>" name="permanent_city"></div>
					<div class="col-sm-4"><b>State</b> <br/><input type="text" value="<?php echo "{$_POST['permanent_state']}";?>" name="permanent_state"></div>
					<br/><br/><br/>
					<div class="col-sm-4"><b>Pin Code</b> <br/><input type="text" value="<?php echo "{$_POST['permanent_pincode']}";?>" name="permanent_pincode"></div>
					<div class="col-sm-4"><b>Contact No.</b> <br/><input type="text" value="<?php echo "{$_POST['permanent_contact_no']}";?>" name="permanent_contact_no"></div>
					<div class="col-sm-4"><b>Fax</b> <br/><input type="text" value="<?php echo "{$_POST['permanent_fax_no']}";?>" name="permanent_fax_no"></div>
					<br/><br/><br/>
				</div>				
				<div class="col-sm-4"><b>Write something(140 words)</b><br/><textarea name="comment" placeholder="Comment here in 140 words" rows="4" cols="30"></textarea></div>
				<br/>	
				<div class="col-sm-4"><input type="submit" value="Submit" name="submit" style="width:175px"></div>
				<div class="col-sm-4"><input type="file" value="image" name="image"  accept="image/x-png, image/gif, image/jpeg"></div>
			</form>	
		</div>	
	</div>
</div>
</form>
<?php require("footer.html");?>