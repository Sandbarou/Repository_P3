<?php

require_once 'models/config.php';
require_once 'models/class.commentaires.php';
require_once 'models/class.chapitres.php';
require_once 'models/class.user.php';


function admin() // Affiche la page principale admin et liste des billets
{
    $chapitres_header = Chapitres::get_chapitres_header(0, 1);
    $chapitres_blog = Chapitres::get_chapitres_blog();


    // Si non connecté, retour à la page d'accueil
    $user = new User($bdd);
    if (!$user->is_logged_in()) {
        header('Location: index.php');
    }

    // Effacer un billet
    if (isset($_GET['delpost'])) {

        $delete_chap = new Chapitres($bil_Titre, $bil_Auteur, $bil_Contenu);
        $delete_chap = $delete_chap->delete_chapitres();

        header('Location: index.php?action=admin&effacé');

        exit;
    }

    require 'views/admin/articles/backend.php';
}

// -------------------------------------------


function modification() // Affiche la page de modification de billets
{
    $chapitres_header = Chapitres::get_chapitres_header(0, 1);
    $chapitres_admin = Chapitres::get_chapitres_admin();


    // Si non connecté, retour à la page d'accueil
    $user = new User($bdd);
    if (!$user->is_logged_in()) {
        header('Location: index.php');
    }

    // Modification d'un billet
    if (isset($_POST['submit'])) {

        $_POST = array_map('stripslashes', $_POST);

        // Collecter les données du formulaire
        extract($_POST);

        // Validations
        if ($bil_ID == '') {
            $error[] = "L'ID de ce chapitre n'est pas valide !";
        }

        if ($bil_Titre == '') {
            $error[] = "Merci d'écrire un titre";
        }

        if ($bil_Contenu == '') {
            $error[] = "Merci d'ajouter un contenu";
        }

        if (!isset($error)) {
            try {
                $datebillet = date('Y-m-d H:i:s');
                $update_chap = new Chapitres($bil_Titre, $bil_Auteur, $bil_Contenu);
                $update_chap->setDate($datebillet);
                $update_chap = $update_chap->update_chapitres();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            // Redirection page principale
            header('Location: index.php?action=admin&modifié');
            exit;
        }


    }

    require 'views/admin/articles/backend_modif.php';
}

// -------------------------------------------


function redaction() // Affiche la page de rédaction de billets
{
    $chapitres_header = Chapitres::get_chapitres_header(0, 1);


    // Si non connecté, retour à la page d'accueil
    $user = new User($bdd);
    if (!$user->is_logged_in()) {
        header('Location: index.php');
    }


    // Création d'un nouveau billet
    if (isset($_POST['submit'])) {

        $_POST = array_map('stripslashes', $_POST);

        // Collecter les données du formulaire
        extract($_POST);

        // Validations
        if ($bil_Titre == '') {
            $error[] = "Merci d'écrire un titre";
        }

        if ($bil_Contenu == '') {
            $error[] = "Merci d'ajouter un contenu";
        }


        if (!isset($error)) {
            try {
                $insert_chap = new Chapitres($bil_Titre, $bil_Auteur, $bil_Contenu);
                $insert_chap = $insert_chap->insert_chapitres();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            // Redirection page principale
            header('Location: index.php?action=admin&ajouté');
            exit;
        }

    }

    require 'views/admin/articles/backend_redac.php';
}

// -------------------------------------------


function users() // Affiche la liste des utilisateurs
{
    $chapitres_header = Chapitres::get_chapitres_header(0, 1);

    $users_list = new User();
    $users_list = $users_list->get_users();

    // Si non connecté, retour à la page d'accueil
    $user = new User($bdd);
    if (!$user->is_logged_in()) {
        header('Location: index.php');
    }


    // Effacer un utilisateur
    if (isset($_GET['deluser'])) {

        // Toutes les ID autorisées sauf le 1 pour ne pas effacer l'admin principal
        if ($_GET['deluser'] != '1') {

            $delete_user = new User();
            $delete_user = $delete_user->delete_users();

            header('Location: index.php?action=users&effacé');

            exit;

        }
    }

    require 'views/admin/users/users.php';
}

// -------------------------------------------


function users_modif() // Affiche le formulaire de modification des utilisateurs
{
    $chapitres_header = Chapitres::get_chapitres_header(0, 1);

    $users_modif = new User();
    $users_modif = $users_modif->get_users_modif();

    // Si non connecté, retour à la page d'accueil
    $user = new User($bdd);
    if (!$user->is_logged_in()) {
        header('Location: index.php');
    }


    // Modification d'un utilisateur
    $user = new User($bdd);
    if (isset($_POST['submit'])) {

        // Collecter les données du formulaire
        extract($_POST);

        // Validations
        if ($user_Pseudo == '') {
            $error[] = "Merci d'entrer un pseudo";
        }

        if (strlen($user_Pass) > 0) {

            if ($user_Pass == '') {
                $error[] = "Merci d'entrer un mot de passe";
            }

            if ($user_PassConfirm == '') {
                $error[] = "Merci de confirmer le mot de passe";
            }

            if ($user_Pass != $user_PassConfirm) {
                $error[] = "Les mots de passe ne sont pas identiques";
            }

        }

        // Vérifier si le format email est correct
        if (!filter_var($user_Email, FILTER_VALIDATE_EMAIL)) {
            $error[] = "Merci d'entrer une adresse email valide";
        }

        if (!isset($error)) {
            try {
                if (isset($user_Pass)) {
                    $hashed_user_Pass = $user->create_hash($user_Pass);

                    $update_users = new User();
                    $update_users = $update_users->update_users_modif();

                } else {
                    $update_users = new User();
                    $update_users = $update_users->update_users_modif();
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            // Redirection page principale
            header('Location: index.php?action=users&modifié');
            exit;
        }
    }


    require 'views/admin/users/users_modif.php';
}

// -------------------------------------------


function users_new() // Affiche le formulaire d'ajout des utilisateurs
{
    $chapitres_header = Chapitres::get_chapitres_header(0, 1);

    // Si non connecté, retour à la page d'accueil
    $user = new User($bdd);
    if (!$user->is_logged_in()) {
        header('Location: index.php');
    }

    // Ajout d'un utilisateur
    $user = new User($bdd);
    if (isset($_POST['submit'])) {

        $_POST = array_map('stripslashes', $_POST);

        // Collecter les données du formulaire
        extract($_POST);

        // Validations
        if ($user_Pseudo == "") {
            $error[] = "Merci d'entrer un pseudo";
        }

        if (strlen($user_Pass) >= 0) {

            if ($user_Pass == " ") {
                $error[] = "Merci d'entrer un mot de passe";
            }

            if ($user_PassConfirm == "") {
                $error[] = "Merci de confirmer le mot de passe";
            }

            if ($user_Pass != $user_PassConfirm) {
                $error[] = "Les mots de passe ne sont pas identiques";
            }

        }

        // Vérifier si le format email est correct
        if (!filter_var($user_Email, FILTER_VALIDATE_EMAIL)) {
            $error[] = "Merci d'entrer une adresse email valide";
        }

        if (!isset($error)) {

            $hashed_user_Pass = $user->create_hash($user_Pass);

            try {
                $insert_user = new User();
                $insert_user = $insert_user->insert_users();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            // Redirection page principale
            header('Location: index.php?action=users&ajouté');
            exit;
        }
    }


    require 'views/admin/users/users_new.php';
}

// -------------------------------------------


function moderation() // Affiche les commentaires en attente de modération
{
    $chapitres_header = Chapitres::get_chapitres_header(0, 1);
    $moderation_signal = Commentaires::get_moderation();


    // Si non connecté, retour à la page d'accueil
    $user = new User($bdd);
    if (!$user->is_logged_in()) {
        header('Location: index.php');
    }

    // Supprimer un commentaire
    if (isset($_GET['delcom'])) {

        $delete_mod = new Commentaires($com_Niveau, $com_Auteur, $com_Contenu, $bil_ID);
        $delete_mod = $delete_mod->delete_moderation();

        header('Location: index.php?action=moderation&effacé');
        exit;
    }

    // Valider un commentaire
    if (isset($_GET['okcom'])) {

        $update_mod = new Commentaires($com_Niveau, $com_Auteur, $com_Contenu, $bil_ID);
        $update_mod = $update_mod->update_moderation();

        header('Location: index.php?action=moderation&validé');
        exit;
    }

    require 'views/admin/moderation/moderation.php';
}

// -------------------------------------------


function mod_modif() // Affiche le formulaire de modification des commentaires en attente de modération
{
    $chapitres_header = Chapitres::get_chapitres_header(0, 1);
    $moderation_modif = Commentaires::get_moderation_modif();

    // Si non connecté, retour à la page d'accueil
    $user = new User($bdd);
    if (!$user->is_logged_in()) {
        header('Location: index.php');
    }


    // Modifier les commentaires signalés
    if (isset($_POST['submit'])) {

        $_POST = array_map('stripslashes', $_POST);

        // Collecter les données du formulaire
        extract($_POST);

        // Validations
        if ($com_ID == '') {
            $error[] = "L'ID de ce commentaire n'est pas valide !";
        }

        if ($com_Auteur == '') {
            $error[] = "Merci d'écrire un nom";
        }

        if ($com_Contenu == '') {
            $error[] = "Merci d'ajouter un contenu";
        }

        if (!isset($error)) {
            try {
                $datecommentaire = date('Y-m-d H:i:s');
                $update_mod_modif = new Commentaires($com_Niveau, $com_Auteur, $com_Contenu, $bil_ID);
                $update_mod_modif->setCom_Date($datecommentaire);
                $update_mod_modif = $update_mod_modif->update_moderation_modif();

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            header('Location: index.php?action=moderation&modifié');
            exit;
        }

    }

    require 'views/admin/moderation/moderation_modif.php';
}

// -------------------------------------------


function sortie() // Quitter la partie admin, retour à la page d'accueil
{
    $chapitres_header = Chapitres::get_chapitres_header(0, 1);

    $user = new User();
    require 'views/admin/logout.php';
}
// ------------------------------------------- 