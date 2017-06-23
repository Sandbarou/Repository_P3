<?php
function get_users()
{
    global $bdd;
        
    $reponse = $bdd->prepare('SELECT user_ID, user_Pseudo, user_Email FROM blog_user ORDER BY user_ID ASC');
    $reponse->execute();
    $users_list = $reponse->fetchAll();
    
    
    return $users_list;
}

