<?php
require_once 'isset_session.php';
require_once 'header.php';
require_once 'is_allow.php';

if($display['message'] != '')
{
    echo $display['message'];
}
else
{

?>

<div class="well assignment">
    <h1>This is Assignment <font color='red'>ADD</font> Page</h1>
</div>
<div class="well assignment">
    <h2> Under Construction</h2>
</div>
<div class='well assignment'>
    <?php echo $display_action; ?>
</div>

<?php
}
require_once 'footer.html'; ?>
