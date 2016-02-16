<?php
class authenticate
{
    public static function get_name($string)
    {
        $length           = strlen($string);
        $action_length    = strrpos($string,'_');
        $name['action']   = substr($string, $action_length+1, $length-$action_length);
        $name['resource'] = substr($string, 0, $action_length);
        return $name;
    }//end get_action_name()

    public static function get_id($table_name, $type_database, $type_name)
    {
        require 'connection_pdo.php';
        
        try
        {
            // Getting resource id of the current page.
            $query  = " SELECT id 
                        FROM {$table_name} 
                        WHERE {$type_database} = '{$type_name}'";
            $result = $conn->prepare($query);
            $result->execute();

            if (!$result)
            {
                echo 'error <br />';
            }

            foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row)
            {
                $type_id = $row['id']; 
            }

            return $type_id;
        
        }
        catch (Exception $e)
        {
            $e->getMessage();
        }
    
    }

    public static function get_action_id($resource_id, $role_id)
    { 
        require 'connection_pdo.php';
        
        try
        {
            // Getting action ids of all the actions.
            $query  = " SELECT action_id FROM manage_privilege
                        WHERE resource_id = '{$resource_id}'
                        AND role_id = '{$role_id}'";

            $result = $conn->prepare($query);
            $result->execute();
            if (!$result)
            {
                echo 'error <br />';
            }

            foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row)
            {
                $action_id[] = $row['action_id']; 
            }

           return($action_id);
        }
        catch (Exception $e)
        {
            echo 'Connection failed: '.$e->getMessage();
        }

    }//end get_resource_id()

}//end class

 ?>