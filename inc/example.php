<? include "config.php";?>
<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?echo $sitename;?> Yeni Modunu Seçiyor</title>
<link href="poll/template/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1><?echo $sitename;?> Yeni Modunu Seçiyor</h1>

<p>
<?echo $sitename;?> mod seçimi için lütfen oyunuzu veriniz...
</p>

<h2>Oylama</h2>
<?php

	// The two lines below are all that is required to add a poll 
	// to your page.  Obviously, these need to be placed within  
	// a PHP code block inside a valid PHP page.  You will also need to 
	// configure the settings in config.php properly, where you will 
	// also define your polls.
	//  
	// Modify these lines as follows: 
	//
	// * Change the include path to reflect where DRBPoll is installed.  
	// * Change the parameter for show_vote_control() to reflect the unique  
	//   ID for the poll on this page.  This feature allows you to store  
	//   data for more than one poll using the same installation of DRBPoll.
	//   New polls must be added to the $VALID_POLLS array in config.php. 
	
	require_once('poll/poll.php');
	show_vote_control('1');
	
	// More than one poll can be displayed on the same page; here's 
	// another example:
	?><?php /*<h2>Poll 2</h2> */ ?><?php 
	/*show_vote_control('2');*/
	
?> 
</body>
</html>