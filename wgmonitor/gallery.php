<?php
require_once("Config.class.php");
Config::init();
?>

<!DOCTYPE HTML>
<html>
<head>
<?php require "head.php";  ?>
</head>
<body>
<div class="row">
  <div class="col-md-8">
    <?php require "menu.php";?>
      <div class="row">
        <div id="links"> 
          
          <!-- Begin Dateien auslsen -->
          <?php
		$directory = 'gallery';
		$alledateien = scandir($directory); //Ordner "medien" auslesen
		
		if(is_dir($directory)){	//check if Path exists
			foreach ($alledateien as $datei) { // Ausgabeschleife
			// scandir liest alle Dateien im Ordner aus, zusätzlich noch "." , ".." als Ordner
		    // Nur echte Dateien anzeigen lassen und keine "Punkt" Ordner
			//   <a href="'.$data.'" title="'.$datei.'" data-gallery>
				if ($datei != "." && $datei != ".."  && $datei != "_notes" && $datei != ".DS_Store") {
		   			$data=$directory.'/'.$datei;
		   			echo '
  		            <div class="col-lg-3 col-md-2 col-xs-8 thumb center-block">
  		             <div class="panel panel-default">
		              <div class="panel-body">
  		                <a href="'.$data.'" title="'.$datei.'" data-gallery>
    		    			<img src="'.$data.'" alt="'.$datei.'" width="180px;">
    					</a>
    		          </div>
					 </div>
					</div>
    		        ';
				};
			};
		} else {
			echo "<p>Der Pfad ".$directory." existiert nicht! -> Config: gallery.php</p>";
		};
		?>  
        <!-- end Dateien auslesen --> 
          
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


</div>

<?php require "sidebar.php";?>
</div>
</body>
</html>
