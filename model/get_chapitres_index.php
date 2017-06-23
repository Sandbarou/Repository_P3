<?php
function get_chapitres_index($offset, $limit)
{
    global $bdd;
    $offset = (int) $offset;
    $limit = (int) $limit;
        
    $reponse = $bdd->prepare('SELECT chapitre_ID, chapitre_Titre, DATE_FORMAT(chapitre_Date, \'%d/%m/%Y\') AS chapitre_Date_fr FROM blog_chapitre ORDER BY chapitre_Date ASC LIMIT :offset, :limit');
    $reponse->bindParam(':offset', $offset, PDO::PARAM_INT);
    $reponse->bindParam(':limit', $limit, PDO::PARAM_INT);
    $reponse->execute();
    $chapitres_index = $reponse->fetchAll();
    
    
    return $chapitres_index;
}
