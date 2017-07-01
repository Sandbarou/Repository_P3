<?php
include_once('classes/class.commentaires.php');
$insert_commentaires = new Commentaires();
$insert_commentaires = $insert_commentaires->insert_commentaires_blogdetails();

if(isset($_POST['submit'])){

        $_POST = array_map( 'stripslashes', $_POST );

        // collecter les données du formulaire
        extract($_POST);

        // validations
        if($commentaire_Nom == " "){
            $error[] = "Merci d'indiquer votre nom";
        }

        if($commentaire_Message == " "){
            $error[] = "Merci d'ajouter un message";
        }

        if(!isset($error)){
            try {        
                    $insert_commentaires->rowCount();
                } 
                    catch(PDOException $e) {
                        echo $e->getMessage();
                }
        }
}


$update_commentaires = new Commentaires();
$update_commentaires = $update_commentaires->update_commentaires_blogdetails();

if(isset($_GET['modcom'])){

    $update_commentaires->rowCount();
}


$commentaires_blogdetails = new Commentaires();
$commentaires_blogdetails = $commentaires_blogdetails->get_commentaires_blogdetails();

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


$commentaires = new Commentaires();
$commentaires = $commentaires->get_commentaires(0, 3);

// On effectue du traitement sur les données (contrôleur)
foreach($commentaires as $comm => $commentaire)
{
    $commentaires[$comm]['commentaire_Message'] = htmlspecialchars($commentaire['commentaire_Message']);
}



include_once('classes/class.chapitres.php');
$chapitres_blog = new Chapitres();
$chapitres_blog = $chapitres_blog->get_chapitres_blog();

// On effectue du traitement sur les données (contrôleur)
foreach($chapitres_blog as $chap => $chapitre)
{
    $chapitres_blog[$chap]['chapitre_Titre'] = htmlspecialchars($chapitre['chapitre_Titre']);
    $chapitres_blog[$chap]['chapitre_Auteur'] = htmlspecialchars($chapitre['chapitre_Auteur']);
    $chapitres_blog[$chap]['chapitre_Contenu'] = nl2br($chapitre['chapitre_Contenu']);
}



$chapitres_blogdetails = new Chapitres();
$chapitres_blogdetails = $chapitres_blogdetails->get_chapitres_blogdetails();

// On effectue du traitement sur les données (contrôleur)
foreach($chapitres_blogdetails as $chap => $chapitre)
{
    $chapitres_blogdetails[$chap]['chapitre_ID'] = $chapitre['chapitre_ID'];
    $chapitres_blogdetails[$chap]['chapitre_Titre'] = htmlspecialchars($chapitre['chapitre_Titre']);
    $chapitres_blogdetails[$chap]['chapitre_Auteur'] = htmlspecialchars($chapitre['chapitre_Auteur']);
    $chapitres_blogdetails[$chap]['chapitre_Contenu'] = nl2br($chapitre['chapitre_Contenu']);
}


// On affiche la page (vue)
include_once('vue/blog/blogdetails.php');