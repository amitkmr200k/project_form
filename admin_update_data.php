<?php
require('connection.php');
$id=$_POST['id'];
$update_type=$_POST['oper'];

if('del'==$update_type)
{	
	$query="DELETE FROM user WHERE id='$id'";
	$result=mysqli_query($connection,$query);
}

else if('edit'==$update_type)
{
    //$query="UPDATE SET ";
	$query="UPDATE user SET ";
	$query.="first_name='{$_POST["first_name"]}', ";
	$query.="middle_name='{$_POST["middle_name"]}', ";
	$query.="last_name='{$_POST["last_name"]}', ";
	$query.="email_id='{$_POST["email_id"]}', ";	
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
	$query.=" WHERE id='$id' ";
	$result=mysqli_query($connection,$query);
}	
?>