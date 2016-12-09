<?php 
if (!defined('INCLUDE_CHECK')) {
    http_response_code(404); die;
}
?>
<div class="container">
  <div class="row">
		<form action="" method="POST" class="form-horizontal" role="form">
			<div class="form-group">
				<label>Titre*</label>
				<input class="form-control" required type="text" id="title" name="title"/>
			</div>
			<div class="form-group">
				<label>Resumé*</label>
				<input class="form-control" required type="text" id="overview" name="overview"/>
			</div>
			<div class="form-group">
				<label>Sexe de l'auteur*</label>
				<select name="author_sex" id="author_sex" class="form-control" required>
					<option value="F">Madame</option>
					<option value="M">Monsieur</option>
				</select>
			</div>
			<div class="form-group">
				<label>Nom de l'auteur*</label>
				<input class="form-control" required type="text" id="author_name" name="author_name" maxlength="60"/>
			</div>
			<div class="form-group">
				<label>Nom complet de l'auteur*</label>
				<input class="form-control" required type="text" id="author_fname" name="author_fname"/>
			</div>
			<div class="form-group">
				<label>Année*</label>
				<input class="form-control" required type="date" id="year"  name="year"/>
			</div>
			<div class="form-group">
				<label>Genre*</label>
				<select name="type" id="type" class="form-control" required>
					<?php echo $genres; ?>
				</select>
			</div>
			<div class="form-group">
				<label>Prix*</label>
				<input class="form-control" required type="text" id="price" name="price"/>
			</div>
			<div class="form-group">
				<label>Quantité en stock*</label>
				<input class="form-control" required type="number" id="logistic_qnt" name="logistic_qnt"/>
			</div>
			<div class="form-group">
				<label>Image de couverture*</label>
				<input class="form-control" required type="text" id="img_cover" name="img_cover"/>
			</div>
			<div class="form-group">
				<label>Edition*</label>
				<input class="form-control" required type="text" id="edition" name="edition"/>
			</div>
			<div class="form-group">
				<button type="submit" name="submit" value="Enregistrer" class="btn btn-primary">Enregistrer</button>
			</div>
		</form>
	</div>
</div>
  
