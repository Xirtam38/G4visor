<?php

$GLOBALS['Path'] = "../";
$GLOBALS['PathScr'] = "/projet/";

require_once $GLOBALS['Path'] . 'global/init.php';

session_start();

$id = $_POST['id'];

$result = $BDD->exec("DELETE FROM users WHERE id = ".$id);

if($_POST['role'] == "ROLE_ADMIN"){
    $result2 = true;
} else {
    $result2 = $BDD->exec("DELETE FROM user_map WHERE user_id = ".$id);
}

if($result AND $result2){
    echo 1;
} else {
    echo 0;
}