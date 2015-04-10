
<title>Alertes - <?= $GLOBALS['SiteName'] ?></title>

<!-- Contenu Principale -->

<div class="row">
    <div class="col-lg-12">
	<h1 class="page-header">Alertes</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 table-responsive">
        <table class="table">
            <tr>
                <td>ID</td>
                <td>Host</td>
                <td>Date Heure</td>
                <td>Commentaire</td>
            </tr>
            <?php
            $requete = "SELECT * "
                    . "FROM journal "
                    . "ORDER BY id DESC";
            $resultats = $BDD->query($requete);
            $resultats->setFetchMode(PDO::FETCH_OBJ);
            
            foreach ($resultats as $resultat) {  ?>
                <tr>
                    <td><?= $resultat->id ?></td>
                    <td><a target="_BLANK" href="/host/voir/<?= $resultat->host_id ?>"><?= $resultat->host_id ?></a></td>
                    <td>Le <?= date("d/m/Y à H:i",  strtotime($resultat->date_heure)) ?></td>
                    <td><?= $resultat->commentaire ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
	<h1 class="page-header">Logs</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 table-responsive">
        <table class="table">
            <tr>
                <td>ID</td>
                <td>Host</td>
                <td>Date Heure Début</td>
                <td>Date Heure Fin</td>
                <td>Commentaire</td>
            </tr>
            <?php
            $requete = "SELECT * "
                    . "FROM log "
                    . "ORDER BY id DESC";
            $resultats = $BDD->query($requete);
            $resultats->setFetchMode(PDO::FETCH_OBJ);
            
            foreach ($resultats as $resultat) {  ?>
                <tr>
                    <td><?= $resultat->id ?></td>
                    <td><a target="_BLANK" href="/host/voir/<?= $resultat->host_id ?>"><?= $resultat->host_id ?></a></td>
                    <td>Le <?= date("d/m/Y à H:i",  strtotime($resultat->date_debut)) ?></td>
                    <td>Le <?= date("d/m/Y à H:i",  strtotime($resultat->date_fin)) ?></td>
                    <td><?= $resultat->commentaire ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<script>
    jQuery(function(){
        jQuery('.btn-delete').click(function(){
            jQuery.post("/projet/ajax/deleteUser.ajax.php", jQuery(this).parent("#form_del_user").serialize(), function (data) {
		console.log(data);
                if(data==1){
		    window.location.href="/projet/users";
		} else {
		    alert('Erreur');
		}
	    });
	    return false;
        });
    });
</script>