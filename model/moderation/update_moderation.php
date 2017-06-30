<?php
function update_moderation()
{
	global $bdd;

	if(isset($_GET['okcom'])){ 

    	$reponse = $bdd->prepare('UPDATE blog_commentaire SET commentaire_Niveau = "0" WHERE commentaire_ID = :commentaire_ID');
    	$reponse->execute(array(':commentaire_ID' => $_GET['okcom']));
	    $update_mod = $reponse;

	    return $update_mod;
	}

}

