<?php

// On demande les 5 derniers billets (modèle)
include_once('model/get_chapitres_header.php');
$chapitres_header = get_chapitres_header(0, 1);

// On effectue du traitement sur les données (contrôleur)
// Ici, on doit surtout sécuriser l'affichage
foreach($chapitres_header as $chap => $chapitre)
{
	$chapitres_header[$chap]['chapitre_ID'] = htmlspecialchars($chapitre['chapitre_ID']);
}

// On affiche la page (vue)
include_once('vue/header.php');