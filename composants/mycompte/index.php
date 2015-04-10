
<title>mon compte - <?= $GLOBALS['SiteName'] ?></title>

<!-- Contenu Principale -->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">mon compte</h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 retour">
    </div>
</div>
<div class="row">
    <div class="col-xs-12 ">
        <form id="form_update_user">
            <input type="hidden" value="<?= $_SESSION['id_user'] ?>" name="id">
            Adresse email : <input type="text" value="<?= $_SESSION['email'] ?>" name="email"><br/><br/>
            <button type="button" class="btn btn-success btn-xs btn-modifier">modifier</button>
        </form>
    </div>
</div>
<br><br><hr><br><br>
<div class="row">
    <div class="col-xs-12 ">
        <form id="form_update_pass_user">
            <input type="hidden" value="<?= $_SESSION['id_user'] ?>" name="id">
            mot de passe : <input type="text" value=" " name="password"><br/><br/>
            <button type="button" class="btn btn-success btn-xs btn-modifier-pass">modifier</button>
        </form>
    </div>
</div>

<script>
    jQuery(function () {
        jQuery('.btn-modifier').click(function () {
            jQuery.post("/projet/ajax/mod_mail.ajax.php", jQuery( "#form_update_user" ).serialize(), function (data) {
                console.log(data);
                if (data == 1) {
                    jQuery('.retour').html('<div class="alert alert-success" role="alert">Email modifiée</div>');
                } else {
                    alert('Erreur');
                }
            });
            return false;
        });
        jQuery('.btn-modifier-pass').click(function () {
            jQuery.post("/projet/ajax/mod_pass.ajax.php", jQuery( "#form_update_pass_user" ).serialize(), function (data) {
                console.log(data);
                if (data == 1) {
                    jQuery('.retour').html('<div class="alert alert-success" role="alert">mot de passe modifié</div>');
                } else {
                    alert('Erreur');
                }
            });
            return false;
        });
    });
</script>