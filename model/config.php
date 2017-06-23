<?php
ob_start();
session_start();

//déclaration base de données
$bdd = new PDO('mysql:host=localhost;dbname=projet3_oc_cpm;charset=utf8', 'root', 'root');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//set timezone
setlocale(LC_TIME, 'fr','fr_FR','fr_FR@euro','fr_FR.utf8','fr-FR','fra');
strftime(" %d %b %Y "); 
date_default_timezone_set('Europe/Paris');


//chargement de toutes les classes
function __autoload($class) {
   
   //Convert all characters to lowercase
   $class = strtolower($class);

   $classpath = 'classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
    }     

   $classpath = '../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
    }
    
   $classpath = '../../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
    }         
     
}

//création de l'objet $user dans la classe User
$user = new User($bdd); 
?>