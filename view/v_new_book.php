<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>LibrairieShop</title>
  </head>
<body>
<?php
// Before displaying the form, user authentication must be done:
// If the user isn't admin, we show a message:

?>
<p>
<h1>Add book to LibraryShop</h1>
</p>
<form action="../../controller/new_book.php" method="post">
	<fieldset>
	<table>
		<tr>
			<td>
				ID:
			</td>
			<td>
				<input type="number" name="id" size="50" maxlength="30"/>
			</td>
		</tr>
		<tr>
			<td>
				Titre:
			</td>
			<td>
				<input type="text" name="title" size="50" maxlength="30"/>
			</td>
		</tr>
		<tr>
			<td>
				Resumé:
			</td>
			<td>
				<input type="text" name="overview" size="50" maxlength="30"/>
			</td>
		</tr>
		<tr>
			<td>
				Sexe de l'auteur:
			</td>
			<td>
				<input type="text" name="author_sex" size="50" maxlength="30"/>
			</td>
		</tr>
		<tr>
			<td>
				Nom de l'auteur:
			</td>
			<td>
				<input type="text" name="author_name" size="50" maxlength="60"/>
			</td>
		</tr>
		<tr>
			<td>
				Nom complet de l'auteur:
			</td>
			<td>
				<input type="text" name="author_fname" size="50" maxlength="30"/>
			</td>
		</tr>
		<tr>
			<td>
				Année:
			</td>
			<td>
				<input type="number" name="year" size="50" maxlength="30"/>
			</td>
		</tr>

		<tr>
			<td>
				Genre:
			</td>
			<td>
				<input type="text" name="type" size="50"/>
			</td>
		</tr>
		<tr>
			<td>
				Prix:
			</td>
			<td>
				<input type="number" name="price" size="50"/>
			</td>
		</tr>
		<tr>
			<td>
				Quantité en stock:
			</td>
			<td>
				<input type="number" name="logistic_qnt" size="50" maxlength="30"/>
			</td>
		</tr>
		<tr>
			<td>
				Date:
			</td>
			<td>
				<input type="date" name="creation_date" size="50" maxlength="30"/>
			</td>
		</tr>
		<tr>
			<td>
				Image de couverture:
			</td>
			<td>
				<input type="text" name="img_cover" size="50"/>
			</td>
		</tr>
		<tr>
			<td>
				Edition:
			</td>
			<td>
				<input type="text" name="edition" size="50"/>
			</td>
		</tr>
	</table>
	<fieldset>
		<input type="submit" value="Enregistrer">
		<input type="reset" value="Effacer" />
	</fieldset>
	</fieldset>
</form>
<?php 
echo "variable document root: ".$_SERVER['DOCUMENT_ROOT']."<br/>";
require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/footer.php'); ?>
</body>
</html>
  
