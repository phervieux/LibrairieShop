<?php
    //Security for views and models
    define('INCLUDE_CHECK', true);
    
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/model/m_user_manager.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/model/m_user.php');
    $res = $odbc->query('SELECT * FROM user');
    
    if (isset($_POST['username']) && isset($_POST['password'])){
        session_start();
        
        $UserManager = new UserManager();
        $userData = $UserManager -> select($_POST['username'], $_POST['password']);
        
        $User = new User($userData);
        
        $_SESSION['id'] = $User ->getid();
        $_SESSION['username'] = $User ->getusername();
        $_SESSION['name'] = $User ->getname();
        $_SESSION['surname'] = $User ->getsurname();
        $_SESSION['email'] = $User ->getemail();
    }
    
    echo '<pre>';
    print_r($res);