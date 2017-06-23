<?php

include_once('model/moderation/get_moderation_modif.php');
$moderation_modif = get_moderation_modif();

// On effectue du traitement sur les données (contrôleur)
// Ici, on doit surtout sécuriser l'affichage
foreach($moderation_modif as $mod => $mod_modif)
{
	$moderation_modif[$mod]['commentaire_ID'] = $mod_modif['commentaire_ID'];
	$moderation_modif[$mod]['commentaire_Nom'] = htmlspecialchars($mod_modif['commentaire_Nom']);
    $moderation_modif[$mod]['commentaire_Message'] = htmlspecialchars($mod_modif['commentaire_Message']);
}

// On affiche la page (vue)
include_once('vue/moderation/moderation_modif.php');
