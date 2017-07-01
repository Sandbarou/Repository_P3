<?php

include_once('classes/class.commentaires.php');
$update_mod_modif = new Commentaires;
$update_mod_modif = $update_mod_modif->update_moderation_modif();

if(isset($_POST['submit'])){

        $_POST = array_map( 'stripslashes', $_POST );

        // collecter les donnees du formulaire
        extract($_POST);

        // validations
        if($commentaire_ID ==''){
            $error[] = "L'ID de ce commentaire n'est pas valide !";
        }

        if($commentaire_Nom ==''){
            $error[] = "Merci d'écrire un nom";
        }

        if($commentaire_Message ==''){
            $error[] = "Merci d'ajouter un contenu";
        }

        if(!isset($error)){

            try {
    				$update_mod_modif->rowCount();
				} 	
					catch(PDOException $e) {
                       echo $e->getMessage();
            	}
		}
}



$moderation_modif = new Commentaires;
$moderation_modif = $moderation_modif->get_moderation_modif();

// On effectue du traitement sur les données (contrôleur)
foreach($moderation_modif as $mod => $mod_modif)
{
	$moderation_modif[$mod]['commentaire_ID'] = $mod_modif['commentaire_ID'];
	$moderation_modif[$mod]['commentaire_Nom'] = htmlspecialchars($mod_modif['commentaire_Nom']);
    $moderation_modif[$mod]['commentaire_Message'] = htmlspecialchars($mod_modif['commentaire_Message']);
}



// On affiche la page (vue)
include_once('vue/moderation/moderation_modif.php');
