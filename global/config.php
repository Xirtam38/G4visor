<?php

// Identifiants pour la base de données.
    //Initialistion des constantes
    define("DB_HOST","localhost");
    define("DB_NAME","superviseur");
    define("DB_PORT","3306"); //default : 3306
    define("DB_USER","root");
    define("DB_PASS","");

    try{
        $BDD = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME .';port=' . DB_PORT,DB_USER,DB_PASS);
        $BDD->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $BDD->exec("SET NAMES 'utf8'");
        //echo "Connect&eacute; &agrave; la base de donn&eacute;es";
    }
    catch (Exception $e){
        echo "Impossible de se connecter a la BDD";
        exit;
    }
// Chemins à utiliser pour accéder aux vues/modeles/librairies
    $module = empty($module) ? !empty($_GET['module']) ? $_GET['module'] : 'index' : $module;
    define('CHEMIN_VUE',    '../modules/'.$module.'/views/');
    define('CHEMIN_MODELE', '../modeles/');
    define('CHEMIN_LIB',    '../libs/');