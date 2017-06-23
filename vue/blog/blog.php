<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

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

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title"><i>Billet simple pour l'Alaska</i></h1>
                            <p>Tous les chapitres</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#page-breadcrumb-->


    <section id="blog" class="padding-top">
        <div class="container">
            <div class="row">
               <div class="col-md-9 col-sm-7">
                    <div class="row">    

<?php
foreach($chapitres_blog as $chapitre)
{
?>
                        <div class="col-sm-12 col-md-12">
                            <div class="single-blog single-column">
                                <div class="post-thumb">
                                    <a href="blogdetails.php?chapitre=<?php echo $chapitre['chapitre_ID']; ?>"> <img src="images/blog/<?php echo $chapitre['chapitre_ID']; ?>.jpg" class="img-responsive" alt="illustration"></a>
                                    <div class="post-overlay">
                                       <span class="uppercase"><a href="#"></a></span>
                                    </div>
                                </div>
                                <div class="post-content overflow">
                                    <h2 class="post-title bold"><a href="blogdetails.php?chapitre=<?php echo $chapitre['chapitre_ID']; ?>"><?php echo $chapitre['chapitre_Titre']; ?></a></h2>
                                    <h3 class="post-author"><a href="aboutus.php">Posté par <?php echo $chapitre['chapitre_Auteur'].' le '.$chapitre['chapitre_Date_fr']; ?></a></h3>
                                    <p><?php echo substr($chapitre['chapitre_Contenu'], 0, 300); ?>...</p>
                                    <a href="blogdetails.php?chapitre=<?php echo $chapitre['chapitre_ID']; ?>" class="read-more">Voir plus</a>
                                    <div class="post-bottom overflow">
                                    </div>
                                </div>
                            </div>
                        </div>

<?php
}
?>


                    </div>                             
                </div>
                <div class="col-md-3 col-sm-5">
                    <div class="sidebar blog-sidebar">
                        <div class="sidebar-item  recent">
                            <h3>Commentaires</h3>

<?php    
foreach($commentaires as $commentaire)
{
?>
   

                            <div class="media">
                                <div class="pull-left">
                                    <a href="#"><img src="images/portfolio/project3.jpg" alt=""></a>
                                </div>
                                <div class="media-body">
                                    <h4><a href="blogdetails.php?chapitre=<?php echo $commentaire['commentaire_ID_chapitre']; ?>"><?php echo $commentaire['commentaire_Message']; ?></a></h4>
                                    <p>posté le <?php echo $commentaire['commentaire_Date_fr']; ?></p>
                                </div>
                            </div>

<?php
}
?>
                        </div>

                        <div class="sidebar-item categories">
                            <h3>Tous les chapitres de<br /> <i>Billet simple pour l'Alaska</i></h3>                            
                            <ul class="nav navbar-stacked">

<?php
foreach($chapitres_blog as $chapitre)
{
?>
                          
                                <li><a href="blogdetails.php?chapitre=<?php echo $chapitre['chapitre_ID']; ?>"><?php echo $chapitre['chapitre_Titre']; ?></a></li>
<?php
}
?>

                            </ul>
                        </div>
                        <div class="sidebar-item tag-cloud">
                        </div>

                    </div>
                </div>     
            </div>
        </div>
    </section>
    <!--/#blog-->



<?php include("vue/footer.php"); ?>   
    <!--/#footer-->


    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>  


</body>
</html>
