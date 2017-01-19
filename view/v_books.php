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
    
    <?php
        //  Panier
        require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/v_cart.php');
    ?>
  </div>
  <?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/footer.php'); ?>
</div>
