<?php
//include config
include_once('model/config.php');

//log user out
$user->logout();
header("Location:accueil.php"); 

?>