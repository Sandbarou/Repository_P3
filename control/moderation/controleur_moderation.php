<?php

include_once('model/moderation/get_moderation.php');
$moderation_signal = get_moderation();

// On effectue du traitement sur les données (contrôleur)
// Ici, on doit surtout sécuriser l'affichage
foreach($moderation_signal as $mod => $mod_signal)
{
	$moderation_signal[$mod]['commentaire_ID'] = $mod_signal['commentaire_ID'];
    $moderation_signal[$mod]['commentaire_Niveau'] = $mod_signal['commentaire_Niveau'];
	$moderation_signal[$mod]['commentaire_ID_chapitre'] = $mod_signal['commentaire_ID_chapitre'];
	$moderation_signal[$mod]['commentaire_Nom'] = htmlspecialchars($mod_signal['commentaire_Nom']);
    $moderation_signal[$mod]['commentaire_Message'] = htmlspecialchars($mod_signal['commentaire_Message']);
}

// On affiche la page (vue)
include_once('vue/moderation/moderation.php');

