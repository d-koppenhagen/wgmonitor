<?php require_once( "common/wlanConfig.php"); Config::init(); ?>

<h3>Herzlich Willkommen in der WG von Mario und Danny!</h3>
<hr>
<h4>Aktuelle Informationen:</h4>
<div class="row">
    <div class="col-md-12">
        <ul>
            <li>Jetzt auch aus dem Web erreichbar unter: 1111101.eu</li>
        </ul>

        <div class="well well-sm">
            <ul class="list-inline">
                <li>
                    <h4>WLAN-Zugang für Gäste</h4>
                </li>
                <li>-</li>
                <li>
                    <h4>Netzwerkname (SSID): "<?php echo Config::$pref['wlanssid'] ?>"</h4>
                </li>
                <li>-</li>
                <li>
                    <h4>Kennwort: "<?php echo Config::$pref['wlankey'] ?>"</h4>
                </li>
            </ul>
        </div>

    </div>
</div>
<hr>

<h3>Tools</h3>
<div class="row">
    <div class="col-md-3">
        <button type="button" class="btn btn-default btn-lg center-block" onclick="$( '#contentLeftColumn' ).load( 'postillon.html' );" style="width:100%"><span class="glyphicon glyphicon-bullhorn"></span>
            <br>Postillon News</button>
    </div>
    <div class="col-md-3">
        <input  id="StartOpenCamera" type="file" accept="image/*" capture="camera" style="width:100%" />
        <button class="btn btn-default btn-lg center-block" id="#choosePicture" style="width:100%" onclick="$('#StartOpenCamera').click();">
            <span class="glyphicon glyphicon-camera"></span>
            <br>Ein Foto machen
        </button>
    </div>


    <!--<div class="col-md-3">
  <button type="button" class="btn btn-default btn-lg center-block" onclick="$( '#contentLeftColumn' ).load( 'test.php' );" style="width:100%"><span class="glyphicon glyphicon-picture"></span> <span class="glyphicon glyphicon-pencil"></span><br>Ein Bild malen</button>
  </div>-->

    <!--<button type="button" class="btn btn-default btn-lg center-block" onclick="$( '#contentLeftColumn' ).load( '../index.php' );" style="width:100%"><span class="glyphicon glyphicon-facetime-video"></span><br>Webcam</button>
 
 -->
    <!--	<button type="button" class="btn btn-default btn-lg center-block" onclick="$( '#contentLeftColumn' ).load( 'buy.php' );" style="width:100%"><span class="glyphicon glyphicon-th-list"></span><br>Einkaufsliste</button>
  -->




    <!--<div class="col-md-3">
        <button type="button" class="btn btn-default btn-lg center-block" onclick="$( '#contentLeftColumn' ).load( 'jingles.html' );" style="width:100%"><span class="glyphicon glyphicon-bullhorn"></span>
            <br>Fritz Jingles</button>
    </div>-->

</div>
<hr>
<!-- End: row 1 -->


<h3>Verwaltung</h3>
<!-- row 3-->
<div class="row">
    <div class="col-md-3">
        <button type="button" class="btn btn-primary btn-lg center-block" onclick="location.reload();" style="width:100%"><span class="glyphicon glyphicon-refresh"></span>
            <br>Seite neu laden</button>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-primary btn-lg center-block" onclick="$( '#contentLeftColumn' ).load( 'settings.php' );" style="width:100%"><span class="glyphicon glyphicon-cog"></span>
            <br>Verwaltung</button>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger btn-lg center-block" onclick="closeWindow()" style="width:100%"><span class="glyphicon glyphicon-off"></span>
            <br>Beenden
        </button>
    </div>
</div>
<!-- End: row 3-->
