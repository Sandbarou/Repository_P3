<?php
function update_moderation_modif()
{
	global $bdd;

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
                //maj base de donnees
                $reponse = $bdd->prepare('UPDATE blog_commentaire SET commentaire_Nom = :commentaire_Nom, commentaire_Message = :commentaire_Message, commentaire_Date = :commentaire_Date WHERE commentaire_ID = :commentaire_ID');
                $reponse->execute(array(
                    ':commentaire_Nom' => $commentaire_Nom,
                    ':commentaire_Message' => $commentaire_Message,
                    ':commentaire_Date' => $commentaire_Date,
                    ':commentaire_ID' => $commentaire_ID
                ));
				$update_mod_modif = $reponse;

				return $update_mod_modif;

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
}

