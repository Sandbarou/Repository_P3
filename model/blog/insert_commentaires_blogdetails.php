<?php
function insert_commentaires_blogdetails()
{
    global $bdd;

    // quand le formulaire est envoyé :
    if(isset($_POST['submit'])){

        $_POST = array_map( 'stripslashes', $_POST );

        // collecter les données du formulaire
        extract($_POST);

        // validations
        if($commentaire_Nom == " "){
            $error[] = "Merci d'indiquer votre nom";
        }

        if($commentaire_Message == " "){
            $error[] = "Merci d'ajouter un message";
        }

        if(!isset($error)){

            try {

            //insertion dans la base de données
            $reponse = $bdd->prepare('INSERT INTO blog_commentaire (commentaire_ID_chapitre, commentaire_Nom, commentaire_Message, commentaire_Niveau, commentaire_Date) VALUES (:chapitre_ID, :commentaire_Nom, :commentaire_Message, :commentaire_Niveau, :commentaire_Date)') ;
            $reponse->execute(array(
                ':chapitre_ID' => $commentaire_ID_chapitre,
                ':commentaire_Nom' => $commentaire_Nom,
                ':commentaire_Message' => $commentaire_Message,
                ':commentaire_Niveau' => $commentaire_Niveau,
                ':commentaire_Date' => date('Y-m-d H:i:s'),
            ));

            $insert_commentaires = $reponse;

            return $insert_commentaires;

            } catch(PDOException $e) {
                echo $e->getMessage();
            }

        }
    }
}