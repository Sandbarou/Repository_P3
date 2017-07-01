<?php

include_once('classes/class.user.php');
$update_users = new User;
$update_users = $update_users->update_users_modif();

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

                    $update_users->rowCount();

                } else {

                    $update_users->rowCount();

                }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }

        }

    }


$users_modif = new User;
$users_modif = $users_modif->get_users_modif();

// On effectue du traitement sur les données (contrôleur)
foreach($users_modif as $cle => $modif)
{
    $users_modif[$cle]['user_ID'] = $modif['user_ID'];
    $users_modif[$cle]['user_Pseudo'] = htmlspecialchars($modif['user_Pseudo']);
    $users_modif[$cle]['user_Email'] = htmlspecialchars($modif['user_Email']);
}



// On affiche la page (vue)
include_once('vue/users/users_modif.php');