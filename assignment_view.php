<?php
require_once 'isset_session.php';
require_once 'header.php';
require_once 'is_allow.php';

?>

<div class='row'>
    <div class='well assignment'>
        <div class='table-responsive'>
            <table class='table table-bordered'>
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
    </div>
    <div class='well assignment_action'>
        <?php echo $display_action; ?>
    </div>
</div>

<?php require_once 'footer.html'; ?>
