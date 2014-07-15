<?php

class Config{
	public static $pref;
	//Konfiguration
	public static function init(){
		self::$pref = array(
			/* WLAN for Guests*/			
			"wlanssid" => "WLANNAME",
			"wlankey" => "WLANKEY",
		);
	}
}

?>
