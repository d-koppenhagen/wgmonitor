<?php
require_once("Config.class.php");
Config::init();
?>
<!DOCTYPE HTML>
<html>
<head>
  <?php require "head.php";?>

<link type="text/css" rel="stylesheet" href="custom_calendar.css">

</head>
<body>
<div class="row">
  <div class="col-md-8">
  	<?php require "menu.php";?>
<span class="help-block">    
<iframe src="gcalendar-wrapper.php?showTitle=0&showPrint=0&showCalendars=0&height=800&wkst=2&src=danny.koppenhagen%40t-online.de&color=%232952A3&src=de.german%23holiday%40group.v.calendar.google.com&color=%23AB8B00&amp;src=e_2_de%23weeknum%40group.v.calendar.google.com&color=%23865A5A&ctz=Europe%2FBerlin" style=" border-width:0 " width="100%" height="840" frameborder="0" scrolling="no"></iframe>

  </div>


<?php require "sidebar.php";?>

</div>

</body>
</html>

