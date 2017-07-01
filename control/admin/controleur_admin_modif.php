<?php
include_once('classes/class.chapitres.php');
$update_chap = new Chapitres();
$update_chap = $update_chap->update_chapitres();

if(isset($_POST['submit'])){

        $_POST = array_map( 'stripslashes', $_POST );

        // collecter les donnees du formulaire
        extract($_POST);

        // validations
        if($chapitre_ID ==''){
            $error[] = "L'ID de ce chapitre n'est pas valide !";
        }

        if($chapitre_Titre ==''){
            $error[] = "Merci d'écrire un titre";
        }

        if($chapitre_Contenu ==''){
            $error[] = "Merci d'ajouter un contenu";
        }

        if(!isset($error)){
            try {
                	$update_chap->rowCount();
                }
					catch(PDOException $e) {
                       echo $e->getMessage();
            	}
		}
}



$chapitres_admin = new Chapitres();
$chapitres_admin = $chapitres_admin->get_chapitres_admin();

// On effectue du traitement sur les données (contrôleur)
foreach($chapitres_admin as $chap => $chapitre)
{
	$chapitres_admin[$chap]['chapitre_ID'] = $chapitre['chapitre_ID'];
	$chapitres_admin[$chap]['chapitre_Date'] = $chapitre['chapitre_Date'];
    $chapitres_admin[$chap]['chapitre_Titre'] = htmlspecialchars($chapitre['chapitre_Titre']);
    $chapitres_admin[$chap]['chapitre_Auteur'] = htmlspecialchars($chapitre['chapitre_Auteur']);
    $chapitres_admin[$chap]['chapitre_Contenu'] = nl2br($chapitre['chapitre_Contenu']);
}




// On affiche la page (vue)
include_once('vue/admin/backend_modif.php');

