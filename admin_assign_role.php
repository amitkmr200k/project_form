<?php
require_once 'is_admin.php';
require_once 'header.php';
require_once 'acl_class.php';


function display_data($table_name, $table_id, $text_to_display)
{
    $acl      = new data_manipulation();
    $get_role = $acl->get_data($table_name);
    $display  = '';

    foreach ($get_role as $value)
    {
        $val      = $value[$text_to_display];
        $ids      = $text_to_display.'_'.$value[$table_id];
        $display .= '<option class="privilege_display" id="' . $ids . '"
        name="' . $val . '" value="' . $val . '">' . $val . '</option>';
    }

    return $display;

}//end display_data()


function user_info()
{
    $acl           = new data_manipulation();
    $get_user_info = json_encode($acl->get_data('user'));
    return $get_user_info;

}//end user_info()


?>
<form class=''>
    <div class='conatiner'>
        <div class='row'>
            <div class='col-sm-4'></div>
            <div class='col-sm-4'><label id='display_message'></label></div>
            <div class='row'>
            </div>
            <div class='col-sm-4'></div>
            <div class='col-sm-2'>
                <select id='user' name='user'>
                    <option selected='true' value='Select User' disabled>
                    Select User</option>;
                    <?php echo display_data('user', 'id', 'user_name'); ?>
                </select>
            </div>
            <div class='col-sm-4'>
    
                    <select id='role' name='role'>
                        <option selected='true' value='select Role' disabled>
                        Select Role</option>;
                        <?php echo display_data('role', 'id', 'role'); ?>
                    </select>
               
            </div>
        </div>
        <div class='row'>
            <div class='col-sm-4'></div>
            <div class='col-sm-4 admin_assign_role_user_info'><label id='user_info'>
            </label></div>
        </div>
        <div class='row'>
            <div class='col-sm-5'></div>
            <input id='assign_role' type='button' value='Assign'>
        </div>
        
    </div>
</form>
<div id ='reload_hidden_user_info'>
            <input type='hidden' id='hidden_user_info'
            value='<?php echo user_info(); ?>'>
        </div>
 
<?php require 'footer.html'; ?>
<script type="text/javascript" src="js/admin_assign_role.js?version=132"></script>