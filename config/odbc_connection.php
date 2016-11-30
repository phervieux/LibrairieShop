<?php
if (!defined('INCLUDE_CHECK')) {
    http_response_code(404); die;
}

//Establish the connection
$odbc = new PDO('odbc:Driver={Microsoft Access Driver (*.mdb)};Dbq='.$_SERVER['DOCUMENT_ROOT'].'/DATABASE/projet151.accdb;Uid=');

//hide sensible information on PDO errors
$odbc -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>