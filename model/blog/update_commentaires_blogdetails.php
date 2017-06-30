<?php
function update_commentaires_blogdetails()
{
	global $bdd;

	if(isset($_GET['modcom'])){ 

	    $reponse = $bdd->prepare('UPDATE blog_commentaire SET commentaire_Niveau = "1" WHERE commentaire_ID = :commentaire_ID');
	    $reponse->execute(array(':commentaire_ID' => $_GET['modcom']));
	    $update_commentaires = $reponse;

	    return $update_commentaires;
	}

}
