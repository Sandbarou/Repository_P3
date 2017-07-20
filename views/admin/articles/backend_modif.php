<?php

// si non connecte, retour à la page de login
$user = new User($bdd);
if (!$user->is_logged_in()) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=myg94mec9havyrgyxlz8z8mrwxa5biz29t3qlf1lq4db79u3"></script>
    <script>tinymce.init({selector: 'textarea'});</script>

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


<?php include("views/admin/menu_admin.php"); ?>


<section id="blog-details" class="padding-top">
    <div class="container">
        <p>
        <h1 class="cl-3">Modification du chapitre</h1></p><br/>
        <div class="row">
            <div class="col-md-9 col-sm-7">
                <div class="row">


                    <div class="col-md-12 col-sm-12">

                        <div class="single-blog single-column">
                            <div class="post-thumb">

                                <?php
                                //verif erreurs
                                if (isset($error)) {
                                    foreach ($error as $error) {
                                        echo $error . '<br />';
                                    }
                                }

                                foreach ($chapitres_admin as $chapitres) : ?>

                                    <form action="" method="post">

                                        <p><label for="chapitre_Titre">Titre du chapitre</label><br/>
                                            <input type="text" name="BIL_TITRE" id="BIL_TITRE" size="125"
                                                   value="<?= $chapitres['BIL_TITRE'] ?>"></p>

                                        <p><label for="chapitre_Auteur">Auteur</label><br/>
                                            <input type="text" name="BIL_AUTEUR" id="BIL_AUTEUR" size="125"
                                                   value="<?= $chapitres['BIL_AUTEUR'] ?>"></p>

                                        <p><label for="chapitre_Date">Date</label><br/>
                                            <input type="date" name="BIL_DATE" id="BIL_DATE" size="125"
                                                   value="<?= $chapitres['BIL_DATE'] ?>"></p>

                                        <p><label for="chapitre_Contenu">Contenu du chapitre</label><br/>
                                            <textarea name="BIL_CONTENU"
                                                      id="BIL_CONTENU"><?= $chapitres['BIL_CONTENU'] ?></textarea></p>
                                        <br/>

                                        <input type="hidden" name="BIL_ID" id="BIL_ID"
                                               value="<?= $chapitres['BIL_ID'] ?>"/>

                                        <input type="submit" name="submit" id="submit" value="Modifier"/>

                                    </form>

                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center bottom-separator">
            <img src="contents/images/home/image_under2.jpg" class="img-responsive inline" alt="illlustration">
        </div>
        <div class="col-sm-12">
            <div class="copyright-text text-center">
                <p>&copy; Blog de Jean Forteroche 2017. Tous droits réservés.</p>
                <a href="index.php?action=login">Connexion</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
