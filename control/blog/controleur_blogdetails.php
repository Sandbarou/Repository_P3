<?php


include_once('model/blog/get_chapitres_blogdetails.php');
$chapitres_blogdetails = get_chapitres_blogdetails();

// On effectue du traitement sur les données (contrôleur)
// Ici, on doit surtout sécuriser l'affichage
foreach($chapitres_blogdetails as $chap => $chapitre)
{
	$chapitres_blogdetails[$chap]['chapitre_ID'] = $chapitre['chapitre_ID'];
    $chapitres_blogdetails[$chap]['chapitre_Titre'] = htmlspecialchars($chapitre['chapitre_Titre']);
    $chapitres_blogdetails[$chap]['chapitre_Auteur'] = htmlspecialchars($chapitre['chapitre_Auteur']);
    $chapitres_blogdetails[$chap]['chapitre_Contenu'] = nl2br($chapitre['chapitre_Contenu']);
}



include_once('model/blog/get_commentaires_blogdetails.php');
$commentaires_blogdetails = get_commentaires_blogdetails();

// On effectue du traitement sur les données (contrôleur)
// Ici, on doit surtout sécuriser l'affichage
foreach($commentaires_blogdetails as $comm => $commentaire)
{
	$commentaires_blogdetails[$comm]['commentaire_ID'] = $commentaire['commentaire_ID'];
    $commentaires_blogdetails[$comm]['commentaire_Niveau'] = $commentaire['commentaire_Niveau'];
	$commentaires_blogdetails[$comm]['commentaire_ID_chapitre'] = $commentaire['commentaire_ID_chapitre'];
	$commentaires_blogdetails[$comm]['commentaire_Nom'] = htmlspecialchars($commentaire['commentaire_Nom']);
    $commentaires_blogdetails[$comm]['commentaire_Message'] = htmlspecialchars($commentaire['commentaire_Message']);
}



include_once('model/blog/get_commentaires.php');
$commentaires = get_commentaires(0, 3);

// On effectue du traitement sur les données (contrôleur)
// Ici, on doit surtout sécuriser l'affichage
foreach($commentaires as $comm => $commentaire)
{
    $commentaires[$comm]['commentaire_Message'] = htmlspecialchars($commentaire['commentaire_Message']);
}



include_once("model/blog/get_chapitres_blog.php");
$chapitres_blog = get_chapitres_blog();

// On effectue du traitement sur les données (contrôleur)
// Ici, on doit surtout sécuriser l'affichage
foreach($chapitres_blog as $chap => $chapitre)
{
    $chapitres_blog[$chap]['chapitre_Titre'] = htmlspecialchars($chapitre['chapitre_Titre']);
    $chapitres_blog[$chap]['chapitre_Auteur'] = htmlspecialchars($chapitre['chapitre_Auteur']);
    $chapitres_blog[$chap]['chapitre_Contenu'] = nl2br($chapitre['chapitre_Contenu']);
}



// On affiche la page (vue)
include_once('vue/blog/blogdetails.php');