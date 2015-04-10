<?php

$GLOBALS['Path'] = "../";
$GLOBALS['PathScr'] = "/projet/";

require_once $GLOBALS['Path'].'global/init.php';

session_start();

$requete = $BDD->prepare("INSERT INTO host (ip, type, details, groupe_id) VALUES (:ip, :type, :details, :groupe)");
$requete->bindParam(':ip', $ip);
$requete->bindParam(':type', $type);
$requete->bindParam(':details', $details);
$requete->bindParam(':groupe', $groupe);

// insertion
$ip = $_POST['ip'];
$type = $_POST['type'];
$details = $_POST['details'];
$groupe = $_POST['groupe'];

if ($requete->execute()){
    echo 1;
} else {
    echo 0;
}