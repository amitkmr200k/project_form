<?php
//require('isset_session.php');
//$_SESSION['admin'] = "yes";
//require('header.php');
require('acl_class.php');
require('add_delete_record.php');

function display_data($table_name,$type)
{   
    $acl = new data_manipulation();
    $get = $acl->get_data($table_name,$type);
    return $get;
}

function role()
{   
    $get_role = display_data('role','role');
    foreach ($get_role as $key => $value) 
    {
        $val = $value['role'];
        $id = 'role'.$value['id'];
        echo "<option id='$id' name='{$val}' value='{$val}'>{$val}</option>";
    }
}

function action()
{   
    $get_action = display_data('action','operation');
    return $get_action;
}   

function resource()
{
    $get_resource = display_data('resource','resource');
    foreach ($get_resource as $key => $value) 
    {   
        $val = $value['resource'];
        $id = 'resource'.$value['id'];
        echo "<tr><td><label id='{$id}' name='{$val}'>{$val}</label></td> ";
        //echo "<br/>";
        
        //
        $get_action = action();
        foreach ($get_action as $key_action => $value_action) 
        {   
            $val_action = $value_action['operation'];
            $id_action = $id.'action'.$value_action['id'];
            echo "<td><input id='{$id_action}' type='checkbox' name='{$val_action}' value='{$val_action}' >{$val_action} </td>";
        }
        echo "<br/> </tr>";
       
    }
}
?>
<form class='form_admin_privilege' action='admin_privilege.php'>
    <select id="role" name="role">
        <option selected="true" value="select" disabled>select</option>";
        <?php role();?>
    </select>
    <table>

      <?php  resource(); ?>

      <input id='privilege_data_hidden' type='hidden' value='<?php $acl->privilege_data(); ?>'>
  </form>
</table>
<?php require('footer.html'); ?>