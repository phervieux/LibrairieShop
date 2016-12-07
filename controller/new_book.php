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
	#	Révisions :		-
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
	
	// Include file containing class Book
	$path = $_SERVER['DOCUMENT_ROOT']."/model/m_book.php";
	
	require_once "$path";

	// The constructor of the Book class needs an array with the datas:
	// We can give it the $_POST array directly:
	$values = array(
					"title" => $_POST['title'],
					"id" => $_POST['id'],
					"overview" => $_POST['overview'],
					"author_sex" => $_POST['author_sex'],
					"author_name" => $_POST['author_name'],
					"author_fname" => $_POST['author_fname'],
					"year" => $_POST['year'],
					"price" => $_POST['price'],
					"img_cover" => $_POST['img_cover'],
					"edition" => $_POST['edition'],
					"logistic_qnt" => $_POST['logistic_qnt'],
					"FK_genre" => $_POST['type'],
					"creation_date" => $_POST['creation_date'],
					"modif_date" => "today",
					"deleted" => 0,);
	$mybook = new Book(/*$_POST[]*/$values);
	
	// Checks values before recording them in database:
	echo "Titre :   ".$mybook->gettitle()."<br/>";
	echo "id  :   ".$mybook->getid()."<br/>";
	echo "overview  (de mybook.get...):   ".$mybook->getoverview()."<br/>";
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
	echo "OK, ça marche...<br/>";
	
?>