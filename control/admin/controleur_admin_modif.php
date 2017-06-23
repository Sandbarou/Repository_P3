<?php

include_once("model/admin/get_chapitres_admin.php");
$chapitres_admin = get_chapitres_admin();

// On effectue du traitement sur les données (contrôleur)
// Ici, on doit surtout sécuriser l'affichage
foreach($chapitres_admin as $chap => $chapitre)
{
	$chapitres_admin[$chap]['chapitre_ID'] = $chapitre['chapitre_ID'];
	$chapitres_admin[$chap]['chapitre_Date'] = $chapitre['chapitre_Date'];
    $chapitres_admin[$chap]['chapitre_Titre'] = htmlspecialchars($chapitre['chapitre_Titre']);
    $chapitres_admin[$chap]['chapitre_Auteur'] = htmlspecialchars($chapitre['chapitre_Auteur']);
    $chapitres_admin[$chap]['chapitre_Contenu'] = nl2br($chapitre['chapitre_Contenu']);
}

// On affiche la page (vue)
include_once('vue/admin/backend_modif.php');

