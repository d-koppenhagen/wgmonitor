<table class="table table-striped">
 
 <!--Start: Wetter.com Script-->
 <!--Erstellen der Vorhersagetabelle-->
  <?php 
    /*Zusammensetzen der Request-URL*/
	$sSearchUrl     = 'http://api.wetter.com/forecast/weather'; 
	$sProjectName   = 'wgwidget'; //Projektname, wie er in der Projektverwaltung von wetter.com angegeben wurde
	$sApiKey = 'a5c25475310f06e73db1c8e21f8fcb4e'; //zugeteilter Api Key, findet Ihr ebenefalls in der Projektverwaltung
	
	$citycode="DE0006194"; //City-Code des Standortes
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
    <th></th>
    <th id="headline">heute <?php echo $datum_heute; ?></th>
    <th id="headline">heute++ <?php echo $datum_morgen; ?></th>
    <th id="headline">heute+2 <?php echo $datum_uebermorgen; ?></th>
    </tr>
  <tr>
    <td id="headline">Morgens:</td>
    <td><img src="img/icons/d_<?php echo $wetter_heute_frueh; ?>_b.png" width="65" height="53" title="<?php echo $wetter_heute_frueh_txt;?>"/></td>
    <td><img src="img/icons/d_<?php echo $wetter_morgen_frueh; ?>_b.png" width="65" height="53" title="<?php echo $wetter_morgen_frueh_txt;?>" /></td>
    <td><img src="img/icons/d_<?php echo $wetter_uebermorgen_frueh; ?>_b.png" alt="" width="65" height="53" title="<?php echo $wetter_uebermorgen_frueh_txt;?>" /></td>
    </tr>
  <tr>
    <td id="headline">Mittags:</td>
    <td><img src="img/icons/d_<?php echo $wetter_heute_mittag; ?>_b.png" alt="" width="65" height="53" title="<?php echo $wetter_heute_mittag_txt;?>"/></td>
    <td><img src="img/icons/d_<?php echo $wetter_morgen_mittag; ?>_b.png" alt="" width="65" height="53" title="<?php echo $wetter_morgen_mittag_txt;?>" /></td>
    <td><img src="img/icons/d_<?php echo $wetter_uebermorgen_mittag; ?>_b.png" alt="" width="65" height="53" title="<?php echo $wetter_uebermorgen_mittag_txt;?>"  /></td>
    </tr>
  <tr>
    <td id="headline">Abends:</td>
    <td><img src="img/icons/d_<?php echo $wetter_heute_abend; ?>_b.png" alt="" width="65" height="53" title="<?php echo $wetter_heute_abend_txt;?>" /></td>
    <td><img src="img/icons/d_<?php echo $wetter_morgen_abend; ?>_b.png" alt="" width="65" height="53"  title="<?php echo $wetter_morgen_abend_txt;?>" /></td>
    <td><img src="img/icons/d_<?php echo $wetter_uebermorgen_abend; ?>_b.png" alt="" width="65" height="53" title="<?php echo $wetter_uebermorgen_abend_txt;?>" /></td>
    </tr>
  <tr>
    <td id="headline">Nachts:</td>
    <td><img src="img/icons/n_<?php echo $wetter_heute_nacht; ?>_b.png" width="65" height="53" title="<?php echo $wetter_heute_nacht_txt;?>" /></td>
    <td><img src="img/icons/n_<?php echo $wetter_morgen_nacht; ?>_b.png" alt="" width="65" height="53"  title="<?php echo $wetter_morgen_nacht_txt;?>" /></td>
    <td><img src="img/icons/n_<?php echo $wetter_uebermorgen_nacht; ?>_b.png" alt="" width="65" height="53" title="<?php echo $wetter_uebermorgen_nacht_txt;?>" /></td>
    </tr>
  <tr>
    <td id="headline">Temperatur:<br />
      (min/max)</td>
    <td style="font-size:20px"><span class="temp_min"><?php echo $tmin_heute; ?></span> | <span class="temp_max"><?php echo $tmax_heute; ?></span></td>
    <td style="font-size:20px"><span class="temp_min"><?php echo $tmin_morgen; ?></span> | <span class="temp_max"><?php echo $tmax_morgen; ?></span></td>
    <td style="font-size:20px"><span class="temp_min"><?php echo $tmin_uebermorgen; ?></span> | <span class="temp_max"><?php echo $tmax_uebermorgen; ?></span></td>
    </tr>
  <tr>
    <td id="headline">Niederschlagsrisiko:</td>
    <td><?php echo $niederschlags_ws_heute;?>%</td>
    <td><?php echo $niederschlags_ws_morgen;?>%</td>
    <td><?php echo $niederschlags_ws_uebermorgen;?>%</td>
    </tr>
  <tr>
    <td id="headline">Windrichtung:</td>
    <td><img src="img/icons/<?php echo $wind_richtung_heute;?>.png" alt="<?php echo $wind_richtung_heute;?>" title="<?php echo $wind_richtung_heute;?>" width="50" height="50"/></td>
    <td><img src="img/icons/<?php echo $wind_richtung_morgen;?>.png" alt="<?php echo $wind_richtung_morgen;?>" title="<?php echo $wind_richtung_morgen;?>" width="50" height="50"/></td>
    <td><img src="img/icons/<?php echo $wind_richtung_uebermorgen;?>.png" alt="<?php echo $wind_richtung_uebermorgen;?>" title="<?php echo $wind_richtung_uebermorgen;?>" width="50" height="50"/></td>
    </tr>
  <tr>
    <td id="headline">Windgeschwindigkeit:</td>
    <td><?php echo $wind_geschwindigkeit_heute;?> km/h</td>
    <td><?php echo $wind_geschwindigkeit_morgen;?> km/h</td>
    <td><?php echo $wind_geschwindigkeit_uebermorgen;?> km/h</td>
    </tr>


 <!-- END: Wetter.com Script-->
 
</table>

 <!-- Start: News-->

<ul id="news_content">...loading...</p>

 <!-- END: News-->
