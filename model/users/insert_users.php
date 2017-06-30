<?php
function insert_users()
{
    global $bdd;
    $user = new User($bdd); 

    // quand le formulaire est envoye :
    if(isset($_POST['submit'])){

        $_POST = array_map( 'stripslashes', $_POST );

        // collecter les donnees du formulaire
        extract($_POST);

        // validations
        if($user_Pseudo == ""){
            $error[] = "Merci d'entrer un pseudo";
        }

        if( strlen($user_Pass) >= 0){

            if($user_Pass == " "){
                $error[] = "Merci d'entrer un mot de passe";
            }

            if($user_PassConfirm == ""){
                $error[] = "Merci de confirmer le mot de passe";
            }

            if($user_Pass != $user_PassConfirm){
                $error[] = "Les mots de passe ne sont pas identiques";
            }

        }

        // check if e-mail address is well-formed
        if(!filter_var($user_Email, FILTER_VALIDATE_EMAIL)){
            $error[] = "Merci d'entrer une adresse email valide";
        }

        if(!isset($error)){

            $hashed_user_Pass = $user->create_hash($user_Pass);

            try {

                //insertion dans la base de donnees
                $reponse = $bdd->prepare('INSERT INTO blog_user (user_Pseudo, user_Pass, user_Email) VALUES (:user_Pseudo, :user_Pass, :user_Email)') ;
                $reponse->execute(array(
                    ':user_Pseudo' => $user_Pseudo,
                    ':user_Pass' => $hashed_user_Pass,
                    ':user_Email' => $user_Email
                ));

                $insert_user = $reponse;

                return $insert_user;

            } catch(PDOException $e) {
                echo $e->getMessage();
            }

        }

    }

}