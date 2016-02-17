<?php
session_start();
require_once 'acl_class_authentication.php';
$acl = new authenticate();

$current_url   = pathinfo($_SERVER['REQUEST_URI']);
$file_name     = $current_url['filename'];
$type = $acl->get_name_from_url($file_name);
$current_action_id = $acl->get_id('action','operation',$type['action']);
$current_resource_id = $acl->get_id('resource','resource',$type['resource']);
$allow =0;

foreach ($_SESSION['data'] AS $value) 
{

    if ($value['resource_id'] == $current_resource_id && 
        $value['action_id'] == $current_action_id)
    {

        $allow = 1;
        break;
    }
    else
    {
        $allow = 0;
    }
}

if ($allow == 1)
{	
    // Displaying allowed actions on th view page.
        foreach ($_SESSION['data'] AS $value) 
        {
            if ($value['resource_id'] == $current_resource_id )
            {
                $action_id_allowed[] = $value['action_id'];
            }
        }

        sort($action_id_allowed);
        $display_action = '';

        foreach ($action_id_allowed AS $value) 
        {
            $action_name_allowed = $acl->get_name('action','operation',$value); 
            $page_name = $type['resource'].'_'.$action_name_allowed.'.php';
            $display_action .= "<a id='' href='{$page_name}'>{$action_name_allowed} </a>&nbsp&nbsp&nbsp";
        }

    $display['message'] ='';
}
else
{
    header("Location: error.html");
}


?>