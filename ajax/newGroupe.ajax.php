<?php

$GLOBALS['Path'] = "../";
$GLOBALS['PathScr'] = "/projet/";

require_once $GLOBALS['Path'] . 'global/init.php';

session_start();


$requete = $BDD->prepare("INSERT INTO groupes (etat, nom) VALUES (:etat, :nom)");
$requete->bindParam(':etat', $etat);
$requete->bindParam(':nom', $nom);

// insertion
$etat = 1;
$nom = $_POST['nom'];

if ($requete->execute()) {
    echo 1;
} else {
    echo 0;
}