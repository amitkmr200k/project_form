<?php
class data_manipulation
{
   public static function get_data($table_name,$type)
   {
    require('connection.php');
    $display = array();
    
    try
    {
        $query = "SELECT id,$type FROM $table_name ";
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
        require('connection.php');
        $query = "INSERT INTO  {$table_name}({$type}) VALUES ('{$role_type}')";
        $result = $conn->prepare($query);
        $result -> execute();
    }
} 

public static function delete_data($table_name,$type,$role_type)
{
    require('connection.php');
    $query = "DELETE FROM {$table_name} WHERE {$type} = '$role_type'";
    $result = $conn->prepare($query);
    $result -> execute();
}

public static function privilege_data()
{
    require('connection.php');
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
}
?>