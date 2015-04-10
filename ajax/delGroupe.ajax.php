<?php

$GLOBALS['Path'] = "../";
$GLOBALS['PathScr'] = "/projet/";

require_once $GLOBALS['Path'] . 'global/init.php';

session_start();
        
$id = $_POST['id'];
$BDD->exec("DELETE FROM groupes WHERE id = ".$id);
echo 1;