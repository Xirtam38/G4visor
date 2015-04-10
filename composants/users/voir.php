<?php

if(is_numeric($_GET['slug'])){
    $id = $_GET['slug'];
}
$requete = "SELECT * FROM users WHERE id= '".$id."'";
$resultats = $BDD->query($requete);
$resultats->setFetchMode(PDO::FETCH_OBJ);

foreach ($resultats as $resultat) { }
var_dump($resultat);
?>

<div class="row">
    <div class="col-lg-12">
	<h1 class="page-header">Host n°<?= $resultat->id ?> </h1>
        <p>Email de l'host : <?= $resultat->email ?> </p>
    </div>
</div>