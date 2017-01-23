<?php
	//Check if session is opened
	if ($_SESSION['right'] != 1){
		http_response_code(401);
	}
?>