<?php
    //Security check - Logged in 
	require_once $_SERVER['DOCUMENT_ROOT']."/security_checks/check_session.php";

	//Security for views and models
    define('INCLUDE_CHECK', true);

	// Include required files
	require_once $_SERVER['DOCUMENT_ROOT']."/model/m_book_manager.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/model/m_comment.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/model/m_comment_manager.php";
	
	//Init BookManager
	$bookManager = new BookManager();
	$commentManager = new CommentManager();

	 //  transforme $_SESSION['cart'] en tableau s'il existe
    if(isset($_SESSION['cart'])){
        $cart = unserialize($_SESSION['cart']);
    }
    
    //  Selectionne les données du panier dans la base de données
    if(isset($cart[0])){
        $cartBookList = $bookManager->select_items($cart);
    }

	//HTML dynamic meta data
    $__title = 'Commentaires';

	//Get all comments from the user
	function get_user_comments($commentManager){
		$comments = $commentManager -> select_user_comments($_SESSION['id']);
        $HTMLlayout = null;
        if (!empty($comments)) {
            foreach ($comments as $comment) {
                //Layout
				//Dates format
				$comment[2] = new DateTime($comment[2]); 
				$comment[2] = $comment[2] -> format('d.m.Y H:i:s');

				//Status of the comment
				if ($comment[3] == 0) {$comment[3] = 'à valider';}
				else if ($comment[3] == 1) {$comment[3] = 'validé';}
				else if ($comment[3] == 2) {$comment[3] = 'refusé';}
				else {$comment[3] = 'inconnu';}

                $HTMLlayout .= "<tr>
								<td>".nl2br(htmlentities($comment[1]))."</td>
								<td>".htmlentities($comment[2])."</td>
								<td>".htmlentities($comment[3])."</td>
								<td>
									<a target=\"_blank\" href=\"view_book.php?book=".$comment[4]."\">".$comment[5]."</a>
								</td>
								<td>
									<a alt=\"Supprimer\" href=\"my_comments.php?wtd=del&comm=".$comment[0]."\"><button class=\"admin-menu btn\"><i class=\"fa fa-trash\"></i></button></a>
								</td>
								</tr>";
            }
        } else
            $HTMLlayout = null;
		return $HTMLlayout;
	}
	
	$HTMLlayout = get_user_comments($commentManager);

	//URL actions
	if (isset($_GET['wtd']) && isset($_GET['comm'])){
		$comment = new Comment([]);
		$comment -> setid($_GET['comm']);
		$comment -> setuser($_SESSION['id']);
		if ($_GET['wtd'] == 'del'){
			//UPDATE t_comment del = 1
			if ($commentManager -> soft_delete_user($comment) != FALSE)
				$return_s = "Commentaire ID: ".htmlentities($_GET['comm'])." supprimé";
			else 
				$return_f = "Commentaire ID: ".htmlentities($_GET['comm'])." - une erreur c'est produite";
		}
		$HTMLlayout = get_user_comments($commentManager);
	}

    //View construction
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/head.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/nav.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/v_my_comments.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/scripts.php');
?>