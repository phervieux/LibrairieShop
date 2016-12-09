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
	
	////////////////////////////////// ----- Déclarations ----- //////////////////////////////////

	/*
	//test ouput:
	echo "Titre (direct from post):   ".$_POST['title']."<br/>";
	 */

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
	$genres = $genreManager -> select();

	//If form is submitted
	if (isset($_POST['submit']) && $_POST['submit'] == 'Enregistrer'){
		// The constructor of the Book class needs an array with the datas:
		
		// We can give it the $_POST array directly:
		$mybook = new Book([]);
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
		$mybook -> setcreation_date(null);
		$mybook -> setmodif_date(null);

		//Record to the database
		if ($bookManager -> insert($mybook) != FALSE){
			echo 'Success';
		} else {
			echo 'Error';
		}

		// Checks values before recording them in database:
		echo "Titre :   ".$mybook->gettitle()."<br/>";
		echo "overview:   ".$mybook->getoverview()."<br/>";
		echo "author_sex:   ".$mybook->getauthor_sex()."<br/>";
		echo "author_name:   ".$mybook->getauthor_name()."<br/>";
		echo "author_fname:   ".$mybook->getauthor_fname()."<br/>";
		echo "year:   ".$mybook->getyear()."<br/>";
		echo "price:   ".$mybook->getprice()."<br/>";
		echo "img_cover:   ".$mybook->getimg_cover()."<br/>";
		echo "edition:   ".$mybook->getedition()."<br/>";
		echo "logistic_qnt:   ".$mybook->getlogistic_qnt()."<br/>";
		echo "FK_genre:   ".$mybook->getFK_genre()."<br/>";
		echo "creation_date:   ".$mybook->getcreation_date()."<br/>";
		echo "modif_date:   ".$mybook->getmodif_date()."<br/>";
		echo "deleted:   ".$mybook->getdeleted()."<br/>";
	}

	//HTML dynamic meta data
    $__title = 'Ajouter un livre';

	//View construction
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/head.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/nav.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/v_new_book.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/scripts.php');
?>