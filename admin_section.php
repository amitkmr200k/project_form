<?php 
require('isset_session.php');
$_SESSION['admin']="yes";
require('header.php');
?>  	
<div class="admin">
    <div class="admin_welcome"><h2> Welcome Admin </h2>
    </div>
    <br/>
    <table id='grid'></table>
    <div id='perpage'></div><br />
</div>
<?php require('footer.html');?>