<?php
class Config{
	public static $pref;
	//Konfiguration
	public static function init(){
		self::$pref = array(
			"stations" => array(13247,11563),  //LVB-Stationen
			"showmax"  =>11, //Anzahl der Stationen
			"weather_location" => "51.342065,12.377057", //Wetterkoordinaten
			"rssurl" => "http://www.tagesschau.de/xml/rss2", //RSS-URL
			"tagesschau_onlytoday" => 1, //only show today's posts from Tagesschau RSS feed
			//"refreshplan" => rand(200,300), //Aktualisierungszeit vom Abfahrtsmonitor
			"refreshplan" => 10000000,
			"refreshtemp" => rand(350,600), 
			"refreshnews" => 15, //Aktualisierungszeit der News
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