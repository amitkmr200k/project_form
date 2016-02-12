<?php 
function login()
{
    if(isset($_SESSION[id]))
    {   
        if($_SESSION['admin']=='yes')
        {
            echo "
            <li>
                <a href='admin_assign_role.php'><h2>Assign</h2></a>
            </li>
            <li>
                <a href='admin_privilege.php'><h2>Privileges</h2></a>
            </li>
            <li>
                <a href='admin_record_manipulation.php'><h2>Edit</h2></a>
            </li>
            <li>
                <a href='admin_section.php'><h2>User Data</h2></a>
            </li>
            <li>
                <a href='logout.php'><h2>Log Out </h2></a>
            </li>
            
            ";
        } 
        else   
        {
            echo "
            <li>
                <a href='home.php'><h1>Home</h1></a>
            </li>
            <li>
                <a href='edit_profile.php'><h1>Edit Profile</h1></a>
            </li>
            <li>
                <a href='logout.php'><h1>Log Out </h1>  </a>
            </li> 
            ";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/info.css">
    <link rel="stylesheet" type='text/css' href="css/class.css">    
    <!-- jqgrid theme start-->
    <link rel='stylesheet' type='text/css' media='screen' href='css/jqgrid_theme/theme.css' />
    <link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
    <!-- jqgrid theme end -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>User Data Management</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="brand">Mindfire Solutions</div>
    <div class="address-bar">BHUBANESWAR | ODISHA | 751010</div>
    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">Business Casual</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <center>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <?php login();?>
                    </ul>
                </div>
            </center>
            <!-- /.navbar-collapse -->
        </div>