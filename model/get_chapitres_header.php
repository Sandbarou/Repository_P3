<?php
function get_chapitres_header($offset, $limit)
{
    global $bdd;
    $offset = (int) $offset;
    $limit = (int) $limit;
        
    $reponse = $bdd->prepare('SELECT chapitre_ID, DATE_FORMAT(chapitre_Date, \'%d/%m/%Y\') AS chapitre_Date_fr FROM blog_chapitre ORDER BY chapitre_Date DESC LIMIT :offset, :limit');
    $reponse->bindParam(':offset', $offset, PDO::PARAM_INT);
    $reponse->bindParam(':limit', $limit, PDO::PARAM_INT);
    $reponse->execute();
    $chapitres_header = $reponse->fetchAll();
    
    
    return $chapitres_header;
}
