<?php
require_once("Config.class.php");
Config::init();
?>

<!DOCTYPE HTML>
<html id="scrollbar">
<head>
  <?php require "head.php";  ?>
  <link rel="stylesheet" href="media/lvb.css" type="text/css">
</head>
<body>
<div class="row">
  <div class="col-md-8">
  		<?php require_once ("menu.php");?> 
        <!-- the following container will be filled with Ajax after loading...-->
        <div id="contentLeftColumn">
         <script> //preload after the rest is loading:
		 	$( document ).ready(function() {
				$( '#contentLeftColumn' ).load( 'start.php' );
			});
         </script>
  
  

<?php
    $xml = simplexml_load_file('http://feeds.feedburner.com/blogspot/rkEL?format=xml');
    
	
	foreach ($xml->movie as $item) {
   print_r( $items->item, '<br />');
}
?>
         
         
        </div>
  </div>
  <div class="col-md-4" id="sidebarRefresh">
  	<?php require "sidebar.php";?>
  </div>
 </div>
 
 
 
<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-default">
                        Slideshow
                        <i class="glyphicon glyphicon-play-circle"></i>
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Bootstrap Image Gallery lightbox, should be a child element of the document body -->

<!-- Container for Virtual Keyboard -->
<div id="keyboardIcon" onclick="showKeyboard('txtContent');"></div>
<div id="virtualKeyboard"></div>
<!-- End: Container for Virtual Keyboard -->

<script type="text/javascript">
        $(function () {
            jsKeyboard.init("virtualKeyboard");
            $("#txtContent").val(initText);
        });

        function focusIt(t) {
            // define where the cursor is to write character clicked.
            jsKeyboard.currentElement = $(t);
            jsKeyboard.show();
        }

        function showKeyboard(id) {
            clean($("#" + id));
            jsKeyboard.currentElement = $("#" + id);
            jsKeyboard.show();
        }
        var isCleaned = false;
        function clean(t) {
            if (!isCleaned) {
                $(t).text("");
                isCleaned = true;
            }
        }
        var initText = "click to here to start writing...";
</script>


<script src="js/jsKeyboard.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="js/bootstrap-image-gallery.min.js"></script>

</body>
</html>
