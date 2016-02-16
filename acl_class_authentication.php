<?php
class authenticate
{
    public static function get_name_from_url($string)
    {
        $length           = strlen($string);
        $seperator_length = strrpos($string,'_');
        $name['action']   = substr($string, $seperator_length+1, $length-$seperator_length);
        $name['resource'] = substr($string, 0, $seperator_length);
        
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
    
    }//end get_id()

    public static function get_name($table_name,$type,$id)
    {
        require 'connection_pdo.php';
        
        try
        {
            // Getting resource id of the current page.
            $query  = " SELECT * 
                        FROM {$table_name} 
                        WHERE id = '{$id}'";
            $result = $conn->prepare($query);
            $result->execute();

            if (!$result)
            {
                echo 'error <br />';
            }

            foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row)
            {
                $type_name = $row[$type]; 
            }

            return $type_name;
        
        }
        catch (Exception $e)
        {
            $e->getMessage();
        }
    
    }//end get_id()

    public static function privilege_assigned($role_id)
    {
        require 'connection_pdo.php';
        
        try
        {
            $query  = " SELECT  action_id,resource_id 
                        FROM manage_privilege
                        WHERE role_id = '$role_id'";
            $result = $conn->prepare($query);
            $result->execute();
           
            if (!$result)
            {
                echo 'error <br />';
            }

            foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row)
            {
               $ids[] = $row;
            }
            // Storing action ids and resource ids of the current role.
            return $ids;
        }
        catch (Exception $e)
        {
            echo 'Connection failed: '.$e->getMessage();
        }

    }

}//end class

 ?>