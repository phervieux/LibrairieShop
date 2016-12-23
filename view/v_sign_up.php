<?php
if (!defined('INCLUDE_CHECK')) {
    http_response_code(404); die;
}
?>

<div class="row">
    <div class="box-grey col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
        <?php echo $msg; ?>
        <form class="" method="post">
            <div class="form-group">
                <label for="exampleInputUsername">Nom d'utilisateur</label>
                <input name="username" type="text" class="form-control" id="exampleInputUsername" placeholder="Nom d'utilisateur"/>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Adresse Courriel</label>
                <input name="e-mail" type="text" class="form-control" id="exampleInputEmail1" placeholder="Adresse Courriel"/>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mot de passe</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe"/>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword2">Confirmation du Mot de passe</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword2" placeholder="Confirmation du Mot de passe"/>
            </div>
            <div class="form-group">
                <?php echo $captcha; ?>
                <input name="captcha" type="text" class="form-control" id="exampleInputPassword1" placeholder="Captcha"/>
            </div>
            <input type="submit" name="submit" value="continuer" class="btn btn-default"/>
        </form>
        <a href="./login.php">Vous avez déjà un compte ?</a>
    </div>
</div>

<?php
// require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/footer.php');
?>
