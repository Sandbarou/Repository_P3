<?php

// On demande les 5 derniers billets (modèle)
include_once('model/get_chapitres_index.php');
$chapitres_index = get_chapitres_index(0, 3);

// On effectue du traitement sur les données (contrôleur)
// Ici, on doit surtout sécuriser l'affichage
foreach($chapitres_index as $chap => $chapitre)
{
    $chapitres_index[$chap]['chapitre_Titre'] = htmlspecialchars($chapitre['chapitre_Titre']);
}

// On affiche la page (vue)
include_once('vue/index.php');