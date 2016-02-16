<?php
require_once 'isset_session.php';
require_once 'header.php';
require_once 'is_allow.php';
?>

<div class="well assignment">
    <h1>This is Assignment <font color='red'>Edit</font> Page</h1>
</div>
<div class="well assignment">

    <div class="table-responsive">
        <!-- Details of the user -->			
        <table class="table table-bordered">
            <tbody>

                <tr>
                    <td class='info'><b>Assignments</b></td>
                    <td class='info'><b>Given By </b></td>
                </tr>
                <tr>
                    <td>Assignment 1</td>
                    <td>Prof. X</td>
                </tr>
                <tr>
                    <td>Assignment 2</td>
                    <td>Prof. A </td>
                </tr>
            </tbody>
        </table>
    </div>
<div class='well assignment'>
    <?php echo $display_action; ?>
</div>

<?php require_once 'footer.html'; ?>
