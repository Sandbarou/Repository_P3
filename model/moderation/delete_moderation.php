<?php
function delete_moderation()
{
	global $bdd;

	if(isset($_GET['delcom'])){ 

    	$reponse = $bdd->prepare('DELETE FROM blog_commentaire WHERE commentaire_ID = :commentaire_ID') ;
    	$reponse->execute(array(':commentaire_ID' => $_GET['delcom']));
	    $delete_mod = $reponse;

	    return $delete_mod;
	}

}
