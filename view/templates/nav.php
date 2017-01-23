<?php 
    if (!defined('INCLUDE_CHECK')) {
        http_response_code(404); die;
    }

    $nav_params = array('loginbtn'=>'Connexion','loginlink'=>'login');
    $conn_confirmation = '';
    if(isset($_SESSION['id']) && $_SESSION['id'] != null){
        $nav_params['loginbtn'] = 'Déconnexion';
        $nav_params['loginlink'] = 'logout';
        $conn_confirmation = '<p>Bonjour, '.$_SESSION['name'].'</p>';
    }
?>
<!-- Fixed navbar -->
<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="./books.php" class="navbar-brand">Projet 151</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li><a><span class="welcome-message"><?php echo $conn_confirmation; ?></span></a></li>
				<li><a href="">Magasin</a></li>
				<li><a href="<?php echo './'.$nav_params['loginlink'].'.php'; ?>"><?php echo $nav_params['loginbtn']; ?></a></li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>