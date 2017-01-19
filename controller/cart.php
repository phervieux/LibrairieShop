<?php
	////////////////////////////////// ---------- Entête du programme ---------- //////////////////////////////////
	#################################################################
	#                                                               #
	#	Programme:          LibraryShop                         #
	#	Auteur:             Miguel Jalube                       #
	#                                                               #
	#################################################################
	#                                                               #
	# 	Date :              Decembre 2016                       #
	#	Version :           1.0                                 #
	#	Révisions :                                             #
	#                                                               #
	#################################################################
	#                                                               #
	#	Get administration adding book informations             #
	#                                                               #
	#################################################################
	
	////////////////////////////////// ----- Déclarations ----- //////////////////////////////////

//Security for views and models
    define('INCLUDE_CHECK', true);

    session_start();
    
    // Recuperation de l'ID
    if(isset($_GET['action']) && isset($_GET['id']) && is_numeric($_GET['id']) && is_numeric($_GET['action'])){
        $id = $_GET['id'];
        $action = $_GET['action'];
    }
    
/*  Effectue les differentes actions :
 *  0 => Ajouter au panier
 *  1 => Enlever du panier
 *  2 => Incrémenter la quantité
 *  3 => Diminuer la quantité
 */
    
//  Ajouter au panier
    if($action == 0){
        $updated = 0;
        if(isset($_SESSION['cart'])){
            $cart = unserialize($_SESSION['cart']);
            foreach ($cart as $k => $v) {
                if($v['id'] == $id){
                    $cart[$k]['amount']++;
                    $updated = 1;
                }
            }
        }else{
            $cart = array();
        }
        if($updated == 0){
            $cart[] = array('id' => $id, 'amount' => 1);
        }
        
        echo '<pre style="background:lightblue;">';
        print_r($cart);
        echo '</pre>';

//  Enlever du panier
    }elseif($action == 1){
        if(isset($_SESSION['cart'])){
            $cart = unserialize($_SESSION['cart']);
            
            $key = null;
            //  S'il larticle qui va être ajouté existe déjà dans le panier on augmente la quantité
            foreach ($cart as $k => $v) {
                if($v['id'] == $id){
                    $key = $k;
                }
            }
            array_splice($cart, $key, 1);
        }
        
        echo '<pre style="background:lightred;">';
        print_r($cart);
        echo '</pre>';
        
//  Incrémenter la quantité
    }elseif($action == 2){
        if(isset($_SESSION['cart'])){
            $cart = unserialize($_SESSION['cart']);
            foreach ($cart as $k => $v) {
                if($v['id'] === $id){
                    $key = $k;
                }
            }
            if(isset($key)){
                $cart[$key]['amount']++;
            }
        }
        
        echo '<pre style="background:lightgreen;">';
        print_r($cart);
        echo '</pre>';
        
//  Diminuer la quantité
    }elseif($action == 3){
        if(isset($_SESSION['cart'])){
            $cart = unserialize($_SESSION['cart']);
            foreach ($cart as $k => $v) {
                if($v['id'] === $id){
                    $key = $k;
                }
            }
            if(isset($key)){
                if($cart[$key]['amount'] > 1){
                    $cart[$key]['amount']--;
                }else{
                    array_splice($cart, $key, 1);
                }
            }
        }
        
        echo '<pre style="background:lightgrey;">';
        print_r($cart);
        echo '</pre>';
        
    }else{
        echo '<h1>Erreur 404</h1>';
    }
    
//  Si le panier est vide la variable de session est unset pour ne pas faire des requetes dans le vide
    if(isset($cart[0])){
        $_SESSION['cart'] = serialize($cart);
    }else{
        unset($_SESSION['cart']);
    }
    header('Location: books.php');
    
