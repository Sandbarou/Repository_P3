<?php
function update_users_modif()
{
	global $bdd;
	$user = new User($bdd); 
	

// quand le formulaire est envoye :
    if(isset($_POST['submit'])){

        // collecter les données du formulaire
        extract($_POST);

        // validations
        if($user_Pseudo ==''){
            $error[] = "Merci d'entrer un pseudo";
        }

        if( strlen($user_Pass) > 0){

            if($user_Pass ==''){
                $error[] = "Merci d'entrer un mot de passe";
            }

            if($user_PassConfirm ==''){
                $error[] = "Merci de confirmer le mot de passe";
            }

            if($user_Pass != $user_PassConfirm){
                $error[] = "Les mots de passe ne sont pas identiques";
            }
        }

        if($user_Email ==''){
            $error[] = "Merci d'entrer une adresse email";
        }

        if(!isset($error)){
            try {
                if(isset($user_Pass)){

                    $hashed_user_Pass = $user->create_hash($user_Pass);

                    //maj base de donnees
                    $reponse = $bdd->prepare('UPDATE blog_user SET user_Pseudo = :user_Pseudo, user_Pass = :user_Pass, user_Email = :user_Email WHERE user_ID = :user_ID') ;
                    $reponse->execute(array(
                        ':user_Pseudo' => $user_Pseudo,
                        ':user_Pass' => $hashed_user_Pass,
                        ':user_Email' => $user_Email,
                        ':user_ID' => $user_ID
                    ));

                    $update_users = $reponse;

					return $update_users;

                } else {
                    //maj base de donnees
                    $reponse = $bdd->prepare('UPDATE blog_user SET user_Pseudo = :user_Pseudo, user_Email = :user_Email WHERE user_ID = :user_ID') ;
                    $reponse->execute(array(
                        ':user_Pseudo' => $user_Pseudo,
                        ':user_Email' => $user_Email,
                        ':user_ID' => $user_ID
                    ));

                    $update_users = $reponse;

					return $update_users;

                }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }

        }

    }
}