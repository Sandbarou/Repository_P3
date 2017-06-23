<?php 

// si non connecte, retour à la page de login
if(!$user->is_logged_in()){ header('Location: login.php'); }

//message quand on supprime un commentaire
if(isset($_GET['delcom'])){ 

    $reponse = $bdd->prepare('DELETE FROM blog_commentaire WHERE commentaire_ID = :commentaire_ID') ;
    $reponse->execute(array(':commentaire_ID' => $_GET['delcom']));

    header('Location: moderation.php?action=effacé');
    exit;
} 

//message quand on valide un commentaire
if(isset($_GET['okcom'])){ 

    $reponse = $bdd->prepare('UPDATE blog_commentaire SET commentaire_Niveau = "0" WHERE commentaire_ID = :commentaire_ID');
    $reponse->execute(array(':commentaire_ID' => $_GET['okcom']));

    header('Location: moderation.php?action=validé');
    exit;
} 


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <script language="JavaScript" type="text/javascript">
        function delcom(commentaire_ID, commentaire_Nom)
        {
         if (confirm("Etes-vous sûr de vouloir effacer le commentaire de " + commentaire_Nom + " ?"))
            {
            window.location.href = 'moderation.php?delcom=' + commentaire_ID;
            }
        }
    </script>

    <script language="JavaScript" type="text/javascript">
        function okcom(commentaire_ID, commentaire_Nom)
        {
         if (confirm("Voulez-vous valider le commentaire de " + commentaire_Nom + " ?"))
            {
            window.location.href = 'moderation.php?okcom=' + commentaire_ID;
            }
        }
    </script>

<?php include("vue/window_title.php"); ?>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet"> 
    <link href="css/animate.min.css" rel="stylesheet"> 
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->       

<?php include("vue/window_icon.php"); ?>

</head><!--/head-->

<body>

<?php include_once('control/controleur_header.php'); ?>   
    <!--/#header-->

<?php include("vue/menu_admin.php"); ?> 

 
    <section id="blog" class="padding-top">
        <div class="container">
            <div class="row">
               <div class="col-md-9 col-sm-7">
                    <div class="row">   

<?php 
//message quand on ajoute ou modifie ou supprime un commentaire
    if(isset($_GET['action'])){ 
    echo '<h3>Commentaire '.$_GET['action'].'.</h3>'; 
    } 
?>



<?php    
foreach($moderation_signal as $mod_signal)
{
?>



                                    
                        <ul class="media-list">
                            <li class="media">
                                <div class="post-comment">
                                    <div class="media-body">
                                        <h2 class="post-title bold"><a href="blogdetails.php?chapitre=<?php echo $mod_signal['commentaire_ID_chapitre']; ?>"><img src="images/blog/<?php echo $chapitre['chapitre_ID']; ?>.jpg" class="img-responsive" width="30%" alt="illustration">Commentaire de <?php echo $mod_signal['commentaire_Nom']; ?> dans le chapitre <?php echo $mod_signal['commentaire_ID_chapitre']; ?> </a></h2>
                                        <h3 class="post-author"><?php echo $mod_signal['commentaire_Message']; ?> </h3>
                                        <h3 class="post-author">Posté le <?php echo $mod_signal['commentaire_Date_fr']; ?> </h3>
                                            <p><a href="moderation_modif.php?id=<?php echo $mod_signal['commentaire_ID']; ?>">Pour modifier ce commentaire, cliquez ici !</a></p>
                                            <p><a href="javascript:okcom('<?php echo $mod_signal['commentaire_ID'];?>','<?php echo $mod_signal['commentaire_Nom'];?>')"> Valider ce commentaire </a></p>
                                            <p><a href="javascript:delcom('<?php echo $mod_signal['commentaire_ID'];?>','<?php echo $mod_signal['commentaire_Nom'];?>')"> Effacer ce commentaire </a></p>
                                            <hr style="height:3px"; color="grey";>
                                        
                                    </div>
                                </div>
                                                    
<?php
}
?>
     
            </div>
        </div>
    </section>


    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>  


        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <img src="images/home/image_under2.jpg" class="img-responsive inline" alt="">
                </div>
                <div class="col-sm-12">
                    <div class="copyright-text text-center">
                        <p>&copy; Blog de Jean Forteroche 2017. Tous droits réservés.</p>
                        <a href=login.php>Connexion</a>
                    </div>
                </div>
            </div>
        </div>


</body>
</html>
