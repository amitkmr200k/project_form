<?php
require('isset_session.php');
$_SESSION['admin'] = "yes";
require_once('header.php');
require_once('acl_class.php');

$acl = new data_manipualtion();
$acl->get_data('user');
?>
<!-- UNDER CONSTRUCTION -->
<!-- 
<form class='form_admin_assign_role' action='admin_assign_role.php'>
    <label class='assign_role'>Role&nbsp&nbsp</label>
    <select id='role' name='role'>
        <option selected='true' value='select' disabled>select</option>;
        <?php echo display_role();?>
    </select>
    <table class="table-responsive">
        <?php  echo display_resource_action(); ?>
        <div id='reload'><input id='privilege_data_hidden' type='hidden' value='<?php $acl->privilege_data(); ?>'>
    </div>
    </table>
    <br/><input id='set_privilege' class="btn btn-primary" type='button' value='Update'>
</form> -->

<?php require('footer.html'); ?>