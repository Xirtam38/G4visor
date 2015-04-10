<title>Ajouter un host - <?= $GLOBALS['SiteName'] ?></title>

<div class="row">
    <div class="col-lg-12">
	<h1 class="page-header">Ajout d'un host</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
	<form id="form_ajout_host">
	    <div class="form-group">
		<label for="ip">IP de l'host</label>
		<input class="form-control" name="ip" id="ip">
	    </div>
	    <div class="form-group">
		<label for="type">Type de l'host</label>
                <select class='form-control' name="type" id='type'>
                    <option value="">Sélectionner..</option>
                    <option value="laptop">Ordinateur Portable</option>
                    <option value="desktop">Ordinateur Fixe</option>
                    <option value="print">Imprimante</option>
                    <option value="serveur">Serveur</option>
                </select>
	    </div>
	    <div class="form-group">
		<label for="details">Details</label>
		<textarea class="form-control editor" name="details" id="details"></textarea>
	    </div>
            
            
            <?php if($_SESSION['role'] == "ROLE_ADMIN"){ ?>
            
                <h5><b>Groupes</b></h5>
                <?php
                $requete = "SELECT * FROM groupes WHERE etat = 1";
                $resultats = $BDD->query($requete);
                $resultats->setFetchMode(PDO::FETCH_OBJ);
                foreach ($resultats as $resultat) { ?>
                    <div class="radio">
                        <label>
                            <input type="radio" name="groupe" value="<?= $resultat->id ?>">
                            <?= $resultat->nom ?>
                        </label>
                    </div>
                <?php } ?>
                
            <?php } else { ?>
                <input type="hidden" name="groupe" value="<?= $_SESSION['groupes'] ?>">
            <?php } ?>
            
	    <button id="btn_ajout" type="button" class="btn btn-success">Ajouter</button>
	</form>
    </div>
</div>

<script>
    jQuery(function ($) {
	$("#btn_ajout").click(function () {
	    tinyMCE.triggerSave();
	    $.post("/projet/ajax/newHost.ajax.php", $("#form_ajout_host").serialize(), function (data) {
		console.log(data);
		if(data==1){
		    window.location.href="/projet/";
		} else {
		    alert('Erreur');
		}
	    });
	    return false;
	});
    });
</script>