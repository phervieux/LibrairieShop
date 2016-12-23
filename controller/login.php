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
    $msg = '';

    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['submit']))
    {
        $UserManager = new UserManager();
        $userData = $UserManager -> select($_POST['username'], $_POST['password']);

        if(isset ($userData) && $userData != null)
        {
            $User = new User($userData);

            $_SESSION['id'] = $User ->getid();
            $_SESSION['username'] = $User ->getusername();
            $_SESSION['name'] = $User ->getname();
            $_SESSION['surname'] = $User ->getsurname();
            $_SESSION['email'] = $User ->getemail();
            $_SESSION['right'] = $User ->getright();

            header('Location: books.php');
        }
        else
        {
            $msg = '<p class="bg-danger">Nom d\'utilisateur ou mot de passe erroné</p>';
        }
    }

    /*echo '<pre>';
    print_r();
    echo '</pre>';*/

    //HTML dynamic meta data
    $__title = 'Connexion';

    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/head.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/nav.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/v_login.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/scripts.php');
