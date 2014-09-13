<?php

class Config{
	public static $pref;
	//Konfiguration
	public static function init(){
		self::$pref = array(
			/* WLAN for Guests*/
			"wlanssid" => "WLANNAME",
			"wlankey" => "WLANKEY",
            "ipconfig" => "http://127.0.0.1", //IP Adress for creating QR Code
		);
	}
}

?>
