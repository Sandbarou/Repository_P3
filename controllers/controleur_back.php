<?php

require_once 'models/config.php';
require_once 'models/class.commentaires.php';
require_once 'models/class.chapitres.php';
require_once 'models/class.user.php';


// -----  Affiche la page principale admin et liste des billets
function admin()
{
    $chapitres_header = Chapitres::get_chapitres_header(0, 1);
    $chapitres_blog = Chapitres::get_chapitres_blog();


    // Effacer un billet
    if (isset($_GET['delpost'])) {
        $delete_chap = new Chapitres($BIL_TITRE, $BIL_AUTEUR, $BIL_CONTENU);
        $delete_chap = $delete_chap->delete_chapitres();
    }
    require 'views/admin/articles/backend.php';
}

// ----- Affiche la page de modification de billets
function modification()
{
    $chapitres_header = Chapitres::get_chapitres_header(0, 1);
    $chapitres_admin = Chapitres::get_chapitres_admin();


    // Modification d'un billet
    if (isset($_POST['submit'])) {

        $_POST = array_map('stripslashes', $_POST);

        // collecter les donnees du formulaire
        extract($_POST);

        // validations
        if ($BIL_ID == '') {
            $error[] = "L'ID de ce chapitre n'est pas valide !";
        }

        if ($BIL_TITRE == '') {
            $error[] = "Merci d'écrire un titre";
        }

        if ($BIL_CONTENU == '') {
            $error[] = "Merci d'ajouter un contenu";
        }

        if (!isset($error)) {
            try {
                $datebillet = date('Y-m-d H:i:s');
                $update_chap = new Chapitres($BIL_TITRE, $BIL_AUTEUR, $BIL_CONTENU);
                $update_chap->setDate($datebillet);
                $update_chap = $update_chap->update_chapitres();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            //redirection page principale
            header('Location: index.php?action=admin&modifié');
            exit;
        }


    }

    require 'views/admin/articles/backend_modif.php';
}

// ----- Affiche la page de rédaction de billets
function redaction()
{
    $chapitres_header = Chapitres::get_chapitres_header(0, 1);


    // Création d'un nouveau billet
    if (isset($_POST['submit'])) {

        $_POST = array_map('stripslashes', $_POST);

        // collecter les donnees du formulaire
        extract($_POST);

        // validations
        if ($BIL_TITRE == '') {
            $error[] = "Merci d'écrire un titre";
        }

        if ($BIL_CONTENU == '') {
            $error[] = "Merci d'ajouter un contenu";
        }


        if (!isset($error)) {
            try {
                $insert_chap = new Chapitres($BIL_TITRE, $BIL_AUTEUR, $BIL_CONTENU);
                $insert_chap = $insert_chap->insert_chapitres();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            //redirection page principale
            header('Location: index.php?action=admin&ajouté');
            exit;
        }

    }

    require 'views/admin/articles/backend_redac.php';
}

// ----- Affiche la liste des utilisateurs
function users()
{
    $chapitres_header = Chapitres::get_chapitres_header(0, 1);

    $users_list = new User();
    $users_list = $users_list->get_users();

    $delete_user = new User();
    $delete_user = $delete_user->delete_users();

    require 'views/admin/users/users.php';
}


// ----- Affiche le formulaire de modification des utilisateurs
function users_modif()
{
    $chapitres_header = Chapitres::get_chapitres_header(0, 1);

    $users_modif = new User();
    $users_modif = $users_modif->get_users_modif();

    // Modification d'un utilisateur
    $user = new User($bdd);
    if (isset($_POST['submit'])) {

        // collecter les données du formulaire
        extract($_POST);

        // validations
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

        // check if e-mail address is well-formed
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

            //redirection page principale
            header('Location: index.php?action=users&modifié');
            exit;
        }
    }


    require 'views/admin/users/users_modif.php';
}


// ----- Affiche le formulaire d'ajout des utilisateurs
function users_new()
{
    $chapitres_header = Chapitres::get_chapitres_header(0, 1);


    // Ajout d'un utilisateur
    $user = new User($bdd);
    if (isset($_POST['submit'])) {

        $_POST = array_map('stripslashes', $_POST);

        // collecter les donnees du formulaire
        extract($_POST);

        // validations
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

        // check if e-mail address is well-formed
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

            //redirection page principale
            header('Location: index.php?action=users&ajouté');
            exit;
        }
    }


    require 'views/admin/users/users_new.php';
}

// ----- Affiche les commentaires en attente de modération
function moderation()
{
    $chapitres_header = Chapitres::get_chapitres_header(0, 1);
    $moderation_signal = Commentaires::get_moderation();

    if (isset($_GET['delcom'])) {
        $delete_mod = new Commentaires($COM_NIVEAU, $COM_AUTEUR, $COM_CONTENU, $BIL_ID);
        $delete_mod = $delete_mod->delete_moderation();
    }

    if (isset($_GET['okcom'])) {
        $update_mod = new Commentaires($COM_NIVEAU, $COM_AUTEUR, $COM_CONTENU, $BIL_ID);
        $update_mod = $update_mod->update_moderation();
    }
    require 'views/admin/moderation/moderation.php';
}

// ----- Affiche le formulaire de modification des commentaires en attente de modération
function mod_modif()
{
    $chapitres_header = Chapitres::get_chapitres_header(0, 1);
    $moderation_modif = Commentaires::get_moderation_modif();


    // Modifier les commentaires signalés
    if (isset($_POST['submit'])) {

        $_POST = array_map('stripslashes', $_POST);

        // collecter les donnees du formulaire
        extract($_POST);

        // validations
        if ($COM_ID == '') {
            $error[] = "L'ID de ce commentaire n'est pas valide !";
        }

        if ($COM_AUTEUR == '') {
            $error[] = "Merci d'écrire un nom";
        }

        if ($COM_CONTENU == '') {
            $error[] = "Merci d'ajouter un contenu";
        }

        if (!isset($error)) {
            try {
                $datecommentaire = date('Y-m-d H:i:s');
                $update_mod_modif = new Commentaires($COM_NIVEAU, $COM_AUTEUR, $COM_CONTENU, $BIL_ID);
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

// ----- Quitte la partie admin, retour à la page d'accueil
function sortie()
{
    $chapitres_header = Chapitres::get_chapitres_header(0, 1);

    $user = new User();
    require 'views/admin/logout.php';
}
