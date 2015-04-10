

<title>Index - <?= $GLOBALS['SiteName'] ?></title>

<!-- Contenu Principale -->

<div class="row">
    <div class="col-lg-12">
	<h1 class="page-header">Tableau de bord</h1>
    </div>
    <div class="col-lg-12">
        <a class="btn btn-success" href="/projet/host/ajouter"><i class=' fa fa-plus' ></i> Ajouter</a>
        <hr>
    </div>
</div>
<div class="row bloc_resultat">

</div>

<script>
    jQuery(function($) {
        
        jQuery('#toutHost').click();
        
        setInterval(function(){
            checkHost();
            }
        , 60000);
        
        jQuery('#triHostForm input').change(function(){
           checkHost();
        });
        
        function checkHost(){
            $.post("/projet/ajax/loadHost.ajax.php", $("#triHostForm").serialize(), function (data) {
                jQuery('.bloc_resultat').html(data);
	    });
	    return false;
        }
        checkHost();
        
        
    });
</script>