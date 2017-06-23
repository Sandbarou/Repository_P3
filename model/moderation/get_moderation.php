<?php
function get_moderation()
{
    global $bdd;
        
    $reponse = $bdd->prepare('SELECT commentaire_ID, commentaire_Niveau, commentaire_ID_chapitre, commentaire_Nom, commentaire_Message, DATE_FORMAT(commentaire_Date, \'%d/%m/%Y à %Hh%imin%ss\') AS commentaire_Date_fr FROM blog_commentaire WHERE commentaire_Niveau = "1"');
    $reponse->execute();
    $moderation_signal = $reponse->fetchAll();
    
    
    return $moderation_signal;
}

