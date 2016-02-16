<?php
session_start();
require 'validation_function.php';
require 'connection.php';
$message   = array();
$user_name = trim($_POST['user_name']);
$password  = trim($_POST['password']);

//validating user name
if(!value_present($user_name))
{
    $message['user_name'] = "<b>Username</b> cannot be blank <br/>";
}
else if(!preg_match("/^[a-zA-Z0-9_@]*$/",$_POST['user_name']))
{	
    $message['user_name'] = "Only charatcers,numbers, @ and underscore(_) allowed in <b>user name</b>";
}

//validating password
if(!value_present($password))
{
    $message['password'] = "<b>Password</b> cannot be blank <br/>";
}

//if no message found
if(empty($message))
{	
    $message['activate'] = '';
    $query               = "SELECT * from user WHERE user_name = '$user_name'";
    $result = mysqli_query($connection,$query);

    if($row = mysqli_fetch_assoc($result))
    {	
        //encrypting password 
        $password = md5($password.md5($row['user_name']));

        if($password==$row["password"] && isset($row['activate']))
        {
            // decalring session id which is used to track user information
            $_SESSION['id'] = $row['id'];
            $_SESSION['role_id'] = $row['role_id'];
            $message['login'] = 'correct';
            
            if(0==$row['admin'])
            {
                $message['login_as_user'] = '1';
            }
            else
            {
                $_SESSION['admin'] = 'yes';
            }
        }
        else if($password!=$row["password"])
        {
            $message['password'] = "Wrong password";	
        }
        else if($password==$row["password"] && !isset($row['activate']))
        {
            $message['activate'] = " Account not activated";
        }
    }				
    else
    {
        $message['user_name'] = "user does not exist";
    }
}
echo json_encode($message);
