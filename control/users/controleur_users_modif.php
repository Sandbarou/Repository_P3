<?php

include_once('model/users/get_users_modif.php');
$users_modif = get_users_modif();

// On effectue du traitement sur les données (contrôleur)
// Ici, on doit surtout sécuriser l'affichage
foreach($users_modif as $cle => $modif)
{
    $users_modif[$cle]['user_ID'] = $modif['user_ID'];
    $users_modif[$cle]['user_Pseudo'] = htmlspecialchars($modif['user_Pseudo']);
    $users_modif[$cle]['user_Email'] = htmlspecialchars($modif['user_Email']);
}

// On affiche la page (vue)
include_once('vue/users/users_modif.php');