<?php

session_start();

$GLOBALS['SiteName'] = "G4Visor.fr";
$GLOBALS['Path'] = "./";
$GLOBALS['PathScr'] = "/projet/";

// Initialisation
require_once $GLOBALS['Path'].'global/init.php';

ob_start();

// On regarde que l'admin soit connecté
if (empty($_SESSION['connecte']) AND $_SERVER['REQUEST_URI'] != "/login.php") {    
    header('Location: /projet/login.php'); 
}

// Si un module est specifié, on regarde s'il existe
if (!empty($_GET['composant'])) {

    $composant = dirname(__FILE__) . '/composants/' . $_GET['composant'] . '/';

    // Si l'action est specifiée, on l'utilise, sinon, on essaye une action par défault
    $action = (!empty($_GET['action'])) ? $_GET['action'] . '.php' : 'index.php';

    // Si l'action existe, on l'exécute
    if (is_file($composant . $action)) {
        require $composant . $action;

        // Sinon, on affiche la page d'accueil.
    } else {
        require $GLOBALS['Path'].'/composants/erreur/index.php';
    }

// En cas de nom de specification de module, on affiche l'accueil.
} else {
    require $GLOBALS['Path'].'/global/accueil.php';
}

$contenu = ob_get_clean();

// Début du code HTML
require_once $GLOBALS['Path'].'/global/header.php';

include $GLOBALS['Path'].'/global/menu.php';

?>
<section id="wrapper">
    <section>
	<div class="container">
	    <div class="row" id="page-wrapper">
		<div class="col-md-3 col-sm-4 col-xs-12" style='padding: 0Px;'>
                    <?php if( preg_match("#host#", $_SERVER['REQUEST_URI']) OR $_SERVER['REQUEST_URI'] == "/projet/" ){
                        include_once $GLOBALS['Path'].'modules/mod_aside_menu/index.php';
                    }elseif( preg_match("#users#", $_SERVER['REQUEST_URI']) ){
                    } ?>
		</div>
		<div class="col-md-9 col-sm-8 col-xs-12">
		    <?= $contenu ?>
		</div>
	    </div>
	</div> <!-- ./container -->
    </section>
</section>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= $GLOBALS['PathScr'] ?>js/bootstrap.min.js"></script>
    
    <!-- JQuery Upload Image -->
    <link rel="stylesheet" href="/projet/css/jquery.fileupload.css">
    <script src="/projet/js/uploadImage/jquery.ui.widget.js"></script>
    <script src="/projet/js/uploadImage/jquery.iframe-transport.js"></script>
    <script src="/projet/js/uploadImage/jquery.fileupload.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?= $GLOBALS['PathScr'] ?>js/sb-admin-2.js"></script>
    <script src="<?= $GLOBALS['PathScr'] ?>js/script.js"></script>

</body>

</html>