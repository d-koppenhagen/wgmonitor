<?php

class Config{
	public static $pref;
	//Konfiguration
	public static function init(){
		self::$pref = array(
			"wlanssid" => "Gast",
			"wlankey" => "hftl_kmi12",
		);
	}
}

?>