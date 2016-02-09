<?php
require('../connection.php');
$query = 'SELECT * FROM prvilege_acl';
$result = mysqli_query($connection,$query);
?>

<button class='button' id='add' value='add'>Add</button><br />
<button class='button' id='add' value='view'>View</button><br />
<button class='button' id='add' value='delete'>Delete</button><br />
<button class='button' id='add' value='edit'>Edit</button><br />