<?php 
if (!defined('INCLUDE_CHECK')) {
    http_response_code(404); die;
}
?>
<div class="container">
  <div class="row">
		<form action="" method="POST" class="form-horizontal" role="form">
			<div class="form-group">
				<span class="text-danger"><?php if (isset($return_f)) echo $return_f; ?></span>
				<span class="text-success"><?php if (isset($return_s)) echo $return_s; ?></span>
				<label>id</label>
				<input class="form-control" name="id" id="id" required disabled value="<?php echo $bookinfos[0]; ?>">
			</div>
			<div class="form-group">
				<label>title</label>
				<input class="form-control" name="title" id="title" required value="<?php echo $bookinfos[1]; ?>">
			</div>
			<div class="form-group">
				<label>overview</label>
				<input class="form-control" name="overview" id="overview" required value="<?php echo $bookinfos[2]; ?>">
			</div>
			<div class="form-group">
				<label>Sexe de l'auteur*</label>
				<select name="author_sex" id="author_sex" class="form-control" required>
					<option <?php if($bookinfos[3] == 'F') echo 'selected'; ?> value="F">Madame</option>
					<option <?php if($bookinfos[3] == 'M') echo 'selected'; ?> value="M">Monsieur</option>
				</select>
			</div>
			<div class="form-group">
				<label>author_name</label>
				<input class="form-control" name="author_name" id="author_name" required value="<?php echo $bookinfos[4]; ?>">
			</div>
			<div class="form-group">
				<label>author_fname</label>
				<input class="form-control" name="author_fname" id="author_fname" required value="<?php echo $bookinfos[5]; ?>">
			</div>
			<div class="form-group">
				<label>year</label>
				<input class="form-control" name="year" id="year" required value="<?php echo $bookinfos[6]; ?>">
			</div>
			<div class="form-group">
				<label>price</label>
				<input class="form-control" name="price" id="price" required value="<?php echo $bookinfos[7]; ?>">
			</div>
			<div class="form-group">
				<label>img_cover</label>
				<input class="form-control" name="img_cover" id="img_cover" required value="<?php echo $bookinfos[8]; ?>">
			</div>
			<div class="form-group">
				<label>edition</label>
				<input class="form-control" name="edition" id="edition" required value="<?php echo $bookinfos[9]; ?>">
			</div>
			<div class="form-group">
				<label>logistic_qnt</label>
				<input class="form-control" name="logistic_qnt" id="logistic_qnt" required value="<?php echo $bookinfos[10]; ?>">
			</div>
			<div class="form-group">
				<label>Genre*</label>
				<select name="type" id="type" class="form-control" required>
					<?php echo $genres; ?>
				</select>
			</div>
			<div class="form-group">
				<label>creation_date</label>
				<input class="form-control" name="creation_date" id="creation_date" required disabled value="<?php echo $bookinfos[12]; ?>">
			</div>
			<div class="form-group">
				<label>modif_date</label>
				<input class="form-control" name="modif_date" id="modif_date" required disabled value="<?php echo $bookinfos[13]; ?>">
			</div>
			<div class="form-group">
				<label>deleted</label>
				<input class="form-control" name="deleted" id="deleted" required disabled value="<?php echo $bookinfos[14]; ?>">
			</div>
			<div class="form-group">
				<button type="submit" name="submit" value="Enregistrer" class="btn btn-primary">Enregistrer</button>
			</div>
		</form>
	</div>
</div>
  
