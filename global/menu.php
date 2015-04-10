<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	    <span class="sr-only">Toggle navigation</span>
	    <span class="icon-bar"></span>
	    <span class="icon-bar"></span>
	    <span class="icon-bar"></span>
	</button>
	<span class="navbar-brand">G4Visor</span>
    </div>
    <!-- /.navbar-header -->
    
    <ul class="nav navbar-top-links navbar-left">
	<li>
	    <a href="/projet/"><i class="fa fa-hdd-o fa-fw"></i> Host </a>
	</li>
        <?php if($_SESSION["role"] == "ROLE_ADMIN"){ ?>
            <li>
                <a href="/projet/users"><i class="fa fa-user fa-fw"></i> Utilisateurs</a>
            </li>
        <?php } ?>
        <li>
            <a href="/projet/groupes" ><i class="fa fa-bell fa-fw"></i> Groupes</a>
        </li>
        <li>
            <a href="/projet/alerts" ><i class="fa fa-bell fa-fw"></i> Alertes</a>
        </li>
        <li>
            <a href="/projet/mycompte" ><i class="fa fa-dashboard fa-fw"></i> mon compte</a>
        </li>
    </ul>
    <ul class="nav navbar-top-links navbar-right">
	<li>
            <p style='padding-left:12px;'>Connecté en tant que <b><?= $_SESSION["email"] ?></b></p>
	</li>
	<li>
	    <a href="<?= $GLOBALS['PathScr'] ?>logout.php"><i class="fa fa-power-off fa-fw"></i> Déconnexion</a>
	</li>
	<!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

   
    <!-- /.navbar-static-side -->
</nav>