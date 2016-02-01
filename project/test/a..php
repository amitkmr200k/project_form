<?php 
require("../header.php");
?>
	<form id="registration_form" action="registration.php" enctype="multipart/form-data" method="POST" >
	<input id="image_input" type="file" value="image" name="image"  accept="image/x-png, image/gif, image/jpeg">
	<img id="blah" src="" alt="image preview" height="100" width="100" />
</form>	
<?php require("../footer.html");?>