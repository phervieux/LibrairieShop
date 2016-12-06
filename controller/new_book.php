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

	// Include file containing class Book
	include '../model/m_book.php';
	
	//test ouput:
	echo "Titre (direct from post):   ".$_POST['title']."<br/>";
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
	
	// Test:
	echo "Titre  (de mybook.get...):   ".$mybook->gettitle()."<br/>";
	echo "ID  (de mybook.get...):   ".$mybook->getid()."<br/>";
	echo "OK, ça marche...<br/>";
?>