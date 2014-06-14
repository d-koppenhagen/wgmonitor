<?php
/*
 2008 Copyright www.inverudio.com
 Attribution-Noncommercial-Share Alike 3.0 Unported
 http://creativecommons.org/licenses/by-nc-sa/3.0/legalcode
 To remove copyright link in guestbook (NOT this copyright notice!), contact author
*/

require_once('mygb.php');

$page = 0;
if(isset($_GET['p']))$page = (int)$_GET['p']; 

$i = 0;
if(isset($_GET['i']))$i = (int)$_GET['i']; 
if($i!=0)$si = '&amp;i='.$i;
else $si = '';

$hash_time = ''; 
if(isset($_GET['t']))$hash_time = $_GET['t']; 
if(!ctype_alnum($hash_time)&&$hash_time!='')$hash_time = '';

$hash_ip = ''; 
if(isset($_GET['a']))$hash_ip = $_GET['a']; 
if(!ctype_alnum($hash_ip)&&$hash_ip!='')$hash_ip = '';

$block = ''; 
if(isset($_GET['block']))$block = $_GET['block']; 
if(preg_match('/[^.0-9]/',$block)&&$block!='')$block = '';

function nlp2nl($str) {return preg_replace("/(\r\n|\n|\r)+/", "\n", $str);}

if($hash_time!=''){
	$file = "gbcontentfile.php";
	if (!file_exists($file));
	else {
		$fcontent = @file_get_contents($file);
		$pattern = " f".$hash_time."(.*)t".$hash_time." ";
		$newcontent = ereg_replace($pattern, "", $fcontent);//I went crazy with RE's so I did it simple and stupid in 3 lines
		$newcontent = preg_replace("/[a-zA-Z0-9]{68}/", "", $newcontent);
		$newcontent = nlp2nl(str_replace('<?php /*  */ ?>','',$newcontent));
		$fh2 = fopen($file, 'w');
		fwrite($fh2, $newcontent);
		fclose($fh2);
	}
}	

if($hash_ip!=''){
	$file = "gbcontentfile.php";
	if (!file_exists($file));
	else {
		$fcontent = @file_get_contents($file);
	    $pattern = "/IP".$hash_ip."(.*?)IP".$hash_ip."/mis";
		$newcontent = preg_replace($pattern, "", $fcontent);
		$newcontent = nlp2nl(str_replace('<?php /*  */ ?>','',$newcontent));
		$fh2 = fopen($file, 'w');
		fwrite($fh2, $newcontent);
		fclose($fh2);
	}
}	

if($block!=''&&$hash_ip == md5($mysecretword.$block)){
	$file = "bips.php";
	if (!file_exists($file))touch($file);
	$fh = @fopen($file, "r");
	$fcontent = @fread($fh, filesize($file));
	$bip = "
	<?php /* ".$block." */ ?>
	";
	$towrite = "$bip $fcontent";
	fclose($fh);
	$fh2 = fopen($file, 'w+');
	fwrite($fh2, $bip);
	fclose($fh2);
}	

/*


 You are free to customize this file. Change the styles to meet your needs.
 I used W3C core stylesheets that can be found at http://www.w3.org/StyleSheets/Core/ 


*/


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/2002/REC-xhtml1-20020801/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<title><?php echo $mypagetitle; ?></title>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="STYLESHEET" type="text/css" href="http://www.w3.org/StyleSheets/Core/parser.css?family=<?php echo $i; ?>&amp;doc=XML" />
<style type="text/css">
<!--
	form {width:470px; padding:10px; border:1px solid #000;}
	fieldset {border:0px;}
	form label {clear:left; display:block; float:left; width:130px; text-align:right; padding-right:10px; color:#888; margin-bottom:0.5em;font-size:70%;}
	form input {border:1px solid #000; padding-left:0.5em; margin-bottom:0.6em;}
	div.gbsign{border:1px solid black;width:50%;margin:10px;padding:10px;}
	.gbname{font-weight:bold;color:green;}
	.gbdate{font-size:70%;margin-left:30px;}
	p.gbmessage{padding:5px;margin:15px;}
-->
</style>
</head>
<body>

<h3><?php echo $mypagetitle; ?></h3>

<!-- you can delete this paragraph after you select and link to a style -->
<p><sup>Change style: <a href="guestbook.php?i=1">Oldstyle</a> | <a href="guestbook.php?i=2">Modernist</a> | <a href="guestbook.php?i=3">Midnight</a> | <a href="guestbook.php?i=4">Ultramarine</a> | <a href="guestbook.php?i=5">Swiss</a> | <a href="guestbook.php?i=6">Chocolate</a> | <a href="guestbook.php?i=7">Traditional</a> | <a href="guestbook.php?i=8">Steely</a></sup></p>


<form method="post" action="gb-exec.php">
	<fieldset>
		<label for="name">Your name:</label>
		<input type="text" class="textfield" name="name" id="name" size="20" /><br />
		<label for="email">Your email (hidden):</label>
		<input type="text" class="textfield" name="email" id="email" size="20" /><br />
		<label for="message">Message:</label><textarea name="message" id="message" rows="4" cols="30"></textarea><br />
		<label for="spam">Type '<b><?php echo $antispam_word; ?></b>':</label>
		<input type="text" name="spam" id="spam" size="5" value="" />
		<input type="hidden" name="i" value="<?php echo $i; ?>" />
		<input type="submit" name="submit" value="Send" />
	</fieldset>
</form>

<h3>Past visitors wrote:</h3>

<?php 
$gbfile = 'gbcontentfile.php';
$fh = @fopen($gbfile, "r");
$fcontent = @fread($fh, filesize($gbfile));
if($fcontent){
	$cnt = substr_count($fcontent,'<?php /* ');
	$cnt = $cnt/2;
	$maxp = 0;
	if($cnt>$page_comments)$maxp = (int)($cnt/$page_comments);
	preg_match_all("/\<\?php .*? \?\>(.*?)\<\?php .*? \?\>/is", $fcontent, $entries);
	$ini = $page*$page_comments;
	$end = ($page+1)*$page_comments;
$ovo = array('<1>','<2>','<3>','<4>');
$sovim = array(
"<div class=\"gbsign\">
	<p><span class=\"gbname\">",
"</span> <span class=\"gbdate\">",
"</span>
	</p>
	<p class=\"gbmessage\">",
"
	</p>
</div>
"
);
	for($j=$ini;$j<$end;$j++)if(isset($entries[1][$j]))echo str_replace($ovo,$sovim,$entries[1][$j]);
	if($maxp>-1){
		echo '<p>'.strstr($fcontent,'<!--').' Page '; $gap = "";
		for($j=0;$j<$maxp+1;$j++){
			if($j==0||$j==$maxp||($j-$page)*($j-$page)<26){
				echo $gap; $gap = "";
				if($j!=$page)echo "- <a href=\"guestbook.php?p=".$j.$si."\">".($j+1)."</a> " ;
				else echo "- <b>".($j+1)."</b> " ;
			}
			else $gap = "<b>.....</b>"; 
		}
		echo '</p>';
	}
}
?>


</body>
</html>
