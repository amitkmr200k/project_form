<?php
require('connection.php');
$id_as_string = $_POST['id'];
$update_type = $_POST['oper'];

if('del' == $update_type)
{	
    $id_as_string = explode(',', $id_as_string);
    $i = 0;

    foreach($id_as_string as $key => $value)
    {
        $id[$i] = $value;
        $i++;
    }

    if (1 == $i)
    {
        $query="DELETE FROM user WHERE id = '$id[0]'";
        $result=mysqli_query($connection,$query);
    }
    else
    {
        $count = 0;

        while($count < $i)
        {
            $query="DELETE FROM user WHERE id='$id[$count]'";
            $result=mysqli_query($connection,$query);
            $count++;
        }
    }
}
else if('edit' == $update_type)
{
    $query="UPDATE user SET first_name='{$_POST["first_name"]}', ";
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
    $query.="residence_fax_no='{$_POST["residence_fax_no"]}' ";
    $query.=" WHERE id='$id_as_string' ";
    $result=mysqli_query($connection,$query);
}	
?>