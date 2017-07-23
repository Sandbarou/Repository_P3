<?php
// Enclenche la temporisation de sortie - démarre la temporisation de sortie. Tant qu'elle est enclenchée, aucune donnée, hormis les en-têtes, n'est envoyée au navigateur, mais temporairement mise en tampon
ob_start();
// Démarre une nouvelle session ou reprend une session existante - via l'identifiant de session passé dans une requête GET, POST ou par un cookie
session_start();

// Déclaration base de données
$bdd = new PDO('mysql:host=localhost;dbname=bdd_cpm_p3;charset=utf8', 'root', 'root');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// Set timezone
setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR@euro', 'fr_FR.utf8', 'fr-FR', 'fra');
strftime(" %d %b %Y ");
date_default_timezone_set('Europe/Paris');


// Chargement de toutes les classes
function __autoload($class)
{

    // Convert all characters to lowercase
    $class = strtolower($class);

    $classpath = 'models/class.' . $class . '.php';
    if (file_exists($classpath)) {
        require_once $classpath;
    }

    $classpath = '../models/class.' . $class . '.php';
    if (file_exists($classpath)) {
        require_once $classpath;
    }

    $classpath = '../../models/class.' . $class . '.php';
    if (file_exists($classpath)) {
        require_once $classpath;
    }

}

// Création de l'objet dans la classe
$user = new User($bdd);