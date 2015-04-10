<?php

$GLOBALS['Path'] = "../";
$GLOBALS['PathScr'] = "/projet/";

require_once $GLOBALS['Path'] . 'global/init.php';

session_start();


$requete = $BDD->prepare("INSERT INTO users (etat, email, password, role) VALUES (:etat, :email, :password, :role)");
$requete->bindParam(':etat', $etat);
$requete->bindParam(':email', $email);
$requete->bindParam(':password', $password);
$requete->bindParam(':role', $role);

// insertion
$etat = 1;
$email = $_POST['email'];
$password = sha1($_POST['password']);

if (isset($_POST['admin'])) {
    $role = strtoupper("role_admin");
} else {
    $role = strtoupper("role_user");
}


if ($requete->execute()) {

    if (isset($_POST['admin'])) {
        echo 1;
    } else {
        $userID = $BDD->lastInsertId();
        $requete2 = $BDD->prepare("INSERT INTO user_map (user_id, groupe_id ) VALUES (:user_id, :groupe_id)");
        $requete2->bindParam(':user_id', $userID);
        $requete2->bindParam(':groupe_id', $groupeID);
        $groupeID = $_POST['groupe'];
        if ($requete2->execute()) {
            echo 1;
        } else {
            echo 0;
        }
    }
} else {
    echo 0;
}