<?php
require('isset_session.php');
$_SESSION['admin'] = "yes";
require_once('header.php');
require_once('acl_class.php');


function display_data($table_name,$id,$text_to_display)
{
    $acl      = new data_manipulation();
    $get_role = $acl->get_data($table_name);
    $display  = '';

    foreach ($get_role as $value)
    {
        $val      = $value[$text_to_display];
        $ids       = $text_to_display.'_'.$value[$id];
        $display .= "<option class='privilege_display' id='$ids' 
        name='{$val}' value='{$val}'>{$val}</option>";
    }

    return $display;

}//end display_data()


?>
<!-- UNDER CONSTRUCTION -->

<form class=''>
    <div class='conatiner'>
        <div class='row'>
        <div class='col-sm-4'></div>
            <div class='col-sm-2'>
                <select id='user' name='user'>
                    <option selected='true' value='Select User' disabled>Select User</option>;
                    <?php echo display_data('user','id','user_name'); ?>
                </select>
            </div>
            <div class='col-sm-4'>
                <select id='role' name='role'>
                    <option selected='true' value='select Role' disabled>Select Role</option>;
                    <?php echo display_data('role','id','role'); ?>
                </select>
            </div>
           
        </div>
        <div class='row'>
         <div class='col-sm-4'></div>
         <div class='col-sm-4 admin_assign_role_user_info'><label id='user_info'></label></div>
         </div>
        <div class='row'>
        <div class='col-sm-5'></div>
            <input id='assign_role' type='button' value='Assign'>
        </div>
        <div class ='reload_user_info'> 
        <input type='hidden' id='hidden_user_info' value='<?php $acl = new data_manipulation();
        $get = json_encode($acl->get_data('user')); echo $get;?>'> 
   </div>
    </div>
</form>

<?php require('footer.html'); ?>