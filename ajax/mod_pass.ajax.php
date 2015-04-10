<?php

$GLOBALS['Path'] = "../";
$GLOBALS['PathScr'] = "/projet/";

require_once $GLOBALS['Path'].'global/init.php';

session_start();

$erreur = array();

$requete = $BDD->prepare("UPDATE users SET password = :password WHERE id = :id ");
$requete->bindParam(':password', $password);
$requete->bindParam(':id', $id);

// insertion
$id = $_POST['id'];
$password = sha1($_POST['password']);

if($requete->execute()){
    echo 1;
} else {
    echo 0;
}