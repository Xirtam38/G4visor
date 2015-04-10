<title>Ajouter un utilisateur - <?= $GLOBALS['SiteName'] ?></title>

<div class="row">
    <div class="col-lg-12">
	<h1 class="page-header">Ajout d'un utilisateur</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
	<form id="form_ajout_user">
	    <div class="form-group">
		<label for="email">Email</label>
		<input class="form-control" name="email" id="email">
	    </div>
	    <div class="form-group">
		<label for="password">Password</label>
		<input class="form-control" name="password" id="password">
	    </div>
            <?php if($_SESSION['role'] == "ROLE_ADMIN"){ ?>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="admin" value=" ">
                        Admin
                    </label>
                </div>
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
            <?php } ?>
	    <button id="btn_ajout" type="button" class="btn btn-success">Ajouter</button>
	</form>
    </div>
</div>

<script>
    jQuery(function ($) {
	$("#btn_ajout").click(function () {
	    tinyMCE.triggerSave();
	    $.post("/projet/ajax/newUser.ajax.php", $("#form_ajout_user").serialize(), function (data) {
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