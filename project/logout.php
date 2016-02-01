<?php
session_start();
require("go_to.php");
session_destroy();
redirect("login.php");
?>