<?php

require_once 'models/config.php';
require_once 'models/class.commentaires.php';
require_once 'models/class.chapitres.php';
require_once 'models/class.user.php';


function accueil()
{
    $chapitres_header = Chapitres::get_chapitres_header(0, 1);
    $chapitres_index = Chapitres::get_chapitres_index(0, 3);

    require 'views/blog/accueil.php';
}

// -------------------------------------------


function blog()
{
    $chapitres_header = Chapitres::get_chapitres_header(0, 1);
    $chapitres_blog = Chapitres::get_chapitres_blog();
    $commentaires = Commentaires::get_commentaires(0, 3);


    // Signaler un commentaire
    if (isset($_GET['modcom'])) {

        $update_commentaires = new Commentaires($com_Niveau, $com_Auteur, $com_Contenu, $bil_ID);
        $update_commentaires = $update_commentaires->update_commentaires_blogdetails();

        header('Location: index.php?action=blog&signalé');

        exit;
    }

    require 'views/blog/blog.php';
}

// -------------------------------------------


function blogdetails($idBillet)
{
    $billetids = Chapitres::getBillet($idBillet);
    $chapitres_blogdetails = Chapitres::get_chapitres_blogdetails();
    $chapitres_blog = Chapitres::get_chapitres_blog();
    $chapitres_header = Chapitres::get_chapitres_header(0, 1);
    $commentairesids = Commentaires::getCommentaires($idBillet);
    $commentaires_blogdetails = Commentaires::get_commentaires_blogdetails();
    $commentaires = Commentaires::get_commentaires(0, 3);


    // Ajouter un commentaire
    if (isset($_POST['submit'])) {

        $_POST = array_map('stripslashes', $_POST);

        // Collecter les données du formulaire
        extract($_POST);

        // Validations
        if ($com_Auteur == " ") {
            $error[] = "Merci d'indiquer votre nom";
        }

        if ($com_Contenu == " ") {
            $error[] = "Merci d'ajouter un message";
        }

        if (!isset($error)) {
            $datecommentaire = date('Y-m-d H:i:s');
            $insert_commentaires = new Commentaires($com_Niveau, $com_Auteur, $com_Contenu, $bil_ID);
            $insert_commentaires->setCom_Date($datecommentaire);
            $insert_commentaires = $insert_commentaires->insert_commentaires_blogdetails();
        }
    }

    require 'views/blog/blogdetails.php';
}

// -------------------------------------------


function apropos()
{
    $chapitres_header = Chapitres::get_chapitres_header(0, 1);

    require 'views/blog/apropos.php';
}

// -------------------------------------------


function contact()
{
    $chapitres_header = Chapitres::get_chapitres_header(0, 1);

    require 'views/blog/contact2.php';
}

// -------------------------------------------


function erreur()
{
    require 'views/blog/404.php';
}

// -------------------------------------------


function login()
{
    $chapitres_header = Chapitres::get_chapitres_header(0, 1);

    // Vérification si déjà connecté
    $user = new User($bdd);
    if ($user->is_logged_in()) {
        header('Location: index.php?action=admin');
    }


    // Vérification d'authentification
    $user = new User($bdd);
    if (isset($_POST['submit'])) {

        $user_Pseudo = trim($_POST['user_Pseudo']);
        $user_Pass = trim($_POST['user_Pass']);

        if ($user->login($user_Pseudo, $user_Pass)) {

            // Si ok, connexion à la partie admin
            header('Location: index.php?action=admin');
            exit;


        } else {
            $message = 'Mauvais pseudo ou mot de passe. Veuillez réessayer';
        }

    }

    require 'views/admin/login.php';
}
// -------------------------------------------
