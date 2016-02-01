<?php
require("go_to.php");
require("connection.php");
require("validation_function.php");
//if the form is submitted
if(isset($_POST['submit']))
{	
	$error=array();
//uploading image file to the server and validating it.	
	if ($_FILES['image']['name']) 
	{
		$img_var = basename($_FILES['image']['name']);
		$image_type = pathinfo($img_var, PATHINFO_EXTENSION);
		if($image_type!="jpg" && $image_type!="jpeg" && $image_type!="png" && $image_type!="gif")
		{
			$error['image']="Invalid <b>image</b> type";
		}
		else	
		{
			move_uploaded_file($_FILES['image']['tmp_name'], "/var/www/html/project/new/img/$img_var");
		}
	}
//validating first name
	if(!value_present($_POST['first_name']))
	{
		$error['first_name']="<b>first name</b> cannot be blank";
	}
	else if(!preg_match("/^[a-zA-Z]*$/",$_POST['first_name']))
	{
		$error['first_name']="Only charatcers allowed in <b>first name</b>";
	}
//validating middle name	
	if(!preg_match("/^[a-zA-Z .]*$/", $_POST['middle_name']))
	{
		$error['middle_name']="Only charatcers,dot and space allowed in <b>middle name</b>";
	}
//validating last name	
	if(!preg_match("/^[a-zA-Z .]*$/", $_POST['last_name']))
	{
		$error['last_name']="Only charatcers, dot and spaces allowed in <b>last name</b>";
	}
//validating user name
	if(!value_present($_POST['user_name']))
	{
		$error['user_name']="<b>User name</b> cannot be blank";
	}
	else if(!preg_match("/^[a-zA-Z0-9_]*$/", $_POST['user_name']))
	{	
		$error['user_name']="Only charatcers,numbers and underscore(_) allowed in <b>user name</b>";
	}
	else
	{	
		$query="SELECT COUNT(*) AS user1 from user where user_name='{$_POST["user_name"]}'";
		$result=mysqli_query($connection,$query);
		$get_user_name=mysqli_fetch_assoc($result);
		//mysqli_free_result($result);
		if($get_user_name['user1']==1)
		{
			$error['user_name']="<b>User name</b> already exists,please choose a different user name";	
		}	
	}
//validating email id
	if(!value_present($_POST['email_id']))
	{
		$error['email_id']="<b>email id</b> cannot be blank";
	}
	else if (!filter_var($_POST['email_id'], FILTER_VALIDATE_EMAIL)) 
	{
		$error['email_id'] = "Please enter a valid <b>email</b>"; 
	}	
	else
	{
		$query="SELECT COUNT(*) AS email from user where email_id='{$_POST["email_id"]}'";
		$result=mysqli_query($connection,$query);
		$get_email_id=mysqli_fetch_assoc($result);
		//mysqli_free_result($result);
		if($get_email_id['email']==1)
		{
			$error['email_id']="<b>Email Id</b> already exists,please enter a different email id";	
		}		
	}	
//validating password
	if(!value_present($_POST['password']))
	{
		$error['password']="<b>Password</b> cannot be blank";
	}						
//validating confirm password
	if(!value_present($_POST['retype_password']))
	{
		$error['retype_password']="<b>Confirm Password</b> cannot be blank";
	}
// Passwords do not match
	if($_POST['password'] !=$_POST['retype_password'])
	{
		$error['password_not_match']="<b>Password</b> and <b>Confirm Password</b> do not match";
	}	
//validating age
	if(!value_present($_POST['age']))
	{
		$error['age']="<b>Age</b> cannot be blank";
	}
	else if($_POST['age']<1 || $_POST['age']>110)
	{	
		$error['age']="Enter a valid <b>age</b>";
	}
//validating date of birth
	if(empty($_POST['dob']))
	{
		$error['don']="<b>Date Of Birth</b> cannot be blank";
	}
//validating gender
	if(!value_present($_POST['gender']))
	{
		$error['date']="Choose a <b>gender</b>";
	}	
//validating employer
	if($_POST['employment']=="yes")
	{	
		if(!value_present($_POST['employer']))
		{
			$error['employer']="<b>Employer</b> cannot be blank";
		}
		else if(!preg_match("/^[a-zA-Z ]*$/", $_POST['employer']))
		{	
			$error['employer']="Only charatcers,numbers and spaces allowed in <b>employer</b>";
		}
	}
	else
	{
		if(!preg_match("/^[ ]*$/", $_POST['employer']))
		{	
			$error['employer']="First choose <b>Employed</b> as <b>YES</b>, then enter your <b>Employer</b> ";
		}	
	}
//Residence Address	
//validating residence address street
	if(!value_present($_POST['residence_street']))
	{
		$error['residence_street']="In Residence Address: <b>street</b> cannot be blank";
	}
	else if(!preg_match("/^[a-zA-Z .]*$/", $_POST['residence_street']))
	{	
		$error['residence_street']="Only charatcers allowed in <b>street(residence)</b>";
	}
//validating residence address city		
	if(!value_present($_POST['residence_city']))
	{
		$error['residence_city']="In Residence Address: <b>city</b> cannot be blank";
	}
	else if(!preg_match("/^[a-zA-Z .]*$/", $_POST['residence_city']))
	{	
		$error['residence_city']="Only charatcers allowed in <b>city(residence)</b>";
	}
//validating residence address state		
	if(!value_present($_POST['residence_state']))
	{
		$error['residence_state']="In Residence Address: <b>state</b> cannot be blank";
	}
	else if(!preg_match("/^[a-zA-Z .]*$/", $_POST['residence_state']))
	{	
		$error['residence_state']="Only charatcers allowed in <b>state(residence)</b>";
	}
//validating residence pincode		
	if(!value_present($_POST['residence_pincode']))
	{
		$error['residence_pincode']="In Residence Address: <b>pincode</b> cannot be blank";
	}
	else if(!preg_match("/^([0-9]{6})*$/", $_POST['residence_pincode']))
	{	
		$error['residence_pincode']="Only digits(6) allowed in <b>pincode(residence)</b>";
	}
//validating residence contact number		
	if(!value_present($_POST['residence_contact_no']))
	{
		$error['residence_contact_no']="In Residence Address: <b>Contact Number</b> cannot be blank";
	}
	else if(!preg_match("/^([0-9]{10})*$/", $_POST['residence_contact_no']))
	{	
		$error['residence_contact_no']="Only digits(10) allowed in <b>contact number(residence)</b>";
	}
//validating residence fax no
	if((value_present($_POST['residence_fax_no'])) && (!preg_match("/^([0-9]{10})*$/", $_POST['residence_fax_no'])))
	{	
		$error['residence_fax_no']="Only digits(10) allowed in <b>Fax Number(residence)</b>";
	}
//Permanent Address		
//validating permanent address street
	if(!value_present($_POST['permanent_street']))
	{
		$error['permanent_street']="In permanent Address: <b>street</b> cannot be blank";
	}
	else if(!preg_match("/^[a-zA-Z .]*$/", $_POST['permanent_street']))
	{	
		$error['permanent_street']="Only charatcers allowed in <b>street(permanent)</b>";
	}
//validating permanent address city		
	if(!value_present($_POST['permanent_city']))
	{
		$error['permanent_city']="In permanent Address: <b>city</b> cannot be blank";
	}
	else if(!preg_match("/^[a-zA-Z .]*$/", $_POST['permanent_city']))
	{	
		$error['permanent_city']="Only charatcers allowed in <b>city(permanent)</b>";
	}
//validating permanent address state		
	if(!value_present($_POST['permanent_state']))
	{
		$error['permanent_state']="In permanent Address: <b>state</b> cannot be blank";
	}
	else if(!preg_match("/^[a-zA-Z .]*$/", $_POST['permanent_state']))
	{	
		$error['permanent_state']="Only charatcers allowed in <b>state(permanent)</b>";
	}	
//validating permanent pincode		
	if(!value_present($_POST['permanent_pincode']))
	{
		$error['permanent_pincode']="In permanent Address: <b>pincode</b> cannot be blank";
	}
	else if(!preg_match("/^([0-9]{6})*$/", $_POST['permanent_pincode']))
	{	
		$error['permanent_pincode']="Only digits(6) allowed in <b>pincode(permanent)</b>";
	}
//validating permanent contact number		
	if(!value_present($_POST['permanent_contact_no']))
	{
		$error['permanent_contact_no']="In permanent Address: <b>Contact Number</b> cannot be blank";
	}
	else if(!preg_match("/^([0-9]{10})*$/", $_POST['permanent_contact_no']))
	{	
		$error['permanent_contact_no']="Only digits(10) allowed in <b>contact number(permanent)</b>";
	}
//validating permanent fax no	
	if((value_present($_POST['permanent_fax_no'])) && (!preg_match("/^([0-9]{10})*$/", $_POST['permanent_fax_no'])))
	{	
		$error['permanent_fax_no']="Only digits(10) allowed in <b>Fax Number(permanent)</b>";
	}

//if no error found insert the data
	if(empty($error))
	{
		//generating a random number
		$activate=md5(uniqid(rand(),true));
		$query="INSERT INTO user(first_name,middle_name,last_name,email_id,user_name,password,gender,age,dob,";
		$query.="marital_status,employment,employer,residence_street,residence_city,residence_state,";
		$query.="residence_pincode,residence_contact_no,residence_fax_no,";
		$query.="permanent_street,permanent_city,permanent_state,";
		$query.="permanent_pincode,permanent_contact_no,permanent_fax_no,comment,image,activate_code";
		$query.=") ";
		$query.="VALUES('{$_POST["first_name"]}','{$_POST["middle_name"]}','{$_POST["last_name"]}',";
		$query.="'{$_POST["email_id"]}','{$_POST["user_name"]}','{$_POST["password"]}','{$_POST["gender"]}',";
		$query.="'{$_POST["age"]}','{$_POST["dob"]}','{$_POST["marital_status"	]}','{$_POST["employment"]}',";
		$query.="'{$_POST["employer"]}','{$_POST["residence_street"]}','{$_POST["residence_city"]}','{$_POST["residence_state"]}',";
		$query.="'{$_POST["residence_pincode"]}','{$_POST["residence_contact_no"]}','{$_POST["residence_fax_no"]}',";
		$query.="'{$_POST["permanent_street"]}','{$_POST["permanent_city"]}','{$_POST["permanent_state"]}',";
		$query.="'{$_POST["permanent_pincode"]}','{$_POST["permanent_contact_no"]}','{$_POST["permanent_fax_no"]}',";
		$query.="'{$_POST["comment"]}','{$img_var}','{$activate}'";
		$query.=")";
		//sending the query
		$result=mysqli_query($connection,$query);
				// checks for query error
		if(!$result)
		{
			die("Database query failed");
		}
		else
		{
							//success
			echo "success in inserting the value <hr/>";
		}
				//sending link for activating the account 
		$email=$_POST['email_id'];
		$message="http://localhost/project/new/activate.php?email_id=$email&activation_link=$activate";
		$res = mail ( $email, "activation link",$message);
				//close connection 
		mysqli_close($connection);
		redirect("activate.php");
	}
}
?>
