<?php

require_once 'models/config.php';
require_once 'models/class.commentaires.php';
require_once 'models/class.chapitres.php';
require_once 'models/class.user.php';


// Affiche la page principale admin et liste des billets
function admin() {
    $chapitres_header = new Chapitres();
    $chapitres_header = $chapitres_header->get_chapitres_header(0, 1);
    
    $chapitres_blog = new Chapitres();
    $chapitres_blog = $chapitres_blog->get_chapitres_blog();
    
    $delete_chap = new Chapitres();
    $delete_chap = $delete_chap->delete_chapitres();
require 'views/admin/articles/backend.php';
}

// Affiche la page de modification de billets
function modification() {
    $chapitres_header = new Chapitres();
    $chapitres_header = $chapitres_header->get_chapitres_header(0, 1);
    
    $chapitres_admin = new Chapitres();
    $chapitres_admin = $chapitres_admin->get_chapitres_admin();   
    
    $update_chap = new Chapitres();
    $update_chap = $update_chap->update_chapitres();
require 'views/admin/articles/backend_modif.php';
}

// Affiche la page de rédaction de billets
function redaction() {
    $chapitres_header = new Chapitres();
    $chapitres_header = $chapitres_header->get_chapitres_header(0, 1);
    
    $insert_chap = new Chapitres();
    $insert_chap = $insert_chap->insert_chapitres();
require 'views/admin/articles/backend_redac.php';
}

// Affiche la liste des utilisateurs
function users() {
    $chapitres_header = new Chapitres();
    $chapitres_header = $chapitres_header->get_chapitres_header(0, 1);
    
    $users_list = new User();
    $users_list = $users_list->get_users();
    
    $delete_user = new User();
    $delete_user = $delete_user->delete_users();
require 'views/admin/users/users.php';
}


// Affiche le formulaire de modification des utilisateurs
function users_modif() {
    $chapitres_header = new Chapitres();
    $chapitres_header = $chapitres_header->get_chapitres_header(0, 1);
    
    $update_users = new User();
    $update_users = $update_users->update_users_modif();
    
    $users_modif = new User();
    $users_modif = $users_modif->get_users_modif();
require 'views/admin/users/users_modif.php';
}


// Affiche le formulaire d'ajout des utilisateurs
function users_new() {
    $chapitres_header = new Chapitres();
    $chapitres_header = $chapitres_header->get_chapitres_header(0, 1);
    
    $insert_user = new User();
    $insert_user = $insert_user->insert_users();
require 'views/admin/users/users_new.php';
}

// Affiche les commentaires en attente de modération
function moderation() {
    $chapitres_header = new Chapitres();
    $chapitres_header = $chapitres_header->get_chapitres_header(0, 1);
    
    $moderation_signal = new Commentaires();
    $moderation_signal = $moderation_signal->get_moderation();
    
    $update_mod = new Commentaires();
    $update_mod = $update_mod->update_moderation();
    
    $delete_mod = new Commentaires();
    $delete_mod = $delete_mod->delete_moderation();      
require 'views/admin/moderation/moderation.php';
}

// Affiche le formulaire de modification des commentaires en attente de modération
function mod_modif() {
    $chapitres_header = new Chapitres();
    $chapitres_header = $chapitres_header->get_chapitres_header(0, 1);
    
    $update_mod_modif = new Commentaires();
    $update_mod_modif = $update_mod_modif->update_moderation_modif();
    
    $moderation_modif = new Commentaires();
    $moderation_modif = $moderation_modif->get_moderation_modif();  
require 'views/admin/moderation/moderation_modif.php';      
}

// Quitte la partie admin, retour à la page d'accueil
function sortie() {
    $chapitres_header = new Chapitres();
    $chapitres_header = $chapitres_header->get_chapitres_header(0, 1);

    $user = new User();
require 'views/admin/logout.php';
}




