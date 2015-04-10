<?php
if($_SERVER['REQUEST_URI'] == "/projet/host/ajouter" OR preg_match("#modifier#", $_SERVER['REQUEST_URI']) OR preg_match("#erreur#", $_SERVER['REQUEST_URI']) OR preg_match("#voir#", $_SERVER['REQUEST_URI'])){
    $lien = "/projet/";
}else{
    $lien = "#";
}
?>
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
	<ul class="nav" id="side-menu">
	    <li>
		<a id="toutHost" href="<?= $lien ?>"><i class="fa fa-home fa-fw"></i> Tout</a>
	    </li>
	    <li>
		<a id="laptopHost" href="<?= $lien ?>"><i class="fa fa-laptop fa-fw"></i> Laptop</a>
	    </li>
	    <li>
		<a id="desktopHost" href="<?= $lien ?>"><i class="fa fa-desktop fa-fw"></i> Desktop</a>
	    </li>
	    <li>
		<a id="printHost" href="<?= $lien ?>"><i class="fa fa-print fa-fw"></i> Imprimante</a>
	    </li>
	    <li>
		<a id="serveurHost" href="<?= $lien ?>"><i class="fa fa-hdd-o fa-fw"></i> Serveur</a>
	    </li>
            <li style="display: none;">
                <form id="triHostForm">
                    <input type="radio" name="typeTri" id="toutHostTri" value="tout">tout   
                    <input type="radio" name="typeTri" id="laptopHostTri" value="laptop">laptop
                    <input type="radio" name="typeTri" id="desktopHostTri" value="desktop">desktop
                    <input type="radio" name="typeTri" id="printHostTri" value="print">print
                    <input type="radio" name="typeTri" id="serveurHostTri" value="serveur">serveur
                </form>
            </li>
	</ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>


<script>
jQuery(function( ){
    jQuery('#toutHost').click(function(){
        jQuery('#toutHostTri').click();
        jQuery('a').removeClass('active');
        jQuery('#toutHost').addClass('active');
    });
    jQuery('#laptopHost').click(function(){
        jQuery('#laptopHostTri').click();
        jQuery('a').removeClass('active');
        jQuery('#laptopHost').addClass('active');
    });
    jQuery('#desktopHost').click(function(){
        jQuery('#desktopHostTri').click();
        jQuery('a').removeClass('active');
        jQuery('#desktopHost').addClass('active');
    });
    jQuery('#printHost').click(function(){
        jQuery('#printHostTri').click();
        jQuery('a').removeClass('active');
        jQuery('#printHost').addClass('active');
    });
    jQuery('#serveurHost').click(function(){
        jQuery('#serveurHostTri').click();
        jQuery('a').removeClass('active');
        jQuery('#serveurHost').addClass('active');
    });
});
</script>