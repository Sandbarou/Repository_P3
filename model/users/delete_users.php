<?php
function delete_users()
{
	global $bdd;

	if(isset($_GET['deluser'])){ 

		if($_GET['deluser'] !='1'){

		    $reponse = $bdd->prepare('DELETE FROM blog_user WHERE user_ID = :user_ID') ;
        	$reponse->execute(array(':user_ID' => $_GET['deluser']));
	    	$delete_user = $reponse;

	    	return $delete_user;
		}
	} 
}


