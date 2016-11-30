<?php
    //Security for views and models
    define('INCLUDE_CHECK', true);
    
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/config/odbc_connection.php');
    $res = $odbc->query('SELECT * FROM user');
    
    echo '<pre>';
    print_r($res);