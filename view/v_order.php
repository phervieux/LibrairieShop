<?php 
if (!defined('INCLUDE_CHECK')) {
    http_response_code(404); die;
}

    $output =  '<div id="cart" class="center col-xs-12 col-sm-12 col-md-offset-1 col-lg-offset-1 col-md-10 col-lg-10">'
               . '<div class="list-group"><div><h2>'.$title.'</h2></div>';
    $output.=       '<table class="table table-hover">'
                        . '<tr class="tableImportant">'
                            . '<td>N° de commande</td>'
                            . '<td>Nom d\'utilisateur</td>'
                            . '<td>Statut</td>'
                            . '<td>Date de la commande</td>'
                            . '<td class="priceColumn">Montant</td>'
                            . '<td>Actions</td>'
                        . '</tr>';
    foreach($orders as $key => $value){
        $user = $UserManager->select_by_id($value['user']);
        $output.=       '<tr>'
                            . '<td>'.$value['id'].'</td>'
                            . '<td>'.$user['username'].'</td>'
                            . '<td>'.$status[$value['status']].'</td>'
                            . '<td>'.$value['order_date'].'</td>'
                            . '<td class="priceColumn">'.$value['total_price'].'</td>'
                            . '<td><a href="one_order.php?action=view&id='.$value['id'].'"><!--i class="fa fa-eye"></i-->Voir </a>';
        if($update == 1){
            $output.=             '<a href="one_order.php?action=edit&id='.$value['id'].'"><!--i class="fa fa-edit"></i-->Modifier</a>';
        }
        $output.=             '</td>'
                      . '</tr>';
    }
    $output.=         '</table>'
               . '</div>'
            . '</div>';
    echo $output;
require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/footer.php'); 
?>
