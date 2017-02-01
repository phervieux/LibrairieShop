<?php
	////////////////////////////////// ---------- Entête du programme ---------- //////////////////////////////////
	#################################################################
	#
	#	Programme:          LibraryShop
	#	Auteur:             Miguel Jalube
	#
	#################################################################
	#
	# 	Date :              Decembre 2016
	#	Version :           1.0
	#	Révisions :		
	#
	#################################################################
	#
	#	Get administration adding book informations
	#
	#################################################################
	
	////////////////////////////////// ----- Déclarations ----- //////////////////////////////////

//Security for views and models
    define('INCLUDE_CHECK', true);
    
    session_start();
    if(!isset($_SESSION['id'])){
        header('Location: books.php');
    }
    
//  Models requirements
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/model/m_book_manager.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/model/m_order_manager.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/model/m_user_manager.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/model/m_order.php');
    

        
//  Required objects
    $UserManager = new UserManager();
    $OrderManager = new OrderManager();
    $BookManager = new BookManager();
    $tva = 0.08;
    
//  Status 0 = new / 1 = en cours / 2 = livré 
    $status = array('Nouvelle', 'Validée', 'Payée', 'Epediée', 'Cloturée');
    
//  Order update
    if(isset($_POST['status']) && isset($_POST['id'])){
        $Order = new Order($_POST);
        $OrderManager->update($Order);
    }
    
    if(isset($_GET['id'])){
        $order = $OrderManager->select_by_id($_GET['id']);
        $order = $order[0];
        
        $user = $UserManager->select_by_id($order['user']);
        if(isset($order['bookqnt'])){
            $cart = unserialize($order['bookqnt']);
        }

        if(isset($cart[0])){
            $cartBookList = $BookManager->select_items($cart);
        }
        
        $verifStock = array();
        foreach($cartBookList as $key => $value){
            
            
            foreach($cart as $v){
                if($value['id'] === $v['id']){
                    $amount = floatval($v['amount']);
                    $id = $v['id'];
                }
            }
        
            $price = floatval($value['price']);
            $price = number_format($price, 2);

            $priceAmount = $amount * $price;
            $prices[] = $priceAmount;
            
            if($amount >= $value['logistic_qnt']){
                $checkStock[$key] = 1;
            }else{
                $checkStock[$key] = 0;
            }
        }
        $stock = 1;
        
        foreach($checkStock as $key => $value){
            if(!$checkStock){
                $stock = 0;
            }
        }
        
        if($stock == 0){
            $interval = '+15 days';
        }else{
            $interval = '+3 days';
        }
        
        $orderDate = new DateTime($order['order_date']);
        $deliveryDate = new DateTime($order['order_date']);
        $deliveryDate->add(DateInterval::createFromDateString($interval));
        $total = number_format(array_sum($prices), 2);
    }else{
        $order = null;
    }

    $__title = 'Aperçu de commande';
    
//  View construction
        require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/head.php');
        require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/nav.php');
        require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/v_one_order.php');
        require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/scripts.php');