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

<div class='well assignment'>
    <h1>This is Assignment Page</h1>
</div>
<div class='well assignment'>
    <a id='' href='assignment_edit.php?version=asdas'> Edit Assignment</a>
</div>
<?php require_once 'footer.html'; ?>
