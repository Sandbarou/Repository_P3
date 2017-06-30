<?php

include_once('model/admin/insert_chapitres.php');
$insert_chap = insert_chapitres();

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
                	$insert_chap->rowCount();
            	} 
            		catch(PDOException $e) {
                		echo $e->getMessage();
            	}

        }
        
}


// On affiche la page (vue)
include_once('vue/admin/backend_redac.php');


