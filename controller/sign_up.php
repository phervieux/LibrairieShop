<?php
    //Security for views and models
    define('INCLUDE_CHECK', true);

    session_start();
    if(isset($_SESSION) && $_SESSION != null) {
        header('Location: books.php');
    }

    require_once ($_SERVER['DOCUMENT_ROOT'] . '/model/m_user_manager.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/model/m_user.php');

    $error = 0;
    $msg = '';

    $captchaimg = array(
        '1'=>'83tsU',
        '2'=>'viearer',
        '3'=>'ZZECEL'
    );

    if(!isset($_POST['submit'])) {
        $captcharnd = rand(1, 3);
        setcookie('randnb',$captcharnd);
    }

    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['submit'])) {
        if($_POST['captcha'] == $captchaimg[$_COOKIE['randnb']]) {
            $UserManager = new UserManager();
            $userData = $UserManager -> select($_POST['username'], $_POST['password']);

            if(isset ($userData) && $userData != null) {
                $User = new User($userData);

                $_SESSION['id'] = $User ->getid();
                $_SESSION['username'] = $User ->getusername();
                $_SESSION['name'] = $User ->getname();
                $_SESSION['surname'] = $User ->getsurname();
                $_SESSION['email'] = $User ->getemail();
                $_SESSION['right'] = $User ->getright();

                header('Location: books.php');
            } else {
                $error = 2;
            }
        } else {
            $error = 1;
        }
        if($error == 1) {
        $msg = '<p class="bg-danger">Merci de vérifier le CAPTCHA</p>';
        }
        elseif($error == 2) {
            $msg = '<p class="bg-danger">Nom d\'utilisateur ou mot de passe erroné</p>';
        }
        $captcharnd = rand(1, 3);
        setcookie('randnb',$captcharnd);
    }
    //HTML dynamic meta data
    $__title = 'Création d\'un compte';

    $captcha = '<img alt="captcha" src="../images/captcha/captcha'.$captcharnd.'.png"/>';

    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/head.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/nav.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/v_sign_up.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/scripts.php');
