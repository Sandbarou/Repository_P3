<?php

include_once('model/users/get_users.php');
$users_list = get_users();

// On effectue du traitement sur les données (contrôleur)
// Ici, on doit surtout sécuriser l'affichage
foreach($users_list as $cle => $list)
{
    $users_list[$cle]['user_ID'] = $list['user_ID'];
    $users_list[$cle]['user_Pseudo'] = htmlspecialchars($list['user_Pseudo']);
    $users_list[$cle]['user_Email'] = htmlspecialchars($list['user_Email']);
}

// On affiche la page (vue)
include_once('vue/users/users.php');