<?php
function get_chapitres_admin()
{
    global $bdd;
        
    $reponse = $bdd->prepare('SELECT chapitre_ID, chapitre_Titre, chapitre_Auteur, chapitre_Contenu, chapitre_Date FROM blog_chapitre WHERE chapitre_ID = :chapitre_ID');
	$reponse->execute(array(':chapitre_ID' => $_GET['chapitre']));
    $chapitres_admin = $reponse->fetchAll();
    
    
    return $chapitres_admin;
}
