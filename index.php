<?php

//  Autoload
function __autoload($class_name){
    if(file_exists($class_name . '.class.php')){
        require_once $class_name . '.class.php';
    }
}

?>