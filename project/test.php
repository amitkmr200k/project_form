<?php
include("connection.php");
$query="SELECT COUNT(*) AS abc from user where email_id={$_POST['email_id']}";
$result=mysqli_query($connection,$query);
$row=mysqli_fetch_assoc($result);
echo $row['abc'];
?>