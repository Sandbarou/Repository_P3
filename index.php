<?php

require_once 'controllers/controleur_front.php';
require_once 'controllers/controleur_back.php';

if (isset($_GET['action'])) {

    if ($_GET['action'] == 'apropos') { apropos(); }

    if ($_GET['action'] == 'contact') { contact(); }

    if ($_GET['action'] == 'blog') { blog(); }

    if ($_GET['action'] == 'login') { login(); }  

    if ($_GET['action'] == 'admin') { admin(); }  

    if ($_GET['action'] == 'modification') { modification(); }  

    if ($_GET['action'] == 'redaction') { redaction(); }  

    if ($_GET['action'] == 'users') { users(); } 

    if ($_GET['action'] == 'users_new') { users_new(); } 

    if ($_GET['action'] == 'users_modif') { users_modif(); } 

    if ($_GET['action'] == 'moderation') { moderation(); } 

    if ($_GET['action'] == 'mod_modif') { mod_modif(); } 

    if ($_GET['action'] == 'sortie') { sortie(); } 

}
    
          

try {
    if (isset($_GET['action'])) {        

        if ($_GET['action'] == 'billet') {
            if (isset($_GET['id'])) {
                $idBillet = intval($_GET['id']);
                if ($idBillet != 0)
                    blogdetails($idBillet);
                else
                    throw new Exception("Identifiant de billet non valide");
            }
        else
        throw new Exception("Identifiant de billet non défini");
        }

    else
    throw new Exception("Action non valide");
    }

else {
accueil(); // action par défaut
}

}
catch (Exception $e) {
    erreur($e->getMessage());
}
