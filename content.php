
<?php
    error_reporting("E_ALL & ~E_NOTICE");
    ini_set('display_errors', 1);
    header("Content-Type: text/html");

    require_once("common/StationMonitor.class.php");
    require_once("common/Config.class.php");
    Config::init(); //initialize configuration

    $showmax = ($getshow >= 1) ? $getshow : Config::$pref['showmax'];

    foreach(Config::$pref['stations'] AS $station){
	   echo "<div class='col-md-6'>"; //width of the table

        $sm = new StationMonitor($station);
	    $journeys = $sm->getJourneys();
        $tabletpl = Config::getTemplate("plantable");
	    $rowtpl   = Config::getTemplate("planrow");

	   //decide how many rows to show
	   if(count($journeys) > $showmax){
           $count = $showmax;
	   } else {
           $count = count($journeys);
	   }
	   $planrows = array();

	   //go through journeys
	   for($i = 0; $i < $count; $i++){
		  $jo = $journeys[$i];
		  //cut away "Leipzig" from the beginning of the label
		  if(substr($jo->label, 0, 9) == "Leipzig, "){
			$jo->label = substr($jo->label, 9);
		  }
		  //only show timediff if not null
		  $jo->timeDiff = ($jo->timeDiffValue) ? $jo->timeDiff : "";
          //replace Placeholders
		  $search = array("{BGCOLOR}","{LINENUM}","{LABEL}","{TIME}","{TIMEDIFF}");
		  $replace = array("#".$jo->color, $jo->shortLabel, $jo->label, $jo->time, $jo->timeDiff);
		  $planrows[] = str_replace($search, $replace, $rowtpl);
	   }
       //replace Placeholders
       $search = array("{STATIONNAME}", "{PLANROWS}");
	   $replace = array($sm->getStationName(), implode("\n", $planrows));
	   $table = str_replace($search, $replace, $tabletpl);

       echo $table;  //print edited table
	   echo "</div>"; //close div container
}
?>
