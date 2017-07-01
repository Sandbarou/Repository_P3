<?php


include_once('classes/class.chapitres.php');
$chapitres_header = new Chapitres;
$chapitres_header = $chapitres_header->get_chapitres_header(0, 1);

// On effectue du traitement sur les données (contrôleur)
foreach($chapitres_header as $chap => $chapitre)
{
	$chapitres_header[$chap]['chapitre_ID'] = htmlspecialchars($chapitre['chapitre_ID']);
}


// On affiche la page (vue)
include_once('vue/header.php');






