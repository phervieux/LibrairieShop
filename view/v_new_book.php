<?php 
if (!defined('INCLUDE_CHECK')) {
    http_response_code(404); die;
}
?>
<div class="container">
  <div class="row row-offcanvas row-offcanvas-right">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="list-group">
        <span class="list-group-item active"><h3>Mon panier</h3></span>
        <span class="list-group-item">
            Product<br><i>Quantité: 1</i><br>
            <b class="pull-left">CHF 50.- </b><br>
            <span class="pull-right">
            <a href=""><i class="fa fa-trash-o"></i></a>
            <a href=""><i class="fa fa-plus"></i></a>
            <a href=""><i class="fa fa-minus"></i></a>
            </span><br>
        </span>
        <span class="list-group-item">
            Product<br><i>Quantité: 1</i><br>
            <b class="pull-left">CHF 50.- </b><br>
            <span class="pull-right">
            <a href=""><i class="fa fa-trash-o"></i></a>
            <a href=""><i class="fa fa-plus"></i></a>
            <a href=""><i class="fa fa-minus"></i></a>
            </span><br>
        </span>
        <span class="list-group-item">
            Product<br><i>Quantités: 2</i><br>
            <b class="pull-left">CHF 50.- </b><br>
            <span class="pull-right">
            <a href=""><i class="fa fa-trash-o"></i></a>
            <a href=""><i class="fa fa-plus"></i></a>
            <a href=""><i class="fa fa-minus"></i></a>
            </span><br>
        </span>
        <span class="list-group-item">
            <button type="button" class="btn btn-primary"><i class="fa fa-trash-o"></i></button>
            <button type="button" class="btn btn-primary">Payer</button>
        </span>
      </div>
    </div>
  </div>
  <?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/footer.php'); ?>
</div>
