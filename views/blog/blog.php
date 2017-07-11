<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <script type="text/javascript" src="contents/js/myfunctions.js"></script>  
    <script type="text/javascript" src="contents/js/jquery.js"></script>
    <script type="text/javascript" src="contents/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="contents/js/lightbox.min.js"></script>
    <script type="text/javascript" src="contents/js/wow.min.js"></script>
    <script type="text/javascript" src="contents/js/main.js"></script>  


<?php include("views/window_title.php"); ?>

    <link href="contents/css/bootstrap.min.css" rel="stylesheet">
    <link href="contents/css/font-awesome.min.css" rel="stylesheet">
    <link href="contents/css/lightbox.css" rel="stylesheet"> 
    <link href="contents/css/animate.min.css" rel="stylesheet"> 
	<link href="contents/css/main.css" rel="stylesheet">
	<link href="contents/css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
	    <script src="contents/js/html5shiv.js"></script>
	    <script src="contents/js/respond.min.js"></script>
    <![endif]-->       

<?php include("views/window_icon.php"); ?>

</head><!--/head-->

<body>

<?php include("views/header.php"); ?>
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
                                    <a href="<?= "index.php?action=billet&id=" . $chapitre['BIL_ID'] ?>"> <img src="contents/images/blog/<?= $chapitre['BIL_ID'] ?>.jpg" class="img-responsive" alt="illustration"></a>
                                    <div class="post-overlay">
                                       <span class="uppercase"><a href="#"></a></span>
                                    </div>
                                </div>
                                <div class="post-content overflow">
                                    <h2 class="post-title bold"><a href="<?= "index.php?action=billet&id=" . $chapitre['BIL_ID'] ?>"><?= $chapitre['BIL_TITRE'] ?></a></h2>
                                    <h3 class="post-author"><a href="index.php?action=apropos">Posté par <?= $chapitre['BIL_AUTEUR'].' le '.$chapitre['BIL_DATE_FR'] ?></a></h3>
                                    <p><?= substr($chapitre['BIL_CONTENU'], 0, 300) ?>...</p>
                                    <a href="<?= "index.php?action=billet&id=" . $chapitre['BIL_ID'] ?>" class="read-more">Voir plus</a>
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
                                    <a href="#"><img src="contents/images/portfolio/project3.jpg" alt="illustration"></a>
                                </div>
                                <div class="media-body">
                                    <h4><a href="<?= "index.php?action=billet&id=" . $commentaire['BIL_ID'] ?>"><?php echo $commentaire['COM_CONTENU']; ?></a></h4>
                                    <p>posté le <?php echo $commentaire['COM_DATE_FR']; ?></p>
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
                          
                                <li><a href="<?= "index.php?action=billet&id=" . $chapitre['BIL_ID'] ?>"><?= $chapitre['BIL_TITRE'] ?></a></li>
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



<?php include("views/footer.php"); ?>
    <!--/#footer-->


</body>
</html>
