<?php
session_start();
require("go_to.php");
//is not logged in go to login page
if(!isset($_SESSION['id']))
{
	redirect("login.php");
}
?>