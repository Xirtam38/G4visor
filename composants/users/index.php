
<title>Index - <?= $GLOBALS['SiteName'] ?></title>

<!-- Contenu Principale -->

<div class="row">
    <div class="col-lg-12">
	<h1 class="page-header">Utilisateurs</h1>
    </div>
    <div class="col-lg-12">
        <a class="btn btn-success" href="/projet/users/ajouter"><i class=' fa fa-plus' ></i> Ajouter</a>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 table-responsive">
        <table class="table">
            <tr>
                <td>ID</td>
                <td>Etat</td>
                <td>Email</td>
                <td>Groupe</td>
                <td>Action</td>
            </tr>
            <?php
            $requete = "SELECT DISTINCT users.*, groupes.nom "
                    . "FROM users "
                    . "LEFT JOIN user_map ON users.id = user_map.user_id "
                    . "LEFT JOIN groupes ON user_map.groupe_id = groupes.id "
                    . "ORDER BY users.id DESC";
            $resultats = $BDD->query($requete);
            $resultats->setFetchMode(PDO::FETCH_OBJ);
            
            foreach ($resultats as $resultat) {  ?>
                <tr>
                    <td><?= $resultat->id ?></td>
                    <td><?= $resultat->etat ?></td>
                    <td><?= $resultat->email ?></td>
                    <td><?php if($resultat->role == "ROLE_ADMIN"){ ?> Admin <?php } else { echo $resultat->nom; } ?></td>
                    <td>
                        <form id="form_del_user">
                            <input type="hidden" value="<?= $resultat->id ?>" name="id">
                            <input type="hidden" value="<?= $resultat->role ?>" name="role">
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