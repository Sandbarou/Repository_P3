<?php
function get_chapitres_blogdetails()
{
    global $bdd;
        
    $reponse = $bdd->prepare('SELECT chapitre_ID, chapitre_Titre, chapitre_Auteur, chapitre_Contenu, DATE_FORMAT(chapitre_Date, \'%d/%m/%Y\') AS chapitre_Date_fr FROM blog_chapitre WHERE chapitre_ID = :chapitre_ID');
	$reponse->execute(array(':chapitre_ID' => $_GET['chapitre']));
    $chapitres_blogdetails = $reponse->fetchAll();
    
    
    return $chapitres_blogdetails;
}
