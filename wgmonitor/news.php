<?php
require_once("inc/lastRSS.php");
require_once("Config.class.php");
Config::init();


$rss = new lastRSS();
$rss->cache_dir   = "";
$rss->cache_time  = 0;
$rss->cp          = "UTF-8";
$rss->date_format = "l";


if($rs = $rss->get(Config::$pref['rssurl'])){
	foreach($rs['items'] AS $item){
		if(!Config::$pref['tagesschau_onlytoday'] OR ($item['pubDate'] == $rs['lastBuildDate'])){ //only show posts from today
			echo "<ul class='list-group'>
<li class='list-group-item'>";
			echo "<h4>".$item['title']."</h4>";
			echo $item['description'];
			echo "</li></ul>";
		}
	}
}

?>