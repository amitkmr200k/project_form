<?php
require('isset_session.php');
$_SESSION['admin'] = "yes";
require('header.php');
require('acl_class.php');
require('add_delete_record.php');

$get_data_role_table = $acl->get_data('role','role');
$get_data_action_table = $acl->get_data('action','operation');
$get_data_resource_table = $acl->get_data('resource','resource');
?>
<div class='container'>
<div class='admin_record_manipulation'>
    <h4>Roles </h4>
    <form class='form-inline' action='admin_record_manipulation.php' method='post'>
       <select name='role'>
            <?php echo $get_data_role_table ;?>       
        </select>
        <input type='text' name='role_type' value=''>
        <input type='submit' name='add_role' value='Add'>
        <input type='submit' name='delete_role' value='Delete'>
    </form>

    <h4>Action</h4>
    <form class='form-inline' action='admin_record_manipulation.php' method='post'>
        <select name='action'>
            <?php echo $get_data_action_table ;?>       
        </select>
        <input type='text' name='action_type' value=''>
        <input type='submit' name='add_action' value='Add'>
        <input type='submit' name='delete_action' value='Delete'>
    </form>

    <h4>Resource </h4>
    <form action='admin_record_manipulation.php' method='post'>
        <select name='resource'>
            <?php echo $get_data_resource_table ;?>       
        </select>
        <input type='text' name='resource_type' value=''>
        <input type='submit' name='add_resource' value='Add'>
        <input type='submit' name='delete_resource' value='Delete'>
    </form>
    </div>
</div>
<?php require('footer.html'); ?>
