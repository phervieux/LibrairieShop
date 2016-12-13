<?php
    //Security for views and models
    define('INCLUDE_CHECK', true);
    
    session_start();
    if(isset($_SESSION) && $_SESSION != null){
        header('Location: books.php');
    }
    
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/model/m_user_manager.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/model/m_user.php');
    
    $view = 'v_login';
    if (isset($_POST['username']) && isset($_POST['password'])){        
        $UserManager = new UserManager();
        $userData = $UserManager -> select($_POST['username'], $_POST['password']);
        
        if(isset ($userData) && $userData != null){
            $User = new User($userData);
            
            $_SESSION['id'] = $User ->getid();
            $_SESSION['username'] = $User ->getusername();
            $_SESSION['name'] = $User ->getname();
            $_SESSION['surname'] = $User ->getsurname();
            $_SESSION['email'] = $User ->getemail();
            $_SESSION['right'] = $User ->getright();

            header('Location: books.php');
        }else{
            $view = 'v_login_error';
        }
    }
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/head.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/nav.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/'.$view.'.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/scripts.php');