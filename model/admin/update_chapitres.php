<?php
function update_chapitres()
{
    global $bdd;

    // quand le formulaire est envoye :
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

                //maj base de donnees
                $reponse = $bdd->prepare('UPDATE blog_chapitre SET chapitre_Auteur = :chapitre_Auteur, chapitre_Titre = :chapitre_Titre, chapitre_Contenu = :chapitre_Contenu, chapitre_Date = :chapitre_Date WHERE chapitre_ID = :chapitre_ID') ;
                $reponse->execute(array(
                    ':chapitre_Auteur' => $chapitre_Auteur,
                    ':chapitre_Titre' => $chapitre_Titre,
                    ':chapitre_Contenu' => $chapitre_Contenu,
                    ':chapitre_Date' => $chapitre_Date,
                    ':chapitre_ID' => $chapitre_ID
                ));

                $update_chap = $reponse;

                return $update_chap;

            } catch(PDOException $e) {
                echo $e->getMessage();
            }

        }

    }
    
}