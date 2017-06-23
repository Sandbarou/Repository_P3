<?php
function get_commentaires_blogdetails()
{
    global $bdd;
        
    $reponse = $bdd->prepare('SELECT commentaire_ID, commentaire_Niveau, commentaire_ID_chapitre, commentaire_Nom, commentaire_Message, DATE_FORMAT(commentaire_Date, \'%d/%m/%Y à %Hh%imin%ss\') AS commentaire_Date_fr FROM blog_commentaire WHERE commentaire_ID_chapitre = :chapitre_ID ORDER BY commentaire_Date');
    $reponse->execute(array(':chapitre_ID' => $_GET['chapitre']));
    $commentaires_blogdetails = $reponse->fetchAll();
    
    
    return $commentaires_blogdetails;
}
