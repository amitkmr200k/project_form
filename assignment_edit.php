<?php
session_start();
require_once 'header.php';
require_once 'is_allow.php';

if ($flag == 1)
{
    echo 'view';
}
else
{
    echo 'can\'t view';
}

?>

<div class="well assignment">
<h1>This is Assignment <font color='red'>Edit</font> Page</h1></center>
</div>
<?php require_once 'footer.html'; ?>
