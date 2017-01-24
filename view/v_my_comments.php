<?php 
if (!defined('INCLUDE_CHECK')) {
    http_response_code(404); die;
}
?>
<div class="container">
  <div class="row row-offcanvas row-offcanvas-right">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		<h1>Commentaires</h1>
		<span class="text-danger"><?php if (isset($return_f)) {echo $return_f;} ?></span>
		<span class="text-success"><?php if (isset($return_s)) {echo $return_s;} ?></span><hr>
		<table class="table" data-sorting="true" data-filtering="true" data-paging="true">
			<thead>
			<tr>
				<th data-type="html" data-breakpoints="all">Commentaire</th>
				<th>Publié le</th>
				<th>Etat</th>
				<th data-type="html" data-breakpoints="all">Livre </th>
				<th data-type="html"> </th>
			</tr>
			</thead>
			<tbody>
				<?php echo $HTMLlayout; ?>
			</tbody>
		</table>
	</div>
  <?php 
  require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/v_cart.php');
  require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/footer.php'); 
  ?>
