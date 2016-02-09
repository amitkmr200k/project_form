<?php
class data_manipulation
{
    public static function get_data($table_name,$type)
    {
        require('connection.php');
        $display = "";
        $query = "SELECT {$type} FROM {$table_name} ";
        $result = mysqli_query($connection,$query);
        if(!$result)
        {
            echo "error <br />";
        }
        while($row=mysqli_fetch_assoc($result))
        {
            $display.="<option value='{$row[$type]}'>{$row[$type]}</option>";
        }
        return $display;
    } 

    public static function add_data($table_name,$type,$role_type)
    {   
        if (trim($role_type) != "")
        {
            require('connection.php');
            $query = "INSERT INTO  {$table_name}({$type}) VALUES ('{$role_type}')";
            $result = mysqli_query($connection,$query);
            
            if (!$result)
            {
                echo "error inserting";
            }
        }
    } 

    public static function delete_data($table_name,$type,$role_type)
    {
        require('connection.php');
        $query = "DELETE FROM {$table_name} WHERE {$type} = '$role_type'";
        $result = mysqli_query($connection,$query);
       
        if (!$result)
        {
            echo "error deleting";
        }
    } 
}

$acl = new data_manipulation();
?>