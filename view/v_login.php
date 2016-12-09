<?php 
if (!defined('INCLUDE_CHECK')) {
    http_response_code(404); die;
}
?>
<div class="row">
    <div class="box-grey col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
        <form class="" action="./login.php" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input name="username" type="text" class="form-control" id="exampleInputEmail1" placeholder="Username"/>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"/>
            </div>
            <input type="submit" class="btn btn-default"/>
        </form>
        <div class="imgnew">
            <a href="./sign-up">
                <img src="./images/home/new.png" alt="new" title="New?" /> 
            </a>
        </div>  
    </div>
</div>
<?php// require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/templates/footer.php'); ?>
