<?php

header('Content-type: application/xml');
echo file_get_contents("http://feeds.feedburner.com/blogspot/rkEL?format=xml");

?>
