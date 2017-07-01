<?php

include_once('classes/class.chapitres.php');
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


include_once('classes/class.commentaires.php');
$commentaires = new Commentaires();
$commentaires = $commentaires->get_commentaires(0, 3);

// On effectue du traitement sur les données (contrôleur)
foreach($commentaires as $comm => $commentaire)
{
	$commentaires[$comm]['commentaire_ID_chapitre'] = $commentaire['commentaire_ID_chapitre'];
    $commentaires[$comm]['commentaire_Message'] = htmlspecialchars($commentaire['commentaire_Message']);
}


// On affiche la page (vue)
include_once('vue/blog/blog.php');