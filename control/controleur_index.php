<?php


include_once('classes/class.chapitres.php');
$chapitres_index = new Chapitres;
$chapitres_index = $chapitres_index->get_chapitres_index(0, 3);

// On effectue du traitement sur les données (contrôleur)
foreach($chapitres_index as $chap => $chapitre)
{
    $chapitres_index[$chap]['chapitre_Titre'] = htmlspecialchars($chapitre['chapitre_Titre']);
}


// On affiche la page (vue)
include_once('vue/index.php');