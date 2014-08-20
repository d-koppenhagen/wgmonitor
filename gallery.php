<?php require_once("common/wlanConfig.php"); Config::init(); ?>
<div class="row">
  <div class="col-md-9">
  	<h1>Gallerie</h1>
    <h4>Bilder auf deinem Mobilgerät abrufen:</h4>
		<ol>
        	<li>Logge dich im WLAN ein:
                <ul>
                    <li>WLAN-Name (SSID): "<?php echo Config::$pref['wlanssid'] ?>"</li>
                    <li>Kennwort: "<?php echo Config::$pref['wlankey'] ?>"</li>
                </ul>
            <li>Scanne den QR Code mit deinem Mobilgerät </li>
      		<ul>
            	<li>Alternativ kannst du auch im Browser die folgende Seite aufrufen: http://10.0.1.12/wgmonitor/gallery </li>
            </ul>
    	</ol>
      <p><span class="glyphicon glyphicon-fullscreen"></span> Um ein Bild in Groß anzusehen, tippe bitte auf das Miniaturbild</p>
  </div>
  <div class="col-md-3">
  	<span class="help-block help-block-start"></span>
    <div style=" width:158px;">
      <!--<div class="thumbnail"  style="background-color: #ffffff;">
        <div id="qrcode"></div>
      </div>-->
       <div id="qrcode"></div>
    </div>
  </div>
</div>

<div class="container-fluid" id="gallerythumbs">
<div class="row">
  <!-- Begin Dateien auslsen -->
  <?php
//$dir = 'file://sdcard/DCIM/Camera';
$dir = 'gallery';
//$dir = '../../DCIM/Camera';


$dirlist = getFileList($dir);


function getFileList($directory)
  {
		$alledateien = scandir($directory); //Ordner "medien" auslesen

		if(is_dir($directory)){	//check if Path exists
			foreach ($alledateien as $datei) { // Ausgabeschleife
			// scandir liest alle Dateien im Ordner aus, zusätzlich noch "." , ".." als Ordner

				$data=$directory.'/'.$datei;

				$extensioncheck=pathinfo($datei);
				if (strtolower($extensioncheck['extension'])==("jpg") && (substr($datei, 0, 1) != ".")) {
					$thumb=$directory.'/thumbs/'.$datei;
		   			echo '
  		            <div class="col-xs-12 col-md-4 col-lg-3" id="image'.$datei.'">
  		                <a href="'.$data.'" data-gallery class="thumbnail">
                          <div class="well well-lg">
							<img data-src="'.$thumb.'" src="'.$thumb.'" class="img-responsive" >
                          </div>
    					</a>
					</div>
    		        ';
				} else
				if (is_dir($data) && $datei != "." && $datei != ".." && $datei != "thumbs") {
					echo '
					<div class="col-xs-6 col-md-4 col-lg-3">
						<button type="button" class="btn btn-primary btn-lg btn-block">
							<span class="glyphicon glyphicon-folder-open"></span><br>'.$datei.'
						</button>
					</div>';
				};
			};
		} else {
			echo "<p>Der Pfad ".$directory." existiert nicht! -> Config: gallery.php</p>";
		};

  }

?>
  <!-- end Dateien auslesen -->
    </div>
</div>

<script type="text/javascript" src="js/qrcode.js"></script>
<script type="text/javascript">
var qrcode = new QRCode(document.getElementById("qrcode"), {
	width : 150,
	height : 150
});

function makeCode () {
	var elText = "http://10.0.1.12/wgmonitor/gallery/";
	qrcode.makeCode(elText);
}
makeCode();
</script>