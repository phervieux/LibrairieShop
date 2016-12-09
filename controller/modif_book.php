<?php
	////////////////////////////////// ---------- Entête du programme ---------- //////////////////////////////////
	#################################################################
	#
	#	Programme:		testLibraryShop.php	!!! Essai de formulaire !!!
	#	Auteur:		Raphaël Dufour
	#
	#################################################################
	#
	# 	Date :		Decembre 2016
	#	Version :		1.0
	#	Révisions :		1.1 - David Miranda - TG-34
	#
	#################################################################
	#
	#	Get administration adding book informations
	#
	#################################################################
	
	//i//////////////////////////////// ----- Déclarations ----- //////////////////////////////////

	//Security for views and models
    define('INCLUDE_CHECK', true);
	
	
	// Include file containing class Book
	require_once $_SERVER['DOCUMENT_ROOT']."/model/m_book.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/model/m_book_manager.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/model/m_genre_manager.php";

	//Init BookManager
	$bookManager = new BookManager();
	$genreManager = new GenreManager();

	//Get genres to create select in HTML
	$bookinfos = $bookManager -> select_item($_GET['book']);
	$genres = $genreManager -> select($bookinfos[11]);

	//If form is submitted
	if (isset($_POST['submit']) && $_POST['submit'] == 'Enregistrer'){
		// The constructor of the Book class needs an array with the datas:
		
		// We can give it the $_POST array directly:
		$mybook = new Book([]);
		$mybook -> setid($_GET['book']);		
		$mybook -> settitle($_POST['title']);
		$mybook -> setoverview($_POST['overview']);
		$mybook -> setauthor_sex($_POST['author_sex']);
		$mybook -> setauthor_name($_POST['author_name']);
		$mybook -> setauthor_fname($_POST['author_fname']);
		$mybook -> setyear($_POST['year']);
		$mybook -> setprice($_POST['price']);
		$mybook -> setimg_cover($_POST['img_cover']);
		$mybook -> setedition($_POST['edition']);
		$mybook -> setlogistic_qnt($_POST['logistic_qnt']);
		$mybook -> setFK_genre($_POST['type']);
		$mybook -> setdeleted(0);
		$mybook -> setmodif_date(null);

		//Modif in the database
		if ($bookManager -> update($mybook) != FALSE){
			$return_s =  'Formulaire enregistré correctement<br>';
			$bookinfos = $bookManager -> select_item($_GET['book']);
			$genres = $genreManager -> select($bookinfos[11]);
		} else {
			$return_f =  'Formulaire non enregistré<br>';
		}
	}

	//HTML dynamic meta data
    $__title = 'Ajouter un livre';

	//View construction
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/head.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/nav.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/v_modif_book.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/scripts.php');
?>
