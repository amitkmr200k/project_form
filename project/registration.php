<?php 
require("header.php");
require("registration_validation.php")
?>
<div class="container">
	<div class="respnosive">
		<div class="jumbotron">
			<h1> Registration Form </h1>
			<?php echo form_error($error); ?>
		</div>
	</div>
</div>
<div class="form">
	<div class="container">
		<div class="respnosive">
			<!-- Form going to insert_data page-->
			<form id="registration_form" action="registration.php" enctype="multipart/form-data" method="POST" >
				<div class="row">
					<div class="col-sm-4"><b>First name</b> <br/><input id="first_name" type="text" value="<?php echo "{$_POST['first_name']}";?>" name="first_name" placeholder="First Name"> 
					</div>
					<div class="col-sm-4"><b>Middle name</b> <br/><input id="middle_name" type="text" value="<?php echo "{$_POST['middle_name']}";?>" name="middle_name" placeholder="Middle Name"> 
					</div>
					<div class="col-sm-4"><b>Last name </b><br/><input id="last_name" type="text" value="<?php echo "{$_POST['last_name']}";?>" name="last_name" placeholder="Last Name"> 
					</div>
					<div class="col-xs-4"><p id="fname" class="error"></p></div>
					<div class="col-xs-4"><p id="mname" class="error"></p></div>
					<div class="col-xs-4"><p id="lname" class="error"></p></div>
				</div>
				<div class="row">
					<div class="col-sm-4"><b>User name </b><br/><input id="user_name" type="text" value="<?php echo "{$_POST['user_name']}";?>" name="user_name" placeholder="User Name">
					</div>
					<div class="col-sm-4"><b>Password</b> <br/><input id="password" type="password" value="" name="password" placeholder="password">
					</div>
					<div class="col-sm-4"><b>Confirm Password </b><br/><input id="retype_password" type="password" value="" name="retype_password" placeholder="password">
					</div>
					<div class="col-xs-4"><p id="uname" class="error"></p></div>
					<div class="col-xs-4"><p id="pass" class="error"></p></div>
					<div class="col-xs-4"><p id="retype_pass" class="error"></p></div>  
				</div>
				<div class="row">
					<div class="col-sm-4"><b>email id </b><br/><input id="email_id" type="text" value="<?php echo "{$_POST['email_id']}";?>" name="email_id" placeholder="abc@gmail.com">
					</div>
					<div class="col-sm-4"><b>Age </b><br/><input id="age" type="text" value="<?php echo "{$_POST['age']}";?>" name="age" placeholder="age" maxlength=3>  </div>
					<div class="col-sm-4"><b>Date Of Birth</b> <br/><input id="dob" type="date" value="<?php echo "{$_POST['dob']}";?>" name="dob"></div>
					<div class="col-xs-4"><p id="email" class="error"></p></div>
					<div class="col-xs-4"><p id="age_error" class="error"></p></div>
					<div class="col-xs-4"><p id="dob_error" class="error"></p></div>
				</div>
				<div class="row">
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
						<select id ="employment" name="employment">
							<option value="yes" <?php if($_POST['employment']=="yes") {echo "selected";}?> >yes</option>
							<option value="no" <?php if($_POST['employment']=="no") {echo "selected";}?> >no</option>
						</select>
					</div>
					<div class="col-sm-4"></div>
					<div class="col-sm-4"><b>Employer</b> <br/><input id="employer" type="text" value="<?php echo "{$_POST['employer']}";?>" name="employer"></div>
					<div class="col-xs-4"></div>
					<div class="col-xs-4"></div>
					<div class="col-xs-4"><p id="employer_error" class="error"></p></div>
				</div>
				<!--Residence Address -->
				
				<div>
					<div class="row">
						<div class="col-sm-4"><h4><strong>Residence address</strong></h4></div>
						<br/><br/><br/>
						<div class="col-sm-4"><b>Street</b> <br/><input id="residence_street" type="text" value="<?php echo "{$_POST['residence_street']}";?>" name="residence_street"></div>
						<div class="col-sm-4"><b>City</b> <br/><input id="residence_city" type="text" value="<?php echo "{$_POST['residence_city']}";?>" name="residence_city"></div>
						<div class="col-sm-4"><b>State</b> <br/><input id="residence_state" type="text" value="<?php echo "{$_POST['residence_state']}";?>" name="residence_state"></div>
						<div class="col-xs-4"><p id="resi_street" class="error"></p></div>
						<div class="col-xs-4"><p id="resi_city" class="error"></p></div>
						<div class="col-xs-4"><p id="resi_state" class="error"></p></div>
					</div>
					<div class="row">	
						<div class="col-sm-4"><b>Pin Code</b> <br/><input id="residence_pincode" type="text" value="<?php echo "{$_POST['residence_pincode']}";?>" name="residence_pincode" maxlength=6></div>
						<div class="col-sm-4"><b>Contact No.</b> <br/><input id="residence_contact_no" type="text" value="<?php echo "{$_POST['residence_contact_no']}";?>" name="residence_contact_no" maxlength=10></div>
						<div class="col-sm-4"><b>Fax</b> <br/><input id="residence_fax_no" type="text" value="<?php echo "{$_POST['residence_fax_no']}";?>" name="residence_fax_no" maxlength=10></div>
						<div class="col-xs-4"><p id="resi_pincode" class="error"></p></div>
						<div class="col-xs-4"><p id="resi_contact" class="error"></p></div>
						<div class="col-xs-4"><p id="resi_fax" class="error"></p></div>
					</div>
				</div>		
				<!-- Permanent Address-->
				<div>				
					<div class="row">			
						<div class="col-sm-4"><h4><strong>Permanent address</strong></h4></div>
						<br/><br/><br/>
						<div class="col-sm-4"><b>Street</b> <br/><input id="permanent_street" type="text" value="<?php echo "{$_POST['permanent_street']}";?>" name="permanent_street"></div>
						<div class="col-sm-4"><b>City</b> <br/><input id="permanent_city" type="text" value="<?php echo "{$_POST['permanent_city']}";?>" name="permanent_city"></div>
						<div class="col-sm-4"><b>State</b> <br/><input id="permanent_state" type="text" value="<?php echo "{$_POST['permanent_state']}";?>" name="permanent_state"></div>
						<div class="col-xs-4"><p id="perm_street" class="error"></p></div>
						<div class="col-xs-4"><p id="perm_city" class="error"></p></div>
						<div class="col-xs-4"><p id="perm_state" class="error"></p></div>
					</div>
					<div class="row">	
						<div class="col-sm-4"><b>Pin Code</b> <br/><input id="permanent_pincode" type="text" value="<?php echo "{$_POST['permanent_pincode']}";?>" name="permanent_pincode"  maxlength=6></div>
						<div class="col-sm-4"><b>Contact No.</b> <br/><input id="permanent_contact_no" type="text" value="<?php echo "{$_POST['permanent_contact_no']}";?>" name="permanent_contact_no" maxlength=10></div>
						<div class="col-sm-4"><b>Fax</b> <br/><input id="permanent_fax_no" type="text" value="<?php echo "{$_POST['permanent_fax_no']}";?>" name="permanent_fax_no" maxlength=10></div>
						<div class="col-xs-4"><p id="perm_pincode" class="error"></p></div>
						<div class="col-xs-4"><p id="perm_contact" class="error"></p></div>
						<div class="col-xs-4"><p id="perm_fax" class="error"></p></div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4"><b>Write something(140 words)</b><br/><textarea name="comment" placeholder="Comment here in 140 words" rows="4" cols="30"></textarea></div>
					<br/>	
					<div class="col-sm-4"><input id="submit"  type="submit" value="Submit" name="submit" style="width:175px"></div>
					<div class="col-sm-4">
						<input id="image_input" type="file" value="image" name="image"  accept="image/x-png, image/gif, image/jpeg">
						<img id="image" src="img/dp.png" alt="image preview here" height="150" width="150" />				
					</div>
				</div>
			</form>	
		</div>
	</div>
</div>

<?php require("footer.html");?>