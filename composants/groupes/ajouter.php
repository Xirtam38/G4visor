<title>Ajouter un groupe - <?= $GLOBALS['SiteName'] ?></title>

<div class="row">
    <div class="col-lg-12">
	<h1 class="page-header">Ajout d'un groupe</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
	<form id="form_ajout_groupe">
	    <div class="form-group">
		<label for="nom">Nom</label>
		<input class="form-control" name="nom" id="nom">
	    </div>
	    <button id="btn_ajout" type="button" class="btn btn-success">Ajouter</button>
	</form>
    </div>
</div>

<script>
    jQuery(function ($) {
	$("#btn_ajout").click(function () {
	    tinyMCE.triggerSave();
	    $.post("/projet/ajax/newGroupe.ajax.php", $("#form_ajout_groupe").serialize(), function (data) {
		console.log(data);
		if(data==1){
		    window.location.href="/projet/groupes";
		} else {
		    alert('Erreur');
		}
	    });
	    return false;
	});
    });
</script>