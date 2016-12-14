<?php
    //Security for views and models
    define('INCLUDE_CHECK', true);
    
    session_start();
    if(isset($_SESSION) && $_SESSION != null){
        header('Location: books.php');
    }
    
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/model/m_user_manager.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/model/m_user.php');
    
    $error = 0;    
    if (isset($_POST['username']) && isset($_POST['password'])){        
        $UserManager = new UserManager();
        $userData = $UserManager -> select($_POST['username'], $_POST['password']);
        
        if(!isset($_POST['g-recaptcha-response']) || $_POST['g-recaptcha-response'] == null){
            $error = 1;
        }elseif(isset ($userData) && $userData != null){
            $User = new User($userData);
            
            $_SESSION['id'] = $User ->getid();
            $_SESSION['username'] = $User ->getusername();
            $_SESSION['name'] = $User ->getname();
            $_SESSION['surname'] = $User ->getsurname();
            $_SESSION['email'] = $User ->getemail();
            $_SESSION['right'] = $User ->getright();

            header('Location: books.php');
        }else{
            $error = 2;
        }
    }
    /*echo '<pre>';
    print_r();
    echo '</pre>';*/
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/head.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/nav.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/v_login.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/scripts.php');