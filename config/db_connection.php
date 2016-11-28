<?php
if (!defined('INCLUDE_CHECK')) {
    http_response_code(404); die;
}

//Establish the connection
$db = new PDO('mysql:host=localhost;dbname=projet151;port=3306;charset=utf8', 'projet151', 'projet151');

//hide sensible information on PDO errors
$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>