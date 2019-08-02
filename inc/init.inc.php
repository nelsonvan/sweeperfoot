<?php
//Connexion a la base de donnée  //
$bdd = new PDO('mysql:host=localhost;dbname=sweeperfoot', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// variable d'affichage 
$contenu = '';
$validate = '';

//-----------------------------chemin---------------------------
define("RACINE_SITE", $_SERVER['DOCUMENT_ROOT'] . '/production/sweeperfoot/');

define("URL", "http://localhost/production/sweeperfoot/");


