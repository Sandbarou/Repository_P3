<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>       

<?php include("vue/window_title.php"); ?>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet"> 
    <link href="css/lightbox.css" rel="stylesheet"> 
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

    <section id="home-slider">
        <div class="container">
            <div class="main-slider">
                <div class="slide-text">
                    <h1>Bienvenue sur le blog<br /> de Jean Forteroche</h1>
                    <p>Retrouvez toutes les semaines un nouveau chapitre <br />de mon roman <i>Billet simple pour l'Alaska</i>.</p>
                </div>
                <img src="images/home/slider/slide1/fjord_slider1.jpg" class="img-responsive slider-house" alt="slider image">
            </div>
            <div class="col-sm-12 text-center bottom-separator">
                    <img src="images/home/image_under2.jpg" class="img-responsive inline" alt="illustration">
            </div>
        </div>
     </section>
    <!--/#home-slider-->

    <section id="features">
        <div class="container">
            <div class="row">
                <div class="single-features">
                    <div class="col-sm-5 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                     <img src="images/blog/<?php echo $chapitre['chapitre_ID']; ?>.jpg" class="img-responsive" alt="illustration">
                    </div>
                    <div class="col-sm-6 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                      <h2><a href="blogdetails.php?chapitre=<?php echo $chapitre['chapitre_ID']; ?>">Dernier chapitre</a></h2>
                        <br /<p>Retrouvez le dernier chapitre de mon roman !</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <!--/#features-->



    <section id="services">
        <div class="container">
            <div class="row">

<?php
foreach($chapitres_index as $chapitre)
{
?>

                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                            <img src="images/home/icon<?php echo $chapitre['chapitre_ID']; ?>.png" alt="illustration">
                        </div>
                        <h2><a href="blogdetails.php?chapitre=<?php echo $chapitre['chapitre_ID']; ?>"> <?php echo $chapitre['chapitre_Titre']; ?> </a></h2>
                        <p>Retrouvez les aventures du nouveau roman de Jean Forteroche !</p>
                    </div>
                </div>

<?php
}
?> 

            </div>
        </div>
    </section>
    <!--/#services-->


<?php include("vue/footer.php"); ?>   
    <!--/#footer-->

</body>
</html>
