<?php
function get_users_modif()
{
    global $bdd;
        
    $reponse = $bdd->prepare('SELECT user_ID, user_Pseudo, user_Email FROM blog_user WHERE user_ID = :user_ID');
    $reponse->execute(array(':user_ID' => $_GET['id']));
    $users_modif = $reponse->fetchAll();
    
    
    return $users_modif;
}
