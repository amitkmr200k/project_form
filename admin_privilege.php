<?php
//require('isset_session.php');
//$_SESSION['admin'] = "yes";
require_once('header.php');
require_once('acl_class.php');
require_once('add_delete_record.php');

function display_data($table_name, $type)
{   
    $acl = new data_manipulation();
    $get = $acl->get_data($table_name, $type);
    return $get;
}

function display_role()
{   
    $get_role = display_data('role','role');
    $display = "";

    foreach ($get_role as $key => $value) 
    {
        $val = $value['role'];
        $id = 'role'.$value['id'];
        $display .= "<option class='privilege_display' id='$id' 
        name='{$val}' value='{$val}'>{$val}</option>";
    }
    return $display;
}

function get_action()
{   
    $get_action = display_data('action','operation');
    return $get_action;
}   

function display_resource_action()
{
    $get_resource = display_data('resource','resource');
    $display = "";
    foreach ($get_resource as $key => $value) 
    {   
        $val = $value['resource'];
        $id = 'resource'.$value['id'];
        $display .= "<tr><td class='privilege_display'><label id='{$id}' 
        name='{$val}'>{$val}</label>&nbsp &nbsp</td> ";
        //getting action table data 
        $get_action = get_action();

        foreach ($get_action as $key_action => $value_action) 
        {   
            $val_action = $value_action['operation'];
            $id_action = $id.'action'.$value_action['id'];
            $display .= "<td class='privilege_display'><input id='{$id_action}' 
            type='checkbox' name='{$val_action}' value='{$val_action}' onchange="is_checked(this.checked,'. $id_action . ')">
            &nbsp{$val_action} &nbsp &nbsp </td> ";
        }
        $display .= "<br/> </tr>";
    }
    return $display;
}
?>
    <form class='form_admin_privilege' action='admin_privilege.php'>
        <select id="role" name="role">
            <option selected="true" value="select" disabled>select</option>";
            <?php echo display_role();?>
        </select>
        <table class="table-responsive">
            <?php  echo display_resource_action(); ?>
            <input id='privilege_data_hidden' type='hidden' value='<?php $acl->privilege_data(); ?>'>
        </table>
        <br/><input id='set_privilege' class="btn btn-primary" type='button' value='Update'>
    </form>

<?php require('footer.html'); ?>