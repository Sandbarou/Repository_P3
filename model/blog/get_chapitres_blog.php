<?php
function get_chapitres_blog()
{
    global $bdd;
        
    $reponse = $bdd->prepare('SELECT chapitre_ID, chapitre_Titre, chapitre_Auteur, chapitre_Contenu, DATE_FORMAT(chapitre_Date, \'%d/%m/%Y\') AS chapitre_Date_fr FROM blog_chapitre ORDER BY chapitre_Date DESC');
    $reponse->execute();
    $chapitres_blog = $reponse->fetchAll();
    
    
    return $chapitres_blog;
}
