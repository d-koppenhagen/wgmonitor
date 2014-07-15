<?php require_once("common/wlanConfig.php"); Config::init(); ?>

<span class="help-block"> </span>
<div class="row">
  <div class="col-md-4">
    <h1>Gallerie</h1>
    <p>Um Zur Großbildansicht zu gelangen, bitte auf eines der Miniaturbilder klicken</p>
  </div>
  <div class="col-md-5">
    <h4>Bilder auf deinem Mobilgerät abrufen:</h4>
    <ol>
      <li>Logge dich im WLAN ein:</li>
      <ul>
        <li>SSID: "<?php echo Config::$pref['wlanssid'] ?>"</li>
        <li>Kennwort: "<?php echo Config::$pref['wlankey'] ?>"</li>
      </ul>
      <li>Scanne den QR Code mit deinem Mobilgerät</li>
      <ul>
        <li>Alternativ kannst du auch im Browser die folgende Seite aufrufen: "http://10.0.1.100/wgmonitor/gallery"</li>
      </ul>
    </ol>
  </div>
  <div class="col-md-3">
    <div style=" width:158px;">
      <div class="thumbnail"  style="background-color: #ffffff;">
        <div id="qrcode"></div>
      </div>
    </div>
  </div>
</div>
<div class="row"> 
  <!-- Begin Dateien auslsen -->
  <?php
		$directory = 'gallery';
		$alledateien = scandir($directory); //Ordner "medien" auslesen
		
		if(is_dir($directory)){	//check if Path exists
			foreach ($alledateien as $datei) { // Ausgabeschleife
			// scandir liest alle Dateien im Ordner aus, zusätzlich noch "." , ".." als Ordner
		    // Nur echte Dateien anzeigen lassen und keine "Punkt" Ordner
			//   <a href="'.$data.'" title="'.$datei.'" data-gallery>
				if ($datei != "." && $datei != ".."  && $datei != "_notes" && $datei != ".DS_Store" && $datei != "thumbs" && $datei != "index.php") {
					$thumb=$directory.'/thumbs/'.$datei;
		   			$data=$directory.'/'.$datei;
		   			echo '
  		            <div class="col-xs-8 col-md-3" id="image'.$datei.'">
  		                <a href="'.$data.'" data-gallery class="thumbnail">
							<div class="well well-lg">
								<img src="'.$thumb.'" style="max-width:100%;" class="center-block">
							</div>
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

<script type="text/javascript" src="js/qrcode.js"></script> 
<script type="text/javascript">
var qrcode = new QRCode(document.getElementById("qrcode"), {
	width : 150,
	height : 150
});

function makeCode () {
	var elText = "http://10.0.1.100/wgmonitor/gallery/";
	qrcode.makeCode(elText);
}
makeCode();
</script>


<script type='text/javascript'>
    $(document).ready(function() {
         $('.carousel').carousel({
             interval: 2000
         })
    });    
</script> 
