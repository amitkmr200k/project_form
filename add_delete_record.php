<?php
error_reporting(-1);
ini_set('display_errors', 'On');

// for role
if (isset($_POST['add_role']))
{
    $text=$_POST['role_type'];
    $acl->add_data('role','role',$text);
}

if (isset($_POST['delete_role']))
{   
    $text = $_POST['role'];
    $acl->delete_data('role','role',$text);
}

// for action
if (isset($_POST['add_action']))
{
    $text=$_POST['action_type'];
    $acl->add_data('action','operation',$text);
}

if (isset($_POST['delete_action']))
{   
    $text = $_POST['action'];
    $acl->delete_data('action','operation',$text);
}

//for resource
if (isset($_POST['add_resource']))
{
    $text=$_POST['resource_type'];
    $acl->add_data('resource','resource',$text);
}

if (isset($_POST['delete_resource']))
{   
    $text = $_POST['resource'];
    $acl->delete_data('resource','resource',$text);
}
?>