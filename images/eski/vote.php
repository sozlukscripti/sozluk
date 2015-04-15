<?php
header ("Content-Type: text/html; charset=iso-8859-9");
?>
<?php
/****************************************************************************
 * DRBPoll
 * http://www.dbscripts.net/poll/
 * 
 * Copyright © 2007 Don B 
 ****************************************************************************/
 
require_once('poll.php');

function show_error() {
	global $vote_error_message;
	echo(htmlspecialchars($vote_error_message));
}

// Handle action
if(isset( $_POST[$POLL_ID_PARAM_NAME] ) && isset( $_POST[$VOTE_PARAM_NAME] )) {
	
	// Reset error message
	global $vote_error_message;
	$vote_error_message = NULL;
	
	// Get parameter values from post
	$poll_id = trim($_POST[$POLL_ID_PARAM_NAME]);
	$vote = trim($_POST[$VOTE_PARAM_NAME]);
	
	// For use in template functions
	global $requested_poll_id;
	$requested_poll_id = $poll_id;
	
	// Attempt to add a new rating
	if(add_new_vote($poll_id, $vote) === TRUE) {
		
		// Display success page
		include_once('success.php');
		
	} else {
		
		// Display error page
		include_once('failuree.php');
		
	}
	
} else {

	die("yanlis istek.");
	
}
	
?>
