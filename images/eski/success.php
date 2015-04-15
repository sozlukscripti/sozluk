<?php
header ("Content-Type: text/html; charset=iso-8859-9");
?>
<?php

	/*
	 * You may customize this page with your own success message. 
	 */

?>
<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>18mart sozluk</title>
<link href="template/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>Oyunuz alindi.</h1>

<p>Oyunuz ankete eklenmi$tir.  Te$ekkurler!</p>

<?php //the_current_poll_results(); ?>

<p><a href="<?php the_return_to_url(); ?>">Geri Don</a></p>

<?php 
/* DO NOT ALTER OR REMOVE THE CREDIT BELOW, PER LICENSE! */
the_credits();
/* END CREDIT */ 
?>

</body>
</html>