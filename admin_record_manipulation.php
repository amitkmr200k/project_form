<?php
require_once 'is_admin.php';
require 'header.php';
require 'acl_class.php';
require 'add_delete_record.php';

function display_data($table_name, $type)
{
    $acl = new data_manipulation();
    $get = $acl->get_data($table_name);

    foreach ($get as $key => $value)
    {
        $val = $value[$type];
        echo "<option value='{$val}'>{$val}</option>";
    }

}//end display_data()

?>
<div class='container'>
    <div class='admin_record_manipulation'>
        <h4>Roles </h4>
        <form class='form-inline' action='admin_record_manipulation.php' method='post'>
            <select name='role'>
                <?php display_data('role', 'role'); ?>
            </select>
            <input type='text' name='role_type' value=''>
            <input type='submit' name='add_role' value='Add'>
            <input type='submit' name='delete_role' value='Delete'>
        </form>

        <h4>Action</h4>
        <form class='form-inline' action='admin_record_manipulation.php' method='post'>
            <select name='action'>
                <?php display_data('action', 'operation'); ?>
            </select>
            <input type='text' name='action_type' value=''>
            <input type='submit' name='add_action' value='Add'>
            <input type='submit' name='delete_action' value='Delete'>
        </form>

        <h4>Resource </h4>
        <form action='admin_record_manipulation.php' method='post'>
            <select name='resource'>
                <?php display_data('resource', 'resource'); ?>
            </select>
            <input type='text' name='resource_type' value=''>
            <input type='submit' name='add_resource' value='Add'>
            <input type='submit' name='delete_resource' value='Delete'>
        </form>
    </div>
</div>
<?php require 'footer.html'; ?>