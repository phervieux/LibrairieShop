<?php 
if (!defined('INCLUDE_CHECK')) {
    http_response_code(404); die;
}
?>
<div class="container">
  <div class="row row-offcanvas row-offcanvas-right">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
      <table class="table" data-sorting="true" data-filtering="true" data-paging="true">
        <thead>
          <tr>
            <th data-breakpoints="xs sm" data-type="html">Couverture</th>
            <th>Title</th>
            <th data-breakpoints="all">Genre</th>
            <th data-breakpoints="all">Overview</th>
            <th data-breakpoints="all">Année</th>
            <th data-breakpoints="all">Auteur</th>
            <th>Prix</th>
            <th data-breakpoints="xs sm">Edition</th>
            <th>en stock?</th>
            <th data-type="html"> </th>
          </tr>
        </thead>
        <tbody>
          <?php echo $HTMLlayout; ?>
        </tbody>
      </table>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
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
            Product<br><i>Quantité: 1</i><br>
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
