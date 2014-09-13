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
                    <h4 class="wlan_ssid_data">Netzwerkname (SSID): </h4>
                </li>
                <li>-</li>
                <li>
                    <h4 class="wlan_pass_data">Kennwort: </h4>
                </li>
            </ul>
        </div>

    </div>
</div>
<hr>

<h3><span class="glyphicon glyphicon-th-large"></span> Tools</h3>
<div class="row">
    <div class="col-md-3">
        <input id="StartOpenCamera" type="file" accept="image/*" capture="camera" style="width:100%"  class="hidden" />
        <button class="btn btn-default btn-lg center-block" id="#choosePicture" style="width:100%" onclick="$('#StartOpenCamera').click();">
            <span class="glyphicon glyphicon-camera"></span>
            <br>Ein Foto machen
        </button>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-default btn-lg center-block" onclick="$( '#contentLeftColumn' ).load( 'buy.php' );" style="width:100%"><span class="glyphicon glyphicon-th-list"></span>
            <br>Einkaufsliste</button>

    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-default btn-lg center-block" onclick="$( '#contentLeftColumn' ).load( 'gb.html' );" style="width:100%"><span class="glyphicon glyphicon-th-list"></span>
            <br>Gästebuch</button>

    </div>
</div>

<hr>

<h3><span class="glyphicon glyphicon-dashboard"></span> Verwaltung</h3>
<!-- row 3-->
<div class="row">
    <div class="col-md-3">
        <button type="button" class="btn btn-primary btn-lg center-block" onclick="location.reload();" style="width:100%"><span class="glyphicon glyphicon-refresh"></span>
            <br>Seite neu laden</button>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-primary btn-lg center-block" onclick="$( '#contentLeftColumn' ).load( 'settings.html' );" style="width:100%"><span class="glyphicon glyphicon-cog"></span>
            <br>Verwaltung</button>
    </div>

</div>
<!-- End: row 3-->

<script>
$(document).ready(function(){        //WLAN Data from wlanconfig.js
        $(".wlan_ssid_data").append(getWlanData().wlanssid);
        $(".wlan_pass_data").append(getWlanData().wlankey);
});
</script>
