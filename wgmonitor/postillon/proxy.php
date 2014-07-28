<?php
header('Content-Type: text/xml');

$feed = file_get_contents('http://feeds.feedburner.com/blogspot/rkEL');

echo $feed;

?>