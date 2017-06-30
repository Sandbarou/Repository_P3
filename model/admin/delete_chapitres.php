<?php
function delete_chapitres()
{
	global $bdd;

	if(isset($_GET['delpost'])){ 

    	$reponse = $bdd->prepare('DELETE FROM blog_chapitre WHERE chapitre_ID = :chapitre_ID') ;
    	$reponse->execute(array(':chapitre_ID' => $_GET['delpost']));
	    $delete_chap = $reponse;

	    return $delete_chap;
	}

}
