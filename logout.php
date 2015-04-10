<?php
session_start();

$GLOBALS['Path'] = "./";
$GLOBALS['PathScr'] = "/administration/";

// Initialisation
require_once $GLOBALS['Path'] . 'global/init.php';

session_destroy();
header('Location: /projet/');