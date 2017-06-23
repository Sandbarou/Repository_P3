<?php
function get_commentaires($offset, $limit)
{
    global $bdd;
    $offset = (int) $offset;
    $limit = (int) $limit;
        
    $reponse = $bdd->prepare('SELECT commentaire_Message, commentaire_ID_chapitre, DATE_FORMAT(commentaire_Date, \'%d/%m/%Y\') AS commentaire_Date_fr FROM blog_commentaire ORDER BY commentaire_Date DESC LIMIT :offset, :limit');
    $reponse->bindParam(':offset', $offset, PDO::PARAM_INT);
    $reponse->bindParam(':limit', $limit, PDO::PARAM_INT);
    $reponse->execute();
    $commentaires = $reponse->fetchAll();
    
    
    return $commentaires;
}
