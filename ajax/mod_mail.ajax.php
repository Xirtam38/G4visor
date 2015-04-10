<?php

$GLOBALS['Path'] = "../";
$GLOBALS['PathScr'] = "/projet/";

require_once $GLOBALS['Path'].'global/init.php';

session_start();

$erreur = array();

if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $email = $_POST['email'];
} else {
    $email = "";
    $erreur['mail']=1;
}

$requete = $BDD->prepare("UPDATE users SET email = :email WHERE id = :id ");
$requete->bindParam(':email', $email);
$requete->bindParam(':id', $id);

// insertion
$id = $_POST['id'];

if($requete->execute()){
    $_SESSION['email'] = $email;
    echo 1;
} else {
    echo 0;
}