<?php

class Config{
	public static $pref;
	//Konfiguration
	public static function init(){
		self::$pref = array(
			"stations" => array(13247,11563),  //LVB-Stationen
			"showmax"  => 10, //Anzahl der Stationen
			"refreshplan" => 373, //Aktualisierungszeit vom Abfahrtsmonitor - sek
		
			"weather_location" => "51.342065,12.377057", //Wetterkoordinaten
			"rssurl" => "http://www.tagesschau.de/xml/rss2", //RSS-URL
			"tagesschau_onlytoday" => 1, //only show today's posts from Tagesschau RSS feed
			"refreshtemp" => 500,   // in sec
			"refreshnews" => 15, // refresh time of news in sec
		);
	}
	
	
	//Aufruf des Templates
	public static function getTemplate($tpl){
		$tplpath = "templates/";
		$file = $tplpath.$tpl.".tpl";

		if(file_exists($file)){
			return file_get_contents($file);
		}else{
			return 0;
		}
	}
}

?>