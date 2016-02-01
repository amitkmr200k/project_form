<?php
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
		if($image_type!="jpg" && $image_type!="jpeg"&& $image_type!="png"&& $image_type!="gif")
		{
			$error['image']="Invalid <b>image</b> type";
		}
		else
		{
			move_uploaded_file($_FILES['image']['tmp_name'], "/var/www/html/project/new/img/$img_var");	
		}
	} 	
	else
	{
		$query="SELECT image from user where id='{$_SESSION[id]}'";
		$result=mysqli_query($connection,$query);
		$row=mysqli_fetch_assoc($result);
		$img_var=$row['image'];
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
//validating email id
	if(!value_present($_POST['email_id']))
	{
		$error['email_id']="<b>email id</b> cannot be blank";
	}
	else if (!filter_var($_POST['email_id'], FILTER_VALIDATE_EMAIL)) 
	{
		$error['email_id'] = "Please enter a valid <b>email</b>"; 
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
			$error['']="First choose <b>Employed</b> as <b>YES</b>, then enter your <b>Employer</b> ";
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
//if no error found go to insert_data file and insert the data
	if(empty($error))
	{
		$query="UPDATE user SET ";
		$query.="first_name='{$_POST["first_name"]}', ";
		$query.="middle_name='{$_POST["middle_name"]}', ";
		$query.="last_name='{$_POST["last_name"]}', ";
		$query.="email_id='{$_POST["email_id"]}', ";
		$query.="user_name='{$_POST["user_name"]}', ";	
		$query.="gender='{$_POST["gender"]}', ";
		$query.="age='{$_POST["age"]}', ";
		$query.="dob='{$_POST["dob"]}', ";
		$query.="marital_status='{$_POST["marital_status"]}', ";
		$query.="employment='{$_POST["employment"]}', ";
		$query.="employer='{$_POST["employer"]}', ";
		$query.="residence_street='{$_POST["residence_street"]}', ";
		$query.="residence_city='{$_POST["residence_city"]}', ";
		$query.="residence_state='{$_POST["residence_state"]}', ";
		$query.="residence_pincode='{$_POST["residence_pincode"]}', ";
		$query.="residence_contact_no='{$_POST["residence_contact_no"]}', ";
		$query.="residence_fax_no='{$_POST["residence_fax_no"]}', ";
		$query.="permanent_street='{$_POST["permanent_street"]}', ";
		$query.="permanent_city='{$_POST["permanent_city"]}', ";
		$query.="permanent_state='{$_POST["permanent_state"]}', ";
		$query.="permanent_pincode='{$_POST["permanent_pincode"]}', ";
		$query.="permanent_contact_no='{$_POST["permanent_contact_no"]}', ";
		$query.="permanent_fax_no='{$_POST["permanent_fax_no"]}', ";
		$query.="comment='{$_POST["comment"]}', ";
		$query.="image='{$img_var}'";
		$query.=" WHERE id='{$_SESSION[id]}' ";
//sending the query
		$result=mysqli_query($connection,$query);
// checks for query error
		if(!$result)
		{
			die("Database query failed");
		}
		else
		{
			$_SESSION["value"]=1;
		}
//close connection 
		mysqli_free_result($result);
	}
}
?>