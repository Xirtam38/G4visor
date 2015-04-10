<?php

$GLOBALS['Path'] = "../";
$GLOBALS['PathScr'] = "/projet/";

require_once $GLOBALS['Path'].'global/init.php';

session_start();

$erreur= array();

if(isset($_POST['password']) AND !empty($_POST['password']) ){
    $password = sha1($_POST['password']);
} else {
    $password = "";
    $erreur['password']=1;
}

if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $email = $_POST['email'];
} else {
    $email = "";
    $erreur['mail']=1;
}

$requete = "SELECT * FROM users WHERE password ='".$password."' AND email ='".$email."' AND etat = 1";
$resultats = $BDD->query($requete);
$resultats->setFetchMode(PDO::FETCH_OBJ);
$i=0;
foreach ($resultats as $resultat) {
    $i++;
}

if($i==1){
    
    $requete = "SELECT * FROM user_map WHERE user_id = ".$resultat->id." ";
    $groups = $BDD->query($requete);
    $groups->setFetchMode(PDO::FETCH_OBJ);
    $groupes="";
    foreach ($groups as $group) {
        $groupes.="'".$group->groupe_id."',";
    }
    $groupes = substr($groupes, 0, -1);
    
    $_SESSION['id_user'] = $resultat->id ;
    $_SESSION['groupes'] = $groupes ;
    $_SESSION['role'] = $resultat->role ;
    $_SESSION['email'] = $resultat->email ;
    $_SESSION['connecte'] = 1;
    $_SESSION['id_user'] = $resultat->id;
    echo 1;
} else {
    $erreur['compte']=1;
    var_dump($erreur);
}