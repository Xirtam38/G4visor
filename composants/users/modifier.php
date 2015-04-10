<?php

if(is_numeric($_GET['slug'])){
    $id = $_GET['slug'];
}
$requete = "SELECT * FROM wow_actualites WHERE id= '".$id."'";
$resultats = $BDD->query($requete);
$resultats->setFetchMode(PDO::FETCH_OBJ);

?>

<title>Modifier une actualité - <?= $GLOBALS['SiteName'] ?></title>

<div class="row">
    <div class="col-lg-12">
	<h1 class="page-header">Modification d'une actualité</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <?php foreach ($resultats as $resultat) { ?>
	<div class="col-lg-12">
	    <form id="form_ajout_actualite">
		<input type="hidden" name="id" id="id" value="<?= $resultat->id ?>">
		<div class="form-group">
		    <label for="nom">Nom de l'actualité</label>
		    <input class="form-control" name="nom" id="nom" value="<?= $resultat->nom ?>">
		</div>
		<div class="form-group">
		    <label for="introduction">Introduction</label>
		    <textarea class="form-control editor" name="introduction" id="introduction"><?= $resultat->introduction ?></textarea>
		</div>
		<div class="form-group">
		    <label for="titre_1">Titre 1</label>
		    <input class="form-control" name="titre_1" id="titre_1" value="<?= $resultat->titre_1 ?>">
		</div>
		<div class="form-group">
		    <label for="texte_1">Texte 1</label>
		    <textarea class="form-control editor" name="texte_1" id="texte_1"><?= $resultat->texte_1 ?></textarea>
		</div>
		<div class="form-group">
		    <label for="titre_2">Titre 2</label>
		    <input class="form-control" name="titre_2" id="titre_2" value="<?= $resultat->titre_2 ?>">
		</div>
		<div class="form-group">
		    <label for="texte_2">Texte 2</label>
		    <textarea class="form-control editor" name="texte_2" id="texte_2"><?= $resultat->texte_2 ?></textarea>
		</div>
		<div class="form-group">
		    <label for="titre_3">Titre 3</label>
		    <input class="form-control" name="titre_3" id="titre_3" value="<?= $resultat->titre_3 ?>">
		</div>
		<div class="form-group">
		    <label for="texte_3">Texte 3</label>
		    <textarea class="form-control editor" name="texte_3" id="texte_3"><?= $resultat->texte_3 ?></textarea>
		</div>

		<button id="btn_ajout" type="button" class="btn btn-success">Modifier</button>
	    </form>
	</div>
    <?php } ?>
</div>

<script>
    jQuery(function ($) {
	$("#btn_ajout").click(function () {
	    tinyMCE.triggerSave();
	    $.post("/administration/ajax/modifier_actualite.ajax.php", $("#form_ajout_actualite").serialize(), function (data) {
		console.log(data);
		if(data==1){
		    window.location.href="/administration/actualites/listes";
		} else {
		    alert('Erreur');
		}
	    });
	    return false;
	});
    });
</script>