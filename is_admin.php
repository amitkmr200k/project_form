<?php
require 'isset_session.php';

if ($_SESSION['admin'] != 'yes')
{
    header("Location: home.php");
}    

?>