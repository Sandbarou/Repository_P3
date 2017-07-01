<?php

include_once('classes/class.user.php');
$delete_user = new User;
$delete_user = $delete_user->delete_users();

if(isset($_GET['deluser'])){
	if($_GET['deluser'] !='1'){
    	$delete_user->rowCount();
	}
}


$users_list = new User;
$users_list = $users_list->get_users();

// On effectue du traitement sur les données (contrôleur)
foreach($users_list as $cle => $list)
{
    $users_list[$cle]['user_ID'] = $list['user_ID'];
    $users_list[$cle]['user_Pseudo'] = htmlspecialchars($list['user_Pseudo']);
    $users_list[$cle]['user_Email'] = htmlspecialchars($list['user_Email']);
}




// On affiche la page (vue)
include_once('vue/users/users.php');