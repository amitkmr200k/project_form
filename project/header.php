<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="css/info.css">
	<link rel="stylesheet" href="css/class.css">	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/image_preview.js"></script>
    <script type="text/javascript" src="js/edit_profile_validation.js?version=126"></script>
    <script type="text/javascript" src="js/registration_validation_jquery.js"></script>
    <script type="text/javascript" src="js/login_validation_jquery.js?version=123"></script>  
    <script type="text/javascript" src="js/same_permanent.js?version=123"></script>  
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>User Record</title>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="css/business-casual.css" rel="stylesheet">
	<!-- Fonts -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
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
    						<?php if(isset($_SESSION[id]))
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
    							</li>";
    						}
    						
    						?>
    					</ul>
    				</div>
    			</center>
    			<!-- /.navbar-collapse -->
    		</div>