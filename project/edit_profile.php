<?php
require_once("isset_session.php");
require("header.php"); 
require("fetch_record.php");
require("edit_profile_validation.php");
?>  
<div class="container">
	<div class="respnosive">
		<div class="jumbotron">
			<h1><font face="times new roman"> Edit Profile</font></h1>
			<?php 
			echo form_error($error);
			if($_SESSION["value"]==1)
			{
				echo "<p><font color=red>Profile Updated !</font></p><br/>";
				$_SESSION["value"]=0;   
			}

			if($_SESSION["value"]==2)
			{
				echo "<p><font color=red>Password Reset !</font></p><br/>";
				$_SESSION["value"]=0;   
			}
//function to display data in the text box
			function display($row,$name)
			{
				if(isset($_POST['submit']))
				{
					return $_POST[$name];
				}
				if(!isset($_POST['submit']))
				{

					return $row[$name];
				}
			}
			?>  
		</div>
	</div>
</div>
<div class="form">
	<div class="container">
		<div class="respnosive">
			<form action="edit_profile.php" enctype="multipart/form-data" method="POST">
				<div class="col-sm-4"><b>First name</b> <br/><input type=text value="<?php echo display($row,'first_name');?>" name="first_name"> 
				</div>
				<div class="col-sm-4"><b>Middle name</b> <br/><input type=text value="<?php echo display($row,'middle_name');?>" name="middle_name"> 
				</div>
				<div class="col-sm-4"><b>Last name </b><br/><input type=text value="<?php echo display($row,'last_name');?>" name="last_name"> 
				</div>
				<br/><br/><br/>
				<div class="col-sm-4"><b>User name </b><br/><input type="text" value="<?php echo display($row,'user_name');?>" name="user_name">
				</div>
				<div class="col-sm-4"><b>Age </b><br/><input type="text" value="<?php echo display($row,'age');?>" name="age">  </div>
				<div class="col-sm-4"><b>DOB</b> <br/><input type="date" value="<?php echo display($row,'dob');?>" name="dob"></div>
				<br/><br/><br/>
				<div class="col-sm-4"><b>email id </b><br/><input type="text" value="<?php echo display($row,'email_id');?>" name="email_id">
				</div>
				<div class="col-sm-4"><b>Marital Status</b> <br/>
					<select name="marital_status">
						<option value="married" <?php 
						$marital_status=display($row,'marital_status');
						if( $marital_status=="married") {echo "selected";}
						?> >married</option> 
						<option value="unmarried" <?php 
						$marital_status=display($row,'marital_status');
						if($marital_status=="unmarried") {echo "selected";}
						?> >unmarried</option>      
					</select>
				</div>
				<div class="col-sm-4"><b>Employed</b> <br/>
					<select name="employment">
						<option value="yes" 
						<?php 
						$employment=display($row,'employment');
						if($employment=="yes") {echo "selected";}?> >yes</option>
						<option value="no"
						<?php 
						$employment=display($row,'employment');
						if($employment=="no") {echo "selected";}?> >no</option>
					</select>
				</div>
				<br/><br/><br/>
				<div class="col-sm-4"><b>Gender</b> <br/> 
					<input type="radio" name="gender" value="male" 
					<?php 
					$gender=display($row,'gender');
					if($gender=="male") {echo "checked";}?> >male<br/>
					<input type="radio" name="gender" value="female" 
					<?php
					$gender=display($row,'gender'); 
					if($gender=="female") {echo "checked";}?> >female<br/>
				</div>
				<div class="col-sm-4"></div>
				<div class="col-sm-4"><b>Employer</b> <br/><input type="text" value="<?php echo display($row,'employer');?>" name="employer"></div>
				<br/><br/><br/><br/><br/>
				<div class="address">
					<div class="col-sm-4"><h4><strong>Residence address</strong></h4></div><br/><br/><br/>
					<div class="col-sm-4"><b>Street</b> <br/><input type="text" value="<?php echo display($row,'residence_street');?>" name="residence_street"></div>
					<div class="col-sm-4"><b>City</b> <br/><input type="text" value="<?php echo display($row,'residence_city');?>" name="residence_city"></div>
					<div class="col-sm-4"><b>State</b> <br/><input type="text" value="<?php echo display($row,'residence_state');?>" name="residence_state"></div>
					<br/><br/><br/>
					<div class="col-sm-4"><b>Pin Code</b> <br/><input type="text" value="<?php echo display($row,'residence_pincode');?>" name="residence_pincode"></div>
					<div class="col-sm-4"><b>Contact No.</b> <br/><input type="text" value="<?php echo display($row,'residence_contact_no');?>" name="residence_contact_no"></div>
					<div class="col-sm-4"><b>Fax</b> <br/><input type="text" value="<?php echo display($row,'residence_fax_no');?>" name="residence_fax_no"></div>
					<br/><br/><br/>
					<div class="col-sm-4"><h4><strong>Permanent address</strong></h4></div><br/><br/><br/>
					<div class="col-sm-4"><b>Street</b> <br/><input type="text" value="<?php echo display($row,'permanent_street');?>" name="permanent_street"></div>
					<div class="col-sm-4"><b>City</b> <br/><input type="text" value="<?php echo display($row,'permanent_city');?>" name="permanent_city"></div>
					<div class="col-sm-4"><b>State</b> <br/><input type="text" value="<?php echo display($row,'permanent_state');?>" name="permanent_state"></div>
					<br/><br/><br/>
					<div class="col-sm-4"><b>Pin Code</b> <br/><input type="text" value="<?php echo display($row,'permanent_pincode');?>" name="permanent_pincode"></div>
					<div class="col-sm-4"><b>Contact No.</b> <br/><input type="text" value="<?php echo display($row,'permanent_contact_no');?>" name="permanent_contact_no"></div>
					<div class="col-sm-4"><b>Fax</b> <br/><input type="text" value="<?php echo display($row,'permanent_fax_no');?>" name="permanent_fax_no"></div>
					<br/><br/><br/>
				</div>
				<div class="col-sm-4"><b>Write something</b><br/><textarea name="comment"><?php echo stripcslashes($row['comment']);?></textarea></div> 
				<br/>
				<div class="col-sm-4"><input type="submit" value="submit" name="submit" size="50"></div>
				<div class="col-sm-4"><input type="file" value="image" name="image"></div>
				<div class="col-sm-4">
					<img width = "150px" height="150px" src="/project/new/img/<?php
					if(!isset($_POST['submit']))
					{
						echo $row['image'];         
					}   
					else
					{
						echo $img_var;
					}
					?>">
				</div>
			</form> 
			<br/>
			<div class="col-sm-4"><a href="reset_password.php"><h3>Reset Password</h3></a></div>  
		</div>
	</div>
</div>
<?php require("footer.html");?>