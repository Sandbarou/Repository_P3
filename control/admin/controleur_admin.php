<?php

include_once('classes/class.chapitres.php');
$delete_chap = new Chapitres();
$delete_chap = $delete_chap->delete_chapitres();

if(isset($_GET['delpost'])){

    $delete_chap->rowCount();
}



$chapitres_blog = new Chapitres();
$chapitres_blog = $chapitres_blog->get_chapitres_blog();

// On effectue du traitement sur les données (contrôleur)
foreach($chapitres_blog as $chap => $chapitre)
{
	$chapitres_blog[$chap]['chapitre_ID'] = $chapitre['chapitre_ID'];
    $chapitres_blog[$chap]['chapitre_Titre'] = htmlspecialchars($chapitre['chapitre_Titre']);
    $chapitres_blog[$chap]['chapitre_Auteur'] = htmlspecialchars($chapitre['chapitre_Auteur']);
    $chapitres_blog[$chap]['chapitre_Contenu'] = nl2br($chapitre['chapitre_Contenu']);
}

// On affiche la page (vue)
include_once('vue/admin/backend.php');
