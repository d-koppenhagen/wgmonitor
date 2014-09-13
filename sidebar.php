<table class="table table-striped text-center">


  <?php

	function CityCode($city) {
			if ($city == "default"){
				return "DE0006194"; //return Leipzig as default
			} else return $city;
	}


    /*Zusammensetzen der Request-URL*/
	$sSearchUrl     = 'http://api.wetter.com/forecast/weather';
	$sProjectName   = 'wgwidget'; //Projektname, wie er in der Projektverwaltung von wetter.com angegeben wurde
	$sApiKey = 'a5c25475310f06e73db1c8e21f8fcb4e'; //zugeteilter Api Key, findet Ihr ebenefalls in der Projektverwaltung

	//$citycode="DE0006194"; //City-Code des Standortes
	$citycode=CityCode("default");

	$sChecksum  = md5($sProjectName . $sApiKey .  $citycode);
	$sSearchUrl .= '/city/' . $citycode;
	$sSearchUrl .= '/project/' . $sProjectName;
	$sSearchUrl .= '/cs/' . $sChecksum;


    /*Laden XML des Files*/
	$api = simplexml_load_string(file_get_contents($sSearchUrl));

	/* Parameter für den heutigen Tag*/
	$datum_heute= date("d.m");

	$wetter=$api->forecast->date[0]->time[0]->w;
	$wetter_heute_frueh=substr($wetter,0,1);
	$wetter_heute_frueh_txt=$api->forecast->date[0]->time[0]->w_txt;

	$wetter=$api->forecast->date[0]->time[1]->w;
	$wetter_heute_mittag=substr($wetter,0,1);
	$wetter_heute_mittag_txt=$api->forecast->date[0]->time[1]->w_txt;

	$wetter=$api->forecast->date[0]->time[2]->w;
	$wetter_heute_abend=substr($wetter,0,1);
	$wetter_heute_abend_txt=$api->forecast->date[0]->time[2]->w_txt;

	$wetter=$api->forecast->date[0]->time[3]->w;
	$wetter_heute_nacht=substr($wetter,0,1);
	$wetter_heute_nacht_txt=$api->forecast->date[0]->time[3]->w_txt;

	$tmax_heute=-100;
	$tmin_heute=100;
	for ($a=0;$a<4;$a++){
		$tmax_curr=(int)$api->forecast->date[0]->time[$a]->tx;
		$tmin_curr=(int)$api->forecast->date[0]->time[$a]->tn;

		if($tmax_curr>=$tmax_heute){
			$tmax_heute=$tmax_curr;
		}
		if($tmin_curr<=$tmin_heute)
		{
			$tmin_heute=$tmin_curr;
		}
	}

	$niederschlags_ws_heute=$api->forecast->date[0]->pc;
	$wind_geschwindigkeit_heute = $api->forecast->date[0]->ws;
	$wind_richtung_heute = $api->forecast->date[0]->wd_txt;



   	/* Parameter für den morgigen Tag*/
    $datum_morgen = date("d.m", time()+86400);
    $wetter=$api->forecast->date[1]->time[0]->w;
	$wetter_morgen_frueh=substr($wetter,0,1);
	$wetter_morgen_frueh_txt=$api->forecast->date[1]->time[0]->w_txt;

	$wetter=$api->forecast->date[1]->time[1]->w;
	$wetter_morgen_mittag=substr($wetter,0,1);
	$wetter_morgen_mittag_txt=$api->forecast->date[1]->time[1]->w_txt;

	$wetter=$api->forecast->date[1]->time[2]->w;
	$wetter_morgen_abend=substr($wetter,0,1);
	$wetter_morgen_abend_txt=$api->forecast->date[1]->time[2]->w_txt;

	$wetter=$api->forecast->date[1]->time[3]->w;
	$wetter_morgen_nacht=substr($wetter,0,1);
	$wetter_morgen_nacht_txt=$api->forecast->date[1]->time[3]->w_txt;

	$tmax_morgen=-100;
	$tmin_morgen=100;
	for ($a=0;$a<4;$a++){
		$tmax_curr=(int)$api->forecast->date[1]->time[$a]->tx;
		$tmin_curr=(int)$api->forecast->date[1]->time[$a]->tn;

		if($tmax_curr>=$tmax_morgen){
			$tmax_morgen=$tmax_curr;
		}
		if($tmin_curr<=$tmin_morgen)
		{
			$tmin_morgen=$tmin_curr;
		}
	}

	$niederschlags_ws_morgen=$api->forecast->date[1]->pc;
	$wind_geschwindigkeit_morgen = $api->forecast->date[1]->ws;
	$wind_richtung_morgen = $api->forecast->date[1]->wd_txt;


	/*Parameter für den übernächsten Tag*/
	 $datum_uebermorgen = date("d.m", time()+172800);
	$wetter=$api->forecast->date[2]->time[0]->w;
	$wetter_uebermorgen_frueh=substr($wetter,0,1);
	$wetter_uebermorgen_frueh_txt=$api->forecast->date[2]->time[0]->w_txt;

	$wetter=$api->forecast->date[2]->time[1]->w;
	$wetter_uebermorgen_mittag=substr($wetter,0,1);
	$wetter_uebermorgen_mittag_txt=$api->forecast->date[2]->time[1]->w_txt;

	$wetter=$api->forecast->date[2]->time[2]->w;
	$wetter_uebermorgen_abend=substr($wetter,0,1);
	$wetter_uebermorgen_abend_txt=$api->forecast->date[2]->time[2]->w_txt;

	$wetter=$api->forecast->date[2]->time[3]->w;
	$wetter_uebermorgen_nacht=substr($wetter,0,1);
	$wetter_uebermorgen_nacht_txt=$api->forecast->date[2]->time[3]->w_txt;

	$tmax_uebermorgen=-100;
	$tmin_uebermorgen=100;
	for ($a=0;$a<4;$a++){
		$tmax_curr=(int)$api->forecast->date[2]->time[$a]->tx;
		$tmin_curr=(int)$api->forecast->date[2]->time[$a]->tn;

		if($tmax_curr>=$tmax_uebermorgen){
			$tmax_uebermorgen=$tmax_curr;
		}
		if($tmin_curr<=$tmin_uebermorgen)
		{
			$tmin_uebermorgen=$tmin_curr;
		}
	}

	$niederschlags_ws_uebermorgen=$api->forecast->date[2]->pc;
	$wind_geschwindigkeit_uebermorgen = $api->forecast->date[2]->ws;
	$wind_richtung_uebermorgen = $api->forecast->date[2]->wd_txt;

?>


<!--Zusammensetzen der Vorhersagetabelle-->


  <tr>
    <th><h3>Wetter</h3></th>
    <th><h4>heute <?php echo $datum_heute; ?></h4></th>
    <th><h4>morgen <?php echo $datum_morgen; ?></h4></th>
    <th><h4>übermorgen <?php echo $datum_uebermorgen; ?></h4></th>
    </tr>
  <tr>
    <td class="text-left"><h4>Morgens:</h4></td>
    <td><img src="img/icons/d_<?php echo $wetter_heute_frueh; ?>_b.png" width="61" height="48" title="<?php echo $wetter_heute_frueh_txt;?>"/></td>
    <td><img src="img/icons/d_<?php echo $wetter_morgen_frueh; ?>_b.png" width="61" height="48" title="<?php echo $wetter_morgen_frueh_txt;?>" /></td>
    <td><img src="img/icons/d_<?php echo $wetter_uebermorgen_frueh; ?>_b.png" alt="" width="61" height="48" title="<?php echo $wetter_uebermorgen_frueh_txt;?>" /></td>
    </tr>
  <tr>
    <td class="text-left"><h4>Mittags:</h4></td>
    <td><img src="img/icons/d_<?php echo $wetter_heute_mittag; ?>_b.png" alt="" width="61" height="48" title="<?php echo $wetter_heute_mittag_txt;?>"/></td>
    <td><img src="img/icons/d_<?php echo $wetter_morgen_mittag; ?>_b.png" alt="" width="61" height="48" title="<?php echo $wetter_morgen_mittag_txt;?>" /></td>
    <td><img src="img/icons/d_<?php echo $wetter_uebermorgen_mittag; ?>_b.png" alt="" width="61" height="48" title="<?php echo $wetter_uebermorgen_mittag_txt;?>"  /></td>
    </tr>
  <tr>
    <td class="text-left"><h4>Abends:</h4></td>
    <td><img src="img/icons/d_<?php echo $wetter_heute_abend; ?>_b.png" alt="" width="61" height="48" title="<?php echo $wetter_heute_abend_txt;?>" /></td>
    <td><img src="img/icons/d_<?php echo $wetter_morgen_abend; ?>_b.png" alt="" width="61" height="48"  title="<?php echo $wetter_morgen_abend_txt;?>" /></td>
    <td><img src="img/icons/d_<?php echo $wetter_uebermorgen_abend; ?>_b.png" alt="" width="61" height="48" title="<?php echo $wetter_uebermorgen_abend_txt;?>" /></td>
    </tr>
  <tr>
    <td class="text-left"><h4>Nachts:</h4></td>
    <td><img src="img/icons/n_<?php echo $wetter_heute_nacht; ?>_b.png" width="61" height="48" title="<?php echo $wetter_heute_nacht_txt;?>" /></td>
    <td><img src="img/icons/n_<?php echo $wetter_morgen_nacht; ?>_b.png" alt="" width="61" height="48"  title="<?php echo $wetter_morgen_nacht_txt;?>" /></td>
    <td><img src="img/icons/n_<?php echo $wetter_uebermorgen_nacht; ?>_b.png" alt="" width="61" height="48" title="<?php echo $wetter_uebermorgen_nacht_txt;?>" /></td>
    </tr>
  <tr>
    <td class="text-left"><h4>Temperatur:</h4><small>(min/max in °C)</small></td>
    <td><h4><span class="temp_min"><?php echo $tmin_heute; ?></span> | <span class="temp_max"><?php echo $tmax_heute; ?></span></h4></td>
    <td><h4><span class="temp_min"><?php echo $tmin_morgen; ?></span> | <span class="temp_max"><?php echo $tmax_morgen; ?></span></h4></td>
    <td><h4><span class="temp_min"><?php echo $tmin_uebermorgen; ?></span> | <span class="temp_max"><?php echo $tmax_uebermorgen; ?></span></h4></td>
    </tr>
  <tr>
    <td class="text-left"><h4>Niederschlagsrisiko:</h4></td>
    <td><h4><?php echo $niederschlags_ws_heute;?>%</h4></td>
    <td><h4><?php echo $niederschlags_ws_morgen;?>%</h4></td>
    <td><h4><?php echo $niederschlags_ws_uebermorgen;?>%</h4></td>
    </tr>
  <tr>
    <td class="text-left"><h4>Windrichtung:</h4></td>
    <td><img src="img/icons/<?php echo $wind_richtung_heute;?>.png" alt="<?php echo $wind_richtung_heute;?>" title="<?php echo $wind_richtung_heute;?>" width="50" height="50"/></td>
    <td><img src="img/icons/<?php echo $wind_richtung_morgen;?>.png" alt="<?php echo $wind_richtung_morgen;?>" title="<?php echo $wind_richtung_morgen;?>" width="50" height="50"/></td>
    <td><img src="img/icons/<?php echo $wind_richtung_uebermorgen;?>.png" alt="<?php echo $wind_richtung_uebermorgen;?>" title="<?php echo $wind_richtung_uebermorgen;?>" width="50" height="50"/></td>
    </tr>
  <tr>
    <td class="text-left"><h4>Windgeschwindigkeit:</h4></td>
    <td><h4><?php echo $wind_geschwindigkeit_heute;?> km/h</h4></td>
    <td><h4><?php echo $wind_geschwindigkeit_morgen;?> km/h</h4></td>
    <td><h4><?php echo $wind_geschwindigkeit_uebermorgen;?> km/h</h4></td>
    </tr>


 <!-- END: Wetter.com Script-->

</table>
