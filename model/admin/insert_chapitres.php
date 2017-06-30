<?php
function insert_chapitres()
{
    global $bdd;

    // quand le formulaire est envoye :
    if(isset($_POST['submit'])){

        $_POST = array_map( 'stripslashes', $_POST );

        // collecter les donnees du formulaire
        extract($_POST);

        // validations
        if($chapitre_Titre ==''){
            $error[] = "Merci d'écrire un titre";
        }

        if($chapitre_Contenu ==''){
            $error[] = "Merci d'ajouter un contenu";
        }

        if(!isset($error)){

            try {

                //insertion dans la base de donnees
                $reponse = $bdd->prepare('INSERT INTO blog_chapitre (chapitre_Auteur, chapitre_Titre, chapitre_Contenu, chapitre_Date) VALUES (:chapitre_Auteur, :chapitre_Titre, :chapitre_Contenu, :chapitre_Date)') ;
                $reponse->execute(array(
                    ':chapitre_Auteur' => $chapitre_Auteur,
                    ':chapitre_Titre' => $chapitre_Titre,
                    ':chapitre_Contenu' => $chapitre_Contenu,
                    ':chapitre_Date' => $chapitre_Date,
                ));

                $insert_chap = $reponse;

                return $insert_chap;

            } catch(PDOException $e) {
                echo $e->getMessage();
            }

        }

    }
    
}