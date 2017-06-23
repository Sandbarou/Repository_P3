<?php

// si non connecte, retour à la page de login
if(!$user->is_logged_in()){ header('Location: login.php'); }

//message quand on ajoute ou modifie ou supprime une page
if(isset($_GET['delpost'])){ 

    $reponse = $bdd->prepare('DELETE FROM blog_chapitre WHERE chapitre_ID = :chapitre_ID') ;
    $reponse->execute(array(':chapitre_ID' => $_GET['delpost']));

    header('Location: admin.php?action=effacé');
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
        function delpost(chapitre_ID, chapitre_Titre)
        {
         if (confirm("Etes-vous sûr de vouloir effacer le " + chapitre_Titre + " ?"))
            {
            window.location.href = 'admin.php?delpost=' + chapitre_ID;
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
//message quand on ajoute ou modifie ou supprime une page
    if(isset($_GET['action'])){ 
    echo '<h3>Chapitre '.$_GET['action'].'.</h3>'; 
    } 
?>

<?php
foreach($chapitres_blog as $chapitre)
{
?>



                         <div class="col-sm-12 col-md-12">
                            <div class="single-blog single-column">
                            <img src="images/blog/<?php echo $chapitre['chapitre_ID']; ?>.jpg" class="img-responsive" width=30%; alt="illustration">
                                 <div class="post-content overflow">
                                    <h2 class="post-title bold"><a href="blogdetails.php?chapitre=<?php echo $chapitre['chapitre_ID']; ?>"> <?php echo $chapitre['chapitre_Titre']; ?> </a></h2>
                                    <h3 class="post-author"><a href="aboutus.php">Posté par <?php echo $chapitre['chapitre_Auteur'] . ' le ' . $chapitre['chapitre_Date_fr']; ?> </a></h3>
                                    <p><?php echo substr($chapitre['chapitre_Contenu'], 0, 300); ?>...</p>
                                    <p><a href="blogdetails.php?chapitre=<?php echo $chapitre['chapitre_ID']; ?>" class="read-more">Voir plus</a></p>
                                    <p><a href="backend_modif.php?chapitre=<?php echo $chapitre['chapitre_ID']; ?>">Pour modifier un chapitre, cliquez ici !</a></p>
                                    <p><a href="javascript:delpost('<?php echo $chapitre['chapitre_ID'];?>','<?php echo $chapitre['chapitre_Titre'];?>')"> Effacer ce chapitre</a></p>
                                    <hr style="height:3px"; color="grey";>
                                </div>
                            </div>
                        </div>

<?php
}
?>  

                    </div>
                </div>
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
