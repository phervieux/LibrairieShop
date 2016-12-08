<?php
    //Security for views and models
    define('INCLUDE_CHECK', true);
    session_start();
    session_unset();
    session_destroy();
    
    
    //header('Location: books.php');
 