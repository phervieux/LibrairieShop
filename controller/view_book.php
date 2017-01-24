<?php
    //Security for views and models
    define('INCLUDE_CHECK', true);

	//Security check - Logged in 
	require_once $_SERVER['DOCUMENT_ROOT']."/security_checks/check_session.php";

	// Include required files
	require_once $_SERVER['DOCUMENT_ROOT']."/model/m_book_manager.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/model/m_genre_manager.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/model/m_comment.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/model/m_comment_manager.php";
	//Init BookManager
	$bookManager = new BookManager();
	$genreManager = new GenreManager();
	$commentManager = new CommentManager();

	 //  transforme $_SESSION['cart'] en tableau s'il existe
    if(isset($_SESSION['cart'])){
        $cart = unserialize($_SESSION['cart']);
    }
    
    //  Selectionne les données du panier dans la base de données
    if(isset($cart[0])){
        $cartBookList = $bookManager->select_items($cart);
    }

	//Get genres to create select in HTML + Book infos
	$bookinfos = $bookManager -> select_item($_GET['book']);
	$genres = $genreManager -> select($bookinfos[11]);

	//HTML dynamic meta data
    $__title = $bookinfos[1];

	//Get validated comments
	$comments = $commentManager -> select($_GET['book']);
        $HTMLlayout = null;
        if (!empty($comments)) {
            foreach ($comments as $comment) {
                //Layout
                $HTMLlayout .= "<pre>$comment[1]</pre>
				<small></small>\n\r";
            }
        } else
            $HTMLlayout = 'Aucun commentaire!';
        
        //  Captcha
        $captchaimg = array(
        '1'=>'83tsU',
        '2'=>'viearer',
        '3'=>'ZZECEL'
        );
        if(!isset($_POST['submit'])){
            $captcharnd = rand(1, 3);
            $_SESSION['randnb'] = $captcharnd;
        }
        
	//Form submit
	if (isset($_POST['submit']) && ($_POST['submit'] == 'Soumettre')){
                if(isset($_POST['captcha']) && $_POST['captcha'] == $captchaimg[$_SESSION['randnb']]){
                    $comment = new Comment([]);
                    $comment -> setuser($_SESSION['id']);
                    $comment -> setcomment($_POST['comment']);
                    $comment -> setstatus(0);
                    $comment -> setFK_book($_GET['book']);
                    $comment -> setcreation_date(null);
                    $comment -> setdeleted(0);
                    //Record to the database
                    if ($insertedid = $commentManager -> insert($comment) != FALSE){
                            $return_s =  'Commentaire enregistré. La validation est en cours!<br>';
                    } else {
                            $return_f =  'Commentaire non enregistré<br>';
                    }
                }else{
                    $return_f =  'Captcha incorrect<br>';
                }
                $captcharnd = rand(1, 3);
                $_SESSION['randnb'] = $captcharnd;
	}
        
        $captcha = '<img alt="captcha" src="../images/captcha/captcha'.$captcharnd.'.png"/>';
    
    //View construction
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/head.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/nav.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/v_view_book.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/scripts.php');
?>