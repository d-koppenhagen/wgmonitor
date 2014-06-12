<?php 
    	require '../blocks/header.php';
?>
<title>Infoscreen</title>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<link rel="stylesheet" href="media/style.css" type="text/css">
<link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<link rel="stylesheet" href="media/bootstrap-image-gallery.min.css">

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
(function($){
    $(document).ready(function(){
        $.ajaxSetup({
            cache: false,
            beforeSend: function(){
                $('#loading').show();
            },
            complete: function(){
                $('#loading').hide();
            },
            success: function(){
                $('#loading').hide();
            }
        });

		//plan table refresh
        $("#content").load("content.php");
        var contentRefreshId = setInterval(function(){
            $("#content").load('content.php');
        }, <?php echo Config::$pref['refreshplan'] * 1000 ?>);
        
        
		//temperature refresh
        $("#temp").load("metadata.php?get=temp");
        var tempRefreshId = setInterval(function(){
            $("#temp").load("metadata.php?get=temp");
        }, <?php echo Config::$pref['refreshtemp'] * 1000 ?>);
        
        
        loadnews();
        showTime();
        
    });
})(jQuery);
</script>
<script>
//load news and start fading
function loadnews(){
	$("#news_content").load("news.php", function(){
		$('#news_content li').hide();
		fadeinout($('#news_content li:first'));
	});
}
</script>
<script>
//function for fading news elements      
function fadeinout(e){
	e.delay().fadeIn().delay(<?php echo Config::$pref['refreshnews'] * 1000 ?>).fadeOut(function(){
		if(e.next().length > 0){
			fadeinout(e.next());
		}else{
			loadnews();
		}
	});	
}
</script>
<script>
//show system time
function showTime(){
	var date=new Date();
	var h = date.getHours();
	var m = date.getMinutes();
	
	//always show two digits
	h = checkTime(h);
	m = checkTime(m);
	$("#curTime").text(h + ":" + m);
	t = setTimeout('showTime()',1000);
}
</script>
<script>
//helper function: add 0 so that there are always two digits
function checkTime(i){
	if(i < 10){
		i = "0" + i;
	}
	return i;
}

</script>


<!-- Script to disable to mark text -->
<script language="JavaScript1.2">
function disableselect(e){
return false
}
function reEnable(){
return true
}
document.onselectstart=new Function ("return false")
if (window.sidebar){
document.onmousedown=disableselect
document.onclick=reEnable
}
</script>
<!-- End of Script -->

<!-- Script to close the Window -->
<script>
function closeWindow(){
	window.open('', '_self', ''); //bug fix
	window.close();
}
</script>
<!-- end script -->
