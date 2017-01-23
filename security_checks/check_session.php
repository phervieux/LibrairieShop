<?php
	//Start the session 
	session_start();

	//Check if session is opened
	if (!isset($_SESSION['id'])){
		http_response_code(401);
	}
?>