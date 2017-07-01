<?php

include_once('classes/class.commentaires.php');

$update_mod = new Commentaires;
$update_mod = $update_mod->update_moderation();

if(isset($_GET['okcom'])){

    $update_mod->rowCount();
}


$delete_mod = new Commentaires;
$delete_mod = $delete_mod->delete_moderation();

if(isset($_GET['delcom'])){

    $delete_mod->rowCount();
}


$moderation_signal = new Commentaires;
$moderation_signal = $moderation_signal->get_moderation();

// On effectue du traitement sur les données (contrôleur)
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

