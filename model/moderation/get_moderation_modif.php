<?php
function get_moderation_modif()
{
    global $bdd;
        
    $reponse = $bdd->prepare('SELECT commentaire_ID, commentaire_Nom, commentaire_Message, commentaire_Date FROM blog_commentaire WHERE commentaire_ID = :commentaire_ID');
    $reponse->execute(array(':commentaire_ID' => $_GET['id']));
    $moderation_modif = $reponse->fetchAll();
    
    
    return $moderation_modif;
}
