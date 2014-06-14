<script>
//plan table refresh
	$("#content").load("content.php");
 	var contentRefreshId = setInterval(function(){
 		$("#content").load('content.php');
    }, <?php 
require_once("Config.class.php");
Config::init(); echo Config::$pref['refreshplan'] * 1000 ?>);
</script>
<div class="row" id="content"></div>