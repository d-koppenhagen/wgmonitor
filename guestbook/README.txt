##############################################
#Simple File Based PHP Guestbook Instructions#
##############################################



0. Important: most recent version of this guestbook and instructions is available only at http://www.inverudio.com/guestbook/
	There are few other sites that offer download of an older version. 



1. Edit in text editor file 'mygb.php' and replace email address 'you@email.com' with yours, secret word 'topsecret' with something more secret, and you can change other parameters too.



2. If you want to change the look of the guestbook, edit 'guestbook.php' file. Specifically, styles are defined in these lines.


<link rel="STYLESHEET" type="text/css" href="http://www.w3.org/StyleSheets/Core/parser.css?family=<?php echo (int)$_GET['i']; ?>&amp;doc=XML" />
<style type="text/css">
<!--
...
-->
</style>



3. If you also know PHP/HTML, you can move comment form related code to some other website page:


<form method="post" action="gb-exec.php">
	<fieldset>
		<label for="name">Your name:</label>
		<input type="text" class="textfield" name="name" id="name" size="20" /><br />
		<label for="email">Your email (it will not be visible):</label>
		<input type="text" class="textfield" name="email" id="email" size="20" /><br />
		<label for="message">Message:</label><textarea name="message" id="message" rows="4" cols="30"></textarea><br />
		<label for="spam">Type '<b><?php echo $antispam_word; ?></b>':</label>
		<input type="text" name="spam" id="spam" size="5" value="" />
		<input type="hidden" name="i" value="<?php echo (int)$_GET['i']; ?>" />
		<input type="submit" name="submit" value="Send" />
	</fieldset>
</form>

 

4. If you have any questions/problems not solved by this instructions, read more here: http://www.inverudio.com/guestbook/
