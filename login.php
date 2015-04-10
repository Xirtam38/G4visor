<?php
session_start();

$GLOBALS['Path'] = "./";
$GLOBALS['PathScr'] = "/projet/";

// Initialisation
require_once $GLOBALS['Path'] . 'global/init.php';

ob_start();
// On regarde que l'admin soit connecté
if (!empty($_SESSION['connecte'])) {
    header('Location: /projet/');
}

// Début du code HTML
require_once $GLOBALS['Path'] . '/global/header.php';
?>
<title>Connexion - Administration</title>
<div class="container">
    <br><br><br><br><br><br>
    <div class="row text-center">
	<div class="col-md-4 col-md-offset-4">
            <img src="http://i39.tinypic.com/vnedqa.png" width="100%">
	</div>
    </div>
    <div class="row">
	<div class="col-md-4 col-md-offset-4">
	    <div class="login-panel panel panel-default">
		<div class="panel-heading">
		    <h3 class="panel-title">Connexion Administration</h3>
		</div>
		<div class="panel-body">
		    <form role="form" id="form_connexion">
			<fieldset>
			    <div class="form-group">
				<input class="form-control" placeholder="Adresse email" name="email" type="email" autofocus>
			    </div>
			    <div class="form-group">
				<input class="form-control" placeholder="Mot de passe" name="password" type="password" value="">
			    </div>
			    <!-- Change this to a button or input when using this as a form -->
			    <button id="btn_connexion" type="button" class="btn btn-lg btn-success btn-block">Login</button>
			</fieldset>
		    </form>
		</div>
	    </div>
	</div>
    </div>
</div>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/sb-admin-2.js"></script>

<script>
    jQuery(function ($) {
	$("#btn_connexion").click(function () {
	    $.post("ajax/connexion.ajax.php", $("#form_connexion").serialize(), function (data) {
		console.log(data);
		if(data==1){
		    window.location.href="/projet/";
		}
	    });
	    return false;
	});
    });
</script>

</body>

</html>
