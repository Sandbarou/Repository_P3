<?php

require_once 'controllers/controleur_front.php';
require_once 'controllers/controleur_back.php';

  
try {
    if (isset($_GET['action'])) {
        
        if ($_GET['action'] == 'apropos') { apropos(); }

        elseif ($_GET['action'] == 'contact') { contact(); }

        elseif ($_GET['action'] == 'blog') { blog(); }

        elseif ($_GET['action'] == 'login') { login(); }  

        elseif ($_GET['action'] == 'admin') { admin(); }  

        elseif ($_GET['action'] == 'modification') { modification(); }  

        elseif ($_GET['action'] == 'redaction') { redaction(); }  

        elseif ($_GET['action'] == 'users') { users(); } 

        elseif ($_GET['action'] == 'users_new') { users_new(); } 

        elseif ($_GET['action'] == 'users_modif') { users_modif(); } 

        elseif ($_GET['action'] == 'moderation') { moderation(); } 

        elseif ($_GET['action'] == 'mod_modif') { mod_modif(); } 

        elseif ($_GET['action'] == 'sortie') { sortie(); } 

        elseif($_GET['action'] == 'billet') {
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










