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
    <link href="contents/css/animate.min.css" rel="stylesheet"> 
    <link href="contents/css/lightbox.css" rel="stylesheet"> 
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

    <section id="home-slider">
        <div class="container">
            <div class="main-slider">
                <div class="slide-text">
                    <h1>Bienvenue sur le blog<br /> de Jean Forteroche</h1>
                    <p>Retrouvez toutes les semaines un nouveau chapitre <br />de mon roman <i>Billet simple pour l'Alaska</i>.</p>
                </div>
                <img src="contents/images/home/slider/slide1/fjord_slider1.jpg" class="img-responsive slider-house" alt="slider image">
            </div>
            <div class="col-sm-12 text-center bottom-separator">
                    <img src="contents/images/home/image_under2.jpg" class="img-responsive inline" alt="illustration">
            </div>
        </div>
     </section>
    <!--/#home-slider-->

    <section id="features">
        <div class="container">
            <div class="row">
                <div class="single-features">
                    <div class="col-sm-5 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
<?php foreach($chapitres_header as $chapitre) : ?>                          
                     <img src="contents/images/blog/<?= $chapitre['BIL_ID'] ?>.jpg" class="img-responsive" alt="illustration">
                    </div>
                    <div class="col-sm-6 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">              
                      <h2><a href="<?= "index.php?action=billet&id=" . $chapitre['BIL_ID'] ?>">Dernier chapitre</a></h2>
<?php endforeach; ?>                         
                        <br> /<p>Retrouvez le dernier chapitre de mon incroyable roman d'aventure !</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <!--/#features-->



    <section id="services">
        <div class="container">
            <div class="row">

<?php foreach($chapitres_index as $chapitre) : ?>

                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                            <img src="contents/images/home/icon<?= $chapitre['BIL_ID'] ?>.png" alt="illustration">
                        </div>
                        <h2><a href="<?= "index.php?action=billet&id=" . $chapitre['BIL_ID'] ?>"> <?= $chapitre['BIL_TITRE'] ?> </a></h2>
                        <p>Retrouvez les aventures du nouveau roman de Jean Forteroche !</p>
                    </div>
                </div>

<?php endforeach; ?> 

            </div>
        </div>
    </section>
    <!--/#services-->


<?php include("views/footer.php"); ?>
    <!--/#footer-->

</body>
</html>
