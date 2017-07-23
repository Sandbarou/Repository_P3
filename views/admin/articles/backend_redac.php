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
        <h1 class="cl-3">Ajout d'un chapitre</h1><br/>
        <div class="row">
            <div class="col-md-9 col-sm-7">
                <div class="row">


                    <?php
                    //verif erreurs
                    if (isset($error)) {
                        foreach ($error as $error) {
                            echo $error . '<br />';
                        }
                    }
                    ?>


                    <div class="col-md-12 col-sm-12">

                        <div class="single-blog single-column">
                            <div class="post-thumb">

                                <form action="" method="post">

                                    <p><label for="bil_Titre">Titre du chapitre</label><br/>
                                        <input type="text" name="bil_Titre" id="bil_Titre" size="125"
                                               value="<?php if (isset($error)) {
                                                   echo $_POST['bil_Titre'];
                                               } ?>"></p>

                                    <p><label for="bil_Auteur">Auteur</label><br/>
                                        <input type="text" name="bil_Auteur" id="bil_Auteur" size="125"
                                               value="<?php if (isset($error)) {
                                                   echo $_POST['bil_Auteur'];
                                               } ?>"></p>

                                    <p><label for="bil_Date">Date</label><br/>
                                        <input type="date" name="bil_Date" id="bil_Date" size="125"
                                               value="<?php if (isset($error)) {
                                                   echo $_POST['bil_Date'];
                                               } ?>"></p>

                                    <p><label for="bil_Contenu">Contenu du chapitre</label><br/>
                                        <textarea name="bil_Contenu" id="bil_Contenu"><?php if (isset($error)) {
                                                echo $_POST['bil_Contenu'];
                                            } ?></textarea></p><br/>

                                    <input type="submit" name="submit" id="submit" value="Ajouter">

                                </form>

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
            <img src="contents/images/home/image_under2.jpg" class="img-responsive inline" alt="illustration">
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