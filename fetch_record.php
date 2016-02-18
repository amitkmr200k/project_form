<?php
require 'connection.php';

// fetching record 
$query="SELECT * from user WHERE id ='{$_SESSION[id]}' ";
$result=mysqli_query($connection,$query);
$row=mysqli_fetch_assoc($result);	
?>


