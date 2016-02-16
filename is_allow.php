<?php
session_start();
require_once 'acl_class_authentication.php';
$acl = new authenticate();

$current_url   = pathinfo($_SERVER['REQUEST_URI']);
$file_name = $current_url['filename'];
$type = $acl->get_name($file_name);

$current_action_id = $acl->get_id('action','operation',$type['action']);
$current_resource_id = $acl->get_id('resource','resource',$type['resource']);

$action_allowed = $acl->get_action_id($current_resource_id,$_SESSION['role_id']);

$flag =0;

foreach ($action_allowed AS $value) 
{
    if ($value['action_id'] == $current_action_id)
    {
        $flag = 1;
        break;
    }
    else
    {
        $flag = 0;
    }
}

?>