<span class="help-block">  </span>
      
  
 
          <!-- Begin Dateien auslsen -->
          <?php
		$directory = 'gallery';
		$alledateien = scandir($directory); //Ordner "medien" auslesen
		
		if(is_dir($directory)){	//check if Path exists
			foreach ($alledateien as $datei) { // Ausgabeschleife
			// scandir liest alle Dateien im Ordner aus, zusätzlich noch "." , ".." als Ordner
		    // Nur echte Dateien anzeigen lassen und keine "Punkt" Ordner
			//   <a href="'.$data.'" title="'.$datei.'" data-gallery>
				if ($datei != "." && $datei != ".."  && $datei != "_notes" && $datei != ".DS_Store" && $datei != "thumbs") {
					$thumb=$directory.'/thumbs/'.$datei;
		   			$data=$directory.'/'.$datei;
		   			echo '
  		            <div class="col-xs-8 col-md-3" id="image'.$datei.'">
  		                <a href="'.$data.'" data-gallery class="thumbnail">
    		    			<div class="well well-lg"><img src="'.$thumb.'" style="max-width:100%;"></div>
    					</a>
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
        
