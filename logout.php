<?php
// config
include_once('src/config.php');

//deco utilisateur
$user->logout();
header("Location:index.php"); 

?>