<?php
require_once 'connection_pdo.php';

function get_id($string,$slice_it)
{
    $length          = strlen($string);
    $length_of_slice = strlen($slice_it);
    $id_pos          = strpos($string,$slice_it);
    $new_string         = (int) substr($string, $id_pos+$length_of_slice, $length-$id_pos-$length_of_slice);

    return $new_string;
}

if(isset($_POST['user']) && isset($_POST['role']))
{
    $user_id    = get_id($_POST['user'],'user_name_');
    $role_id = get_id($_POST['role'],'role_');
    $query   = "UPDATE user
                SET role_id = '{$role_id}'
                WHERE id = '{$user_id}'";
    $result  = $conn->prepare($query);
    $result -> execute();
     $message['not_selected'] = 'false';
}
else
{
    $message['not_selected'] = 'true';
}
echo json_encode($message);

?>