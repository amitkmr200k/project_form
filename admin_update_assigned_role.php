<?php
require_once 'connection_pdo.php';

if(isset($_POST['user']) && isset($_POST['role']))
{
    $user    = $_POST['user'];
    $role_id = $_POST['role'];
    $length  = strlen($role_id);
    $id_pos  = strpos($role_id,'role_');
    $role_id = (int) substr($role_id,$id_pos+5,$length-$id_pos-5);


    $query   = "UPDATE user
                SET role_id = '{$role_id}'
                WHERE user_name = '{$user}'";
    $result  = $conn->prepare($query);
    $result -> execute();
}

?>