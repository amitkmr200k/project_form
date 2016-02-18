<?php
require_once 'is_admin.php';
require_once 'header.php';
require_once 'acl_class.php';
require_once 'add_delete_record.php';


function display_data($table_name)
{
    $acl = new data_manipulation();
    $get = $acl->get_data($table_name);
    return $get;

}//end display_data()


function display_role()
{
    $get_role = display_data('role');
    $display  = '';

    foreach ($get_role as $value)
    {
        $val      = $value['role'];
        $id       = 'role'.$value['id'];
        $display .= '<option class="privilege_display" id="'.$id.'" 
        name="'.$val.'" value="'.$val.'">'.$val.'</option>';
    }

    return $display;

}//end display_role()


function get_action()
{
    $get_action = display_data('action');
    return $get_action;

}//end get_action()


function display_resource_action()
{
    $get_resource   = display_data('resource');
    $display        = '';
    $count_resource = 0;
    $count_action   = 0;
    foreach ($get_resource as $value)
    {
        $count_resource++;
        $val      = $value['resource'];
        $id       = 'resource'.$value['id'];
        $display .= '<tr><td class="privilege_display"><label id="'.$id.'"
        name="'.$val.'">'.$val.'</label>&nbsp&nbsp</td>';
        // Getting action table data.
        $get_action = get_action();
        
        foreach ($get_action as $value_action)
        {
            $count_action++;
            $val_action = $value_action['operation'];
            $id_action  = $id.'action'.$value_action['id'];
            $display   .= '<td class="privilege_display">
            <input id="'.$id_action.'" type="checkbox" name="'.$val_action.'" value="'.$val_action.'">
            &nbsp'.$val_action.' &nbsp&nbsp </td> ';
        }

        $display .= '<br/> </tr>';
    }//end foreach
        $count_action /= 2;
        $display      .= "<input id='count_action' type='hidden' name='count_action' value='{$count_action}'>";
        $display      .= "<input id='count_resource' type='hidden' name='count_resource' value='{$count_resource}'>";

    return $display;

}//end display_resource_action()


?>
<form class='form_admin_privilege' action='admin_privilege.php'>
    <label class='privilege_display'>Role&nbsp&nbsp</label>
    <select id='role' name='role'>
        <option selected='true' value='select' disabled>select</option>;
        <?php echo display_role(); ?>
    </select>
    <table class="table-responsive">
        <?php echo display_resource_action(); ?>
        <div id='reload'>
        <input id='privilege_data_hidden' type='hidden' value='<?php echo $acl->privilege_data(); ?>'>
    </div>
    </table>
    <br/><input id='set_privilege' class="btn btn-primary" type='button' value='Update'>
</form>

<?php require 'footer.html'; ?>
<script src="js/admin_privilege.js?version=132"></script>