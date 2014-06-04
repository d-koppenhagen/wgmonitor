<?php
require_once("Config.class.php");
Config::init();
?>


<!DOCTYPE HTML>
<html>
<head>
  <?php require "head.php";  ?>
  <link rel="stylesheet" href="media/lvb.css" type="text/css">
</head>
<body>
<div class="row">
  <div class="col-md-8">
  	<?php require "menu.php";?> 
  	<!-- Table for Infoscreen --> 
  	<table width="100%">
    	<!--<tr id="content">-->
    </tr></table>
  </div>
  
   	<?php require "sidebar.php";?>
 </div>
</body>
</html>
