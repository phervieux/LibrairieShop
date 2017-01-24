<?php 
if (!defined('INCLUDE_CHECK')) {
    http_response_code(404); die;
}

if (strpos($bookinfos[7], '.') !== FALSE)
	$price = $bookinfos[7];
else 
	$price = $bookinfos[7].'.-';
?>
<div class="container">
  <div class="row row-offcanvas row-offcanvas-right">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
      	<img class="admin-book-img" src="../images/books/<?php echo $bookinfos[8]; ?>"><br>
				<h1><?php echo $bookinfos[1]; ?></h1>
				<h3>CHF <?php echo $price; ?></h3>
				<?php echo "<button class=\"btn\" onclick=\"add(".$bookinfos[0].")\"><i class=\"fa fa-shopping-cart\"></i> Ajouter au panier</button>"; ?>
				<?php if ($_SESSION['right'] == 1) {echo "<a href=\"modif_book.php?book=".$bookinfos[0]."\"><button class=\"admin-menu btn\"><i class=\"fa fa-edit\"></i> Modifier</button></a>";} ?>
				<hr>
				<h3>Auteur</h3>
				<?php if($bookinfos[3] == 'M'){$bookinfos[3] = 'Monsieur';} else {$bookinfos[3] = 'Madame';}?>
				<span><?php echo $bookinfos[3].' '.$bookinfos[5].' '.$bookinfos[4]; ?></span>
				<hr>
				<b>Resumé: </b><br>
				<pre><?php echo $bookinfos[2]; ?></pre>
				<hr>
				<b>Edition: </b> <span><?php echo $bookinfos[9]; ?></span><br>
				<b>Année d'édition: </b> <span><?php echo $bookinfos[6]; ?></span><br>
				<b>Genre: </b> <span><?php echo $bookinfos[11]; ?></span><br>
				<b>Quantité en stock: </b> <span><?php echo $bookinfos[10]; ?></span><br>
				<hr>
				<h3>Commentaires</h3>
				<?php echo $HTMLlayout; ?>
				<hr>
				<form method="POST" class="form-vertical" id="new_comment">
					<div class="form-group">
						<textarea class="form-control" name="comment" id="comment" placeholder="Veuillez écrire votre commentaire ..." data-validation="required length" data-validation-length="20-1500"></textarea>
					</div>
					<div class="form-group text-center">
						<span class="text-danger"><?php if (isset($return_f)) {echo $return_f;} ?></span>
						<span class="text-success"><?php if (isset($return_s)) {echo $return_s;} ?></span>
					</div>
                                        <div class="form-group">
                                            <?php echo $captcha; ?>
                                            <input name="captcha" type="text" class="form-control" id="exampleInputPassword1" placeholder="Captcha"/>
                                        </div>
					<div class="form-group">
						<button type="submit" name="submit" value="Soumettre" class="btn btn-primary">Soumettre</button>
					</div>
                                        
				</form>
		</div>
    
  <?php 
  require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/v_cart.php');
  require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/footer.php'); 
  ?>