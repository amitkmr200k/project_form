<?php
//require('isset_session.php');
//$_SESSION['admin'] = "yes";
//require('header.php');
require('acl_class.php');
require('add_delete_record.php');
$get_data_role_table = $acl->get_data('role','role');
?>
<form class='form_admin_privilege' action='admin_privilege.php'>
    <select name="role">
        <?php echo $get_data_role_table ;?>       
    </select>
    <table>
        <tr>
            <td><label>Page 1</label></td>
            <td><input type='checkbox' name='view' value='view'>View</td>
            <td><input type='checkbox' name='add' value='add' >Add </td>
            <td><input type='checkbox' name='delete' value='delete' >Delete</td>
            <td><input type='checkbox' name='edit' value='edit'>Edit</td>
            <td><input id='all' type='checkbox' name='all' value='all'>All</td>
            <td><input id='page1_privilege' type='button' value='Set'>
            </tr>
            <tr>
                <td><label>Page 2</label></td>
                <td><input type='checkbox' name='view' value='view'>View</td>
                <td><input type='checkbox' name='add' value='add' >Add </td>
                <td><input type='checkbox' name='delete' value='delete' >Delete</td>
                <td><input type='checkbox' name='edit' value='edit'>Edit</td>
                <td><input id='all' type='checkbox' name='all' value='all'>All</td>
                <td><input type='button' value='Set'>
                </form>
            </table>