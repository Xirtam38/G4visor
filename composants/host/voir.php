<?php

if(is_numeric($_GET['slug'])){
    $id = $_GET['slug'];
}
$requete = "SELECT * FROM host WHERE id= '".$id."'";
$resultats = $BDD->query($requete);
$resultats->setFetchMode(PDO::FETCH_OBJ);

foreach ($resultats as $resultat) { }

$retour = "";

$host = $resultat->ip;
$session = new SNMP(SNMP::VERSION_2c, $host, 'public');
set_error_handler(function($e){ $retour = 1; });
$fulltree = $session->walk(array('.1.3.6.1.2.1.1.5.0')); 
$var =substr($fulltree['iso.3.6.1.2.1.1.5.0'], 9,-1);
$fulltree2 = $session->walk(array('.1.3.6.1.2.1.1.3.0')); 
$time = substr($fulltree2['iso.3.6.1.2.1.1.3.0'],10);
restore_error_handler();

$session->close();

?>

<div class="row">
    <div class="col-lg-12">
	<h1 class="page-header">Host <?= $resultat->ip ?> </h1>
        <p>IP de l'host : <?= $resultat->ip ?> </p>
        <?php if($resultat->type=="desktop"){ ?>
            <p>Type de l'host : Ordinateur fixe </p>
        <?php } elseif($resultat->type=="laptop"){ ?>
            <p>Type de l'host : Ordinateur portable </p>
        <?php } elseif($resultat->type=="print"){ ?>
            <p>Type de l'host : Imprimante </p>
        <?php } elseif($resultat->type=="serveur"){ ?>
            <p>Type de l'host : Serveur </p>
        <?php } ?>
            
        <?php if(!empty($resultat->details)){ ?>
            <p>Description : <?= $resultat->details ?> </p>
        <?php } ?>
            
        <?php 
        if($retour == 1){ ?>
            <p>Nom du PC : <?= $var ?> </p>
            <p>En ligne depuis : <?php echo $time ?></p>
        <?php } else { ?>
            <p class="text-danger">L'host est hors ligne.</p>
        <?php } ?>
            
        
        
        
       
    </div>
</div>