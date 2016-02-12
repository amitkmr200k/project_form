<?php
require_once('acl_class.php');
//require('connection_pdo.php');
//require('connection.php');

if(isset($_POST['role_id']))
{
    $acl = new data_manipulation();
    $role_id = $_POST['role_id'];
    $length = strlen($role_id);
    $x = strpos($role_id,'role');
    $role_id =(int) substr($role_id,$x+4,$length-$x-4);

    if(isset($_POST['id']))
    {
        $acl->delete_data('manage_privilege','role_id',$role_id);
        foreach($_POST['id'] as $key => $value)
        {
            $a['val'] = $value;
            $length = strlen($a['val']);

            $x = strpos($a['val'],'action');
            // substr(string,starting position,length of substing to be extracted)
            $resource_id =(int) substr($a['val'],8,$x-8);
            $action_id =(int) substr($a['val'],$x+6,$length-$x-6);
            $acl->assign_privilege($role_id, $resource_id, $action_id);
        }
    }
}
echo json_encode($a);
?>

