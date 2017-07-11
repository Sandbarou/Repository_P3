<?php

require_once 'models/config.php';
require_once 'models/class.commentaires.php';
require_once 'models/class.chapitres.php';
require_once 'models/class.user.php';
    
function accueil() {
    $chapitres_header = new Chapitres();
    $chapitres_header = $chapitres_header->get_chapitres_header(0, 1);
    
    $chapitres_index = new Chapitres;
    $chapitres_index = $chapitres_index->get_chapitres_index(0, 3);
require 'views/blog/accueil.php';
}    

function blog() {
    $chapitres_header = new Chapitres();
    $chapitres_header = $chapitres_header->get_chapitres_header(0, 1);
    
    $chapitres_blog = new Chapitres();
    $chapitres_blog = $chapitres_blog->get_chapitres_blog();
    
    $commentaires = new Commentaires();
    $commentaires = $commentaires->get_commentaires(0, 3);
    
    $update_commentaires = new Commentaires();
    $update_commentaires = $update_commentaires->update_commentaires_blogdetails();
require 'views/blog/blog.php';
}

function blogdetails($idBillet) {
    $billetids = new Chapitres();
    $billetids = $billetids->getBillet($idBillet);
    
    $update_commentaires = new Commentaires();
    $update_commentaires = $update_commentaires->update_commentaires_blogdetails();    
    
    $chapitres_blogdetails = new Chapitres();
    $chapitres_blogdetails = $chapitres_blogdetails->get_chapitres_blogdetails();
    
    $commentairesids = new Commentaires();
    $commentairesids = $commentairesids->getCommentaires($idBillet);   
    
    $commentaires_blogdetails = new Commentaires();
    $commentaires_blogdetails = $commentaires_blogdetails->get_commentaires_blogdetails();
    
    $insert_commentaires = new Commentaires();
    $insert_commentaires = $insert_commentaires->insert_commentaires_blogdetails();
    
    $commentaires = new Commentaires();
    $commentaires = $commentaires->get_commentaires(0, 3);
    
    $chapitres_blog = new Chapitres();
    $chapitres_blog = $chapitres_blog->get_chapitres_blog();
    
    $chapitres_header = new Chapitres();
    $chapitres_header = $chapitres_header->get_chapitres_header(0, 1);
    
    $update_commentaires = new Commentaires();
    $update_commentaires = $update_commentaires->update_commentaires_blogdetails();  
require 'views/blog/blogdetails.php';
}

// Affiche à propos
function apropos() {
    $chapitres_header = new Chapitres();
    $chapitres_header = $chapitres_header->get_chapitres_header(0, 1);
require 'views/blog/apropos.php';
}

// Affiche contact
function contact() {
    $chapitres_header = new Chapitres();
    $chapitres_header = $chapitres_header->get_chapitres_header(0, 1);
require 'views/blog/contact2.php';
}

// Affiche la page d'erreur
function erreur() {
require 'views/blog/404.php';
}

// Affiche la page login
function login() {
    $chapitres_header = new Chapitres();
    $chapitres_header = $chapitres_header->get_chapitres_header(0, 1);
require 'views/admin/login.php';
}





