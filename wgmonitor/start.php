<?php require_once("common/wlanConfig.php"); Config::init(); ?>

<h2>WG-Monitor "Ronny" heißt euch herzlich Willkommen!</h2>
<div class="row">
  <div class="col-md-12">
    <div class="well well-sm">
      <ul class="list-inline">
        <li>
          <h4>WLAN-Zugang für Gäste</h4>
        </li>
        <li> - </li>
        <li>
          <h4>Netzwerkname (SSID): "<?php echo Config::$pref['wlanssid'] ?>"</h4>
        </li>
        <li> - </li>
        <li>
          <h4>Kennwort: "<?php echo Config::$pref['wlankey'] ?>"</h4>
        </li>
      </ul>
    </div>
  </div>
</div>
<h3>Kommende Veranstaltungen:</h3>
<!-- row 1 -->
<div class="row">
  <div class="col-md-12">
    <ul>
      <li>
        <h4>21. Juli: Semesterabschluss-Besäufniss</h4>
      </li>
    </ul>
  </div>
</div>

<!--<h3>Funktionen und Tools</h3>
<div class="row">
  <div class="col-md-3">
  
   <button type="button" class="btn btn-default btn-lg center-block" onclick="$( '#contentLeftColumn' ).load( '../index.php' );" style="width:100%"><span class="glyphicon glyphicon-facetime-video"></span><br>Webcam</button>
 
 --> 
<!--	<button type="button" class="btn btn-default btn-lg center-block" onclick="$( '#contentLeftColumn' ).load( 'buy.php' );" style="width:100%"><span class="glyphicon glyphicon-th-list"></span><br>Einkaufsliste</button>
  -->

</div>
</div>
<span class="help-block help-block-start"></span> 

<!-- End: row 1 -->



<h3>Aktuelle Meldungen vom Postillon</h3>
<!-- row 2-->
<div class="row">
  <div class="col-md-12">
	<div id="divRss"></div>
	<script type="text/javascript">
    	$(document).ready(function () {
        $('#divRss').FeedEk({
            FeedUrl: 'http://feeds.feedburner.com/blogspot/rkEL', // Feed URL
            MaxCount: 8, // number of entrys
			ShowDesc: true, // show / hide description
            ShowPubDate: true, //show date?
            //DescCharacterLimit: 1000, // max number of characters (comment out is possible)
			DateFormat: 'DD.MM.YYYY - HH:mm', //time and Date format
			DateFormatLang: 'de', //en, de, etc.
			TitleLinkTarget:'_blank', // also _self, etc.
        });
    });
	</script> 
  </div>
</div>  
<!-- End: row 2-->


<h3>Verwaltung</h3>
<!-- row 3-->
<div class="row">
  <div class="col-md-3">
    <button type="button" class="btn btn-primary btn-lg center-block" onclick="location.reload();"  style="width:100%"><span class="glyphicon glyphicon-refresh" ></span><br>
    Seite neu laden</button>
  </div>
  <div class="col-md-3">
    <button type="button" class="btn btn-primary btn-lg center-block" onclick="$( '#contentLeftColumn' ).load( 'settings.php' );"  style="width:100%"><span class="glyphicon glyphicon-cog" ></span><br>Verwaltung</button>
  </div>
  <div class="col-md-3">
    <button type="button" class="btn btn-danger btn-lg center-block" onclick="closeWindow()" style="width:100%"><span class="glyphicon glyphicon-off"></span><br>
    Beenden</button>
  </div>
</div>
<!-- End: row 3-->
