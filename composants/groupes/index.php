
<title>Index - <?= $GLOBALS['SiteName'] ?></title>

<!-- Contenu Principale -->

<div class="row">
    <div class="col-lg-12">
	<h1 class="page-header">Groupes</h1>
    </div>
    <div class="col-lg-12">
        <a class="btn btn-success" href="/projet/groupes/ajouter"><i class=' fa fa-plus' ></i> Ajouter</a>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 table-responsive">
        <table class="table">
            <tr>
                <td>ID</td>
                <td>Etat</td>
                <td>Nom</td>
                <td>Action</td>
            </tr>
            <?php
            $requete = "SELECT * "
                    . "FROM groupes "
                    . "ORDER BY id DESC";
            $resultats = $BDD->query($requete);
            $resultats->setFetchMode(PDO::FETCH_OBJ);
            
            foreach ($resultats as $resultat) {  ?>
                <tr>
                    <td><?= $resultat->id ?></td>
                    <td><?= $resultat->etat ?></td>
                    <td><?= $resultat->nom ?></td>
                    <td>
                        <form id="form_del_groupe">
                            <input type="hidden" value="<?= $resultat->id ?>" name="id">
                            <button type="button" class="btn btn-danger btn-xs btn-delete">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<script>
    jQuery(function(){
        jQuery('.btn-delete').click(function(){
            jQuery.post("/projet/ajax/delGroupe.ajax.php", jQuery( "#form_del_groupe").serialize(), function (data) {
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