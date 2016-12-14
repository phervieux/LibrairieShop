<?php 
if (!defined('INCLUDE_CHECK')) {
    http_response_code(404); die;
}
$msg = '';
if($error == 1){
    $msg = '<p class="bg-danger">Merci de verifier le CAPTCHA</p>';
}elseif($error == 2){
    $msg = '<p class="bg-danger">Nom d\'utilisateur ou mot de passe faux</p>';
}
?>
<div class="row">
    <div class="box-grey col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
        <form class="" action="./login.php" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Nom d'utilisateur</label>
                <input name="username" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nom d'utilisateur"/>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mot de passe</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe"/>
            </div>
            <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LdJtA4UAAAAAAxhUmLCYD6lC5_2Urbe2-VEUikk"></div>
            </div>
            <input type="submit" class="btn btn-default"/>
        </form>
        <div class="imgnew">
            <a href="./sign-up">
                <img src="./images/home/new.png" alt="new" title="New?" /> 
            </a>
        </div>
        <?php echo $msg; ?>
    </div>
</div>
<?php// require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/footer.php'); ?>
