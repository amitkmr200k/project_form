<?php
class data_manipulation
{


    public static function get_data($table_name)
    {
        require 'connection_pdo.php';
        $display = array();

        try
        {
            $query  = "SELECT * FROM $table_name";
            $result = $conn->prepare($query);
            $result->execute();
            if (!$result)
            {
                echo 'error <br />';
            }

            foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row)
            {
                $display[] = $row;
            }

            return $display;
        }
        catch (Exception $e)
        {
            echo 'Connection failed: '.$e->getMessage();
        }

    }//end get_data()


    public static function add_data($table_name, $type, $role_type)
    {
        if (trim($role_type) != '')
        {
            require 'connection_pdo.php';
            $query  = "INSERT INTO  {$table_name}({$type}) VALUES ('{$role_type}')";
            $result = $conn->prepare($query);
            $result->execute();
        }

    }//end add_data()


    public static function delete_data($table_name, $type, $role_type)
    {
        require 'connection_pdo.php';
        $query  = "DELETE FROM {$table_name} WHERE {$type} = '$role_type'";
        $result = $conn->prepare($query);
        $result->execute();

    }//end delete_data()


    public static function privilege_data()
    {
        require 'connection_pdo.php';
        $display = array();
        $query   = "SELECT * FROM manage_privilege";
        $result  = $conn->prepare($query);
        $result->execute();

        foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row)
        {
            $display[] = $row;
        }

        return json_encode($display);

    }//end privilege_data()


    public static function assign_privilege($role, $resource, $action)
    {
        require 'connection_pdo.php';
        $query  = "INSERT INTO  manage_privilege(role_id,resource_id,action_id)
        VALUES ('$role','$resource','$action')";
        $result = $conn->prepare($query);

        if (!$result)
        {
            echo 'error <br />';
        }

        $result->execute();

    }//end assign_privilege()


}//end class

?>