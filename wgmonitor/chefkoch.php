<?php
require_once("Config.class.php");
Config::init();
?>
<!DOCTYPE HTML>
<html>
  <?php require "head.php";?>

<body>
<div class="row">
  <div class="col-md-8">
  	<?php require "menu.php";?>
  
  							
<!-- Chefkoch.de Rezept des Tages - START -->
	<!-- Hier können Sie die Styles (CSS) anpassen -->
	<style>
	#ck-rezeptname {
	font-size:1.6em;
	color:#FFFFFF;
	margin:10px;
	font-weight:bold;
	}
	
	#ck-zutaten, #ck-zubereitung, #ck-footer {
	font-size:1.1em;
	margin-left: 20px;
	color:#FFFFFF;
	}
	
	</style>


	<!-- Dieser Code darf NICHT verändert werden -->
	<script language="JavaScript" src="http://www.chefkoch.de/napping/js/script.js"></script>
	<style>#ck-footer {margin:10px 0px 10px 0px;padding:5px;display:yes;text-align:right;}</style><div id="ck-footer"><a href="http://www.chefkoch.de" target="_blank" style="text-decoration:underline;" title="Über 240.000 Kochrezepte und mehr ...">Weitere Rezepte gibt es auf www.chefkoch.de</a></div>

<!-- Chefkoch.de Rezept des Tages - ENDE -->
						
  
  
  </div>
	<?php require "sidebar.php";?>
</div>

</body>
</html>