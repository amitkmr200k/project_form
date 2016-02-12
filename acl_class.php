<?php
class data_manipulation
{
 public static function get_data($table_name)
 {
    require('connection_pdo.php');
    $display = array();
    
    try
    {
        $query = "SELECT * FROM $table_name ";
        $result = $conn->prepare($query);
        $result->execute();
        if(!$result)
        {
            echo "error <br />";
        }

        foreach ($result->fetchAll() as $row) 
        {
            $display[] = $row;
        }

        return $display;
    }
    catch(Exception $e)
    {
       echo 'Connection failed: ' . $e->getMessage();
   }
}  

public static function add_data($table_name,$type,$role_type)
{   
    if (trim($role_type) != "")
    {
        require('connection_pdo.php');
        $query = "INSERT INTO  {$table_name}({$type}) VALUES ('{$role_type}')";
        $result = $conn->prepare($query);
        $result -> execute();
    }
} 

public static function delete_data($table_name,$type,$role_type)
{
    require('connection_pdo.php');
    $query = "DELETE FROM {$table_name} WHERE {$type} = '$role_type'";
    $result = $conn->prepare($query);
    $result -> execute();
}

public static function privilege_data()
{
    require('connection_pdo.php');
    $display = array();
    $query = "SELECT * FROM manage_privilege";
    $result = $conn->prepare($query);
    $result -> execute();

    foreach ($result->fetchAll() as $row) 
    {
        $display[] = $row;
    }
    echo  json_encode($display);
}  

public static function assign_privilege($role,$resource,$action)
{   
        require('connection_pdo.php');
        $query = "INSERT INTO  manage_privilege(role_id,resource_id,action_id) 
        VALUES ('$role','$resource','$action')";
        $result = $conn->prepare($query);
        if(!$result)
        {
            echo "error <br />";
        }
        $result -> execute();
    
}  
}
?>