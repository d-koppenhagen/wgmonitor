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
        <div id="contentLeftColumn">
        	<span class="help-block">  </span>
  			<button type="button" class="btn btn-danger btn-lg" onclick="closeWindow()"><span class="glyphicon glyphicon-remove-circle" ></span> Beenden</button>
            
            
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="js/bootstrap-image-gallery.min.js"></script>

</body>
</html>
