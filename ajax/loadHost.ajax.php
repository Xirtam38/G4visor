<?php

$GLOBALS['Path'] = "../";
$GLOBALS['PathScr'] = "/administration/";

require_once $GLOBALS['Path'].'global/init.php';

session_start();

if($_SESSION['role'] == "ROLE_ADMIN"){
    if($_POST['typeTri']=="tout"){
        $requete = "SELECT * FROM host ";
    } elseif($_POST['typeTri']=="laptop"){
        $requete = "SELECT * FROM host WHERE type='laptop' ";
    } elseif($_POST['typeTri']=="desktop"){
        $requete = "SELECT * FROM host WHERE type='desktop' ";
    } elseif($_POST['typeTri']=="print"){
        $requete = "SELECT * FROM host WHERE type='print' ";
    } elseif($_POST['typeTri']=="serveur"){
        $requete = "SELECT * FROM host WHERE type='serveur' ";
    } else {
        $requete = "SELECT * FROM host";
    }
} else {
    
    $fe = $_SESSION['groupes'];
    
    if($_POST['typeTri']=="tout"){
        $requete = "SELECT * FROM host WHERE groupe_id = ".$fe." ";
    } elseif($_POST['typeTri']=="laptop"){
        $requete = "SELECT * FROM host WHERE type='laptop' AND groupe_id = ".$fe." ";
    } elseif($_POST['typeTri']=="desktop"){
        $requete = "SELECT * FROM host WHERE type='desktop' AND groupe_id = ".$fe." ";
    } elseif($_POST['typeTri']=="print"){
        $requete = "SELECT * FROM host WHERE type='print' AND groupe_id = ".$fe." ";
    } elseif($_POST['typeTri']=="serveur"){
        $requete = "SELECT * FROM host WHERE type='serveur' AND groupe_id = ".$fe." ";
    } else {
        $requete = "SELECT * FROM host";
    }
}
    


$retour="";


$resultats = $BDD->query($requete);
$resultats->setFetchMode(PDO::FETCH_OBJ);

foreach ($resultats as $resultat) {
    
    $retour.="<div class=' col-md-3' >";
        
    $ping = exec("ping -n 2 $resultat->ip");
    if(preg_match("#Minimum#", $ping) OR preg_match("#Maximum#", $ping)) {
        $retour.="<div class=' panel panel-success' >";
    } else {
        $retour.="<div class=' panel panel-danger' >";
    }
    $retour.="<div class=' panel-heading' >
		    <div class=' row' >
			<div class=' col-xs-12 text-center' >"
    ;
    
    if($resultat->type=="laptop"){
        $retour.=" <i class=' fa fa-laptop fa-5x' ></i>";
    } elseif ($resultat->type=="desktop") {
        $retour.=" <i class=' fa fa-desktop fa-5x' ></i>";
    } elseif ($resultat->type=="print") {
        $retour.=" <i class=' fa fa-print fa-5x' ></i>";
    } elseif ($resultat->type=="serveur") {
        $retour.=" <i class=' fa fa-hdd-o fa-5x' ></i>";
    }
    $retour.="
			</div>
		    </div>
		</div>
		<a href=' /projet/host/voir/".$resultat->id." ' >
		    <div class=' panel-footer' >
			<span class=' pull-left' >$resultat->ip</span>
			<span class=' pull-right' ><i class=' fa fa-arrow-circle-right' ></i></span>
			<div class=' clearfix' ></div>
		    </div>
		</a>
	    </div>
	</div>
        ";
    
    if(preg_match("#Minimum#", $ping) OR preg_match("#Maximum#", $ping)) {
        // PHP CHECK SI ETAIT DECO, SI OUI ALORS GO DELETE DANS LE J0URNAL
        $requete2 = $BDD->prepare("SELECT * FROM journal WHERE host_id = ".$resultat->id." ");
        $requete2->execute();
        
        if ($requete2->rowCount() == 0)
        { // pas de resultat 
        } else {
            
            $query = "SELECT * FROM journal WHERE host_id = ".$resultat->id." ";
            $vars = $BDD->query($query);
            $vars->setFetchMode(PDO::FETCH_OBJ);

            foreach ($vars as $var) { 
                $date_debut = $var->date_heure;
                $commentaire = $var->commentaire;
            }
            
            $result = $BDD->exec("DELETE FROM journal WHERE host_id = ".$resultat->id);
            
            $requete = $BDD->prepare("INSERT INTO log (host_id, date_debut, commentaire) VALUES (:host_id, :date_debut, :commentaire)");
            $requete->bindParam(':host_id', $host_id);
            $requete->bindParam(':date_debut', $date_debut);
            $requete->bindParam(':commentaire', $commentaire);
            // insertion
            $host_id = $resultat->id;
            $requete->execute();
        }
        
        
    } else {
        // PHP CHECK SI IL ETAIT CO AVANT, SI OUI ALORS GO ADD DANS LE J0URNAL
        $requete3 = $BDD->prepare("SELECT * FROM journal WHERE host_id = ".$resultat->id." ");
        $requete3->execute();
        
        if ($requete3->rowCount() == 0)
        { 
            $requete = $BDD->prepare("INSERT INTO journal (host_id, commentaire) VALUES (:host_id, :commentaire)");
            $requete->bindParam(':host_id', $host_id);
            $requete->bindParam(':commentaire', $commentaire);
            // insertion
            $commentaire = "Impossible de ping l'host";
            $host_id = $resultat->id;
            $requete->execute();
            
            $to = "florent.fulleringer@gmail.com";
            $subject = 'Problème survenu sur le réseau';
            $contenu = "<p>L'hote ayant l'ip : $resultat->ip est injoignable par nos services.</p>";
            $contenu .= "<p>Cordialement.</p>";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
            $result = mail($to, $subject, $contenu, $headers);
    
        } 
    }
    
}
echo $retour;