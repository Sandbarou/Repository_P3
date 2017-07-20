<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

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


    <script type="text/javascript" src="contents/js/myfunctions.js"></script>
    <script type="text/javascript" src="contents/js/jquery.js"></script>
    <script type="text/javascript" src="contents/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="contents/js/lightbox.min.js"></script>
    <script type="text/javascript" src="contents/js/wow.min.js"></script>
    <script type="text/javascript" src="contents/js/main.js"></script>

    <script type="text/javascript">var switchTo5x = true;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({
            publisher: "7e8eb33b-fbe0-4915-9b93-09490e3d10df",
            doNotHash: false,
            doNotCopy: false,
            hashAddressBar: false
        });</script>


</head><!--/head-->

<body>

<?php include("views/header.php"); ?>
<!--/#header-->

<?php foreach ($chapitres_blogdetails as $chapitre) : ?>


    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title"><i>Billet simple pour l'Alaska</i></h1>
                            <p>par Jean Forteroche</p>
                            <?php if (isset($_POST['submit']))
                                echo '<h3>Commentaire envoyé </h3>'; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--/#page-breadcrumb-->

<section id="blog-details" class="padding-top">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-7">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="single-blog blog-details two-column">
                            <div class="post-thumb">
                                <a href="<?= "index.php?action=billet&id=" . $chapitre['BIL_ID'] ?>"><img
                                            src="contents/images/blog/<?= $chapitre['BIL_ID'] ?>.jpg"
                                            class="img-responsive" alt="illustration"></a>
                                <div class="post-overlay">
                                    <span class="uppercase"><a href="#"></a></span>
                                </div>
                            </div>
                            <div class="post-content overflow">
                                <h2 class="post-title bold"><a
                                            href="<?= "index.php?action=billet&id=" . $chapitre['BIL_ID'] ?>"><?= $chapitre['BIL_TITRE'] ?></a>
                                </h2>
                                <h3 class="post-author"><a href="index.php?action=apropos">Posté
                                        par <?= $chapitre['BIL_AUTEUR'] ?> le <?= $chapitre['BIL_DATE_FR'] ?> </a></h3>
                                <p><?= $chapitre['BIL_CONTENU'] ?>
                                <div class="post-bottom overflow">
                                </div>
                                <div class="blog-share">
                                    <span class='st_facebook_hcount'></span>
                                    <span class='st_twitter_hcount'></span>
                                    <span class='st_linkedin_hcount'></span>
                                    <span class='st_pinterest_hcount'></span>
                                    <span class='st_email_hcount'></span>
                                </div>
                                <div class="author-profile padding">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <img src="contents/images/blogdetails/1.png" alt="">
                                        </div>
                                        <div class="col-sm-10">
                                            <h3><a href="index.php?action=apropos">Jean Forteroche</a></h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliq Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco laboris nisi.</p>
                                        </div>
                                    </div>
                                </div>


                                <?php endforeach; ?>


                                <div class="response-area">
                                    <h2 class="bold">Commentaires</h2>

                                    <?php foreach ($commentaires_blogdetails as $comment) : ?>


                                    <ul class="media-list">
                                        <li class="media">
                                            <div class="post-comment">
                                                <a class="pull-left">
                                                    <img class="media-object" src="contents/images/blogdetails/2.png"
                                                         alt="illustration" width="100px">
                                                </a>
                                                <div class="media-body">
                                                    <span><i class="fa fa-user"></i>Posté par <?= $comment['COM_AUTEUR'] ?></span>
                                                    <p><?= $comment['COM_CONTENU'] ?></p>
                                                    <ul class="nav navbar-nav post-nav">
                                                        <li><i class="fa fa-clock-o"></i> <?= $comment['COM_DATE_FR'] ?>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:modcom('<?= $comment['COM_ID'] ?>','<?= $comment['COM_AUTEUR'] ?>')">
                                                                <i class="fa fa-bell-o"></i> Signaler ce commentaire
                                                            </a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <?php endforeach; ?>

                                            <?php

                                            //verif erreurs
                                            if (isset($error)) {
                                                foreach ($error as $error) {
                                                    echo $error . '<br />';
                                                }
                                            }

                                            foreach ($chapitres_blogdetails as $chapitre) : ?>


                                </div>

                                <h2><br/>Laisser un commentaire<br/></h2>

                                <form action="" method="post">
                                    <p>
                                        <label for="commentaire_Nom">Votre nom</label><br/>
                                        <input type="text" name="COM_AUTEUR" id="COM_AUTEUR" size="125"
                                               required="required" value="<?php if (isset($error)) {
                                            echo htmlspecialchars($_POST['COM_AUTEUR']);
                                        } ?>"> <br/>
                                        <label for="commentaire_Message">Votre commentaire</label><br/>
                                        <textarea name="COM_CONTENU" id="COM_CONTENU" rows="6" cols="124"
                                                  required="required" value="<?php if (isset($error)) {
                                            echo htmlspecialchars($_POST['COM_CONTENU']);
                                        } ?>"> </textarea><br/>
                                        <input type="hidden" name="BIL_ID" id="BIL_ID"
                                               value="<?= $chapitre['BIL_ID'] ?>">
                                        <input type="hidden" name="COM_NIVEAU" id="COM_NIVEAU"
                                               value="<?= $_POST["0"] ?>">
                                        <input type="submit" name="submit" id="submit" value="Envoyer">
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; ?>

                </div>
            </div>
            <div class="col-md-3 col-sm-5">
                <div class="sidebar blog-sidebar">
                    <div class="sidebar-item  recent">
                        <h3>Commentaires</h3>

                        <?php foreach ($commentaires as $commentaire) : ?>


                            <div class="media">
                                <div class="pull-left">
                                    <a href="#"><img src="contents/images/portfolio/project3.jpg"
                                                     alt="illustration"></a>
                                </div>
                                <div class="media-body">
                                    <h4>
                                        <a href="<?= "index.php?action=billet&id=" . $commentaire['BIL_ID'] ?>"><?= $commentaire['COM_CONTENU'] ?></a>
                                    </h4>
                                    <p>posté le <?= $commentaire['COM_DATE_FR'] ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>

                    <div class="sidebar-item categories">
                        <h3>Tous les chapitres de<br/> <i>Billet simple pour l'Alaska</i></h3>
                        <ul class="nav navbar-stacked">

                            <?php foreach ($chapitres_blog as $chapitre) : ?>
                                <li>
                                    <a href="<?= "index.php?action=billet&id=" . $chapitre['BIL_ID'] ?>"><?= $chapitre['BIL_TITRE'] ?></a>
                                </li>
                            <?php endforeach; ?>
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
