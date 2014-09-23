<?php
class Config{
	public static $pref;
	//Konfiguration
	public static function init(){
		self::$pref = array(
			"stations" => array(13247,11563),  //LVB-Stationen
			"showmax"  => 16, //Anzahl der Stationen
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
