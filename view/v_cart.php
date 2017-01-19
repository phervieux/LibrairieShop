<?php 
if (!defined('INCLUDE_CHECK')) {
    http_response_code(404); die;
}
//  Définition de l'affichage du panier
    $output =  '<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="list-group">
                        <span class="list-group-item active"><h3>Mon panier</h3></span>';

    if(isset($cartBookList)){
        $total = array();
        foreach($cartBookList as $key => $value){
            
//  Détermine la quantité d'un produit grâce à son id
            foreach($cart as $v){
                if($value['id'] === $v['id']){
                    $amount = floatval($v['amount']);
                    $id = $v['id'];
                }
            }

//  Met le prix au type flotant et le format à deux chiffre après la virgule
            $price = floatval($value['price']);
            $price = number_format($price, 2);
            $output .= '<span class="list-group-item">
                      '.$value['title'].'<br><i>Quantité: '.$amount.'</i><br>
                      <b class="pull-left">CHF '.$price.'</b><br>
                      <span class="pull-right">
                      <a href="./cart.php?action=1&id='.$value['id'].'"><i class="fa fa-trash-o"></i></a>
                      <a href="./cart.php?action=2&id='.$value['id'].'"><i class="fa fa-plus"></i></a>
                      <a href="./cart.php?action=3&id='.$value['id'].'"><i class="fa fa-minus"></i></a>
                      </span><br>
                  </span>';

//  Additionne au prix total
            $priceAmount = $amount * $price;
            $total[] = $priceAmount;
        }
        
//  Affiche le prix total
        $output.= '      <span class="list-group-item">
                    <strong>Total : CHF '.number_format(array_sum($total), 2).'</strong>
                    </span>
                    <span class="list-group-item">
                        <button type="button" class="btn btn-primary"><i class="fa fa-trash-o"></i></button>
                        <button type="button" class="btn btn-primary">Payer</button>
                    </span>';

//  Affiche panier vide
    }else{
        $output .=  '<span class="list-group-item">
                        <strong>Panier vide</strong>
                    </span>';
    }
    $output.= '</div></div>';
    echo $output;
?>