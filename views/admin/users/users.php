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

<?php include("views/admin/menu_admin.php"); ?>

<section id="blog" class="padding-top">
    <div class="container">
        <h1 class="cl-3">Liste des utilisateurs</h1><br/>
        <div class="row">
            <div class="col-md-9 col-sm-7">
                <div class="row">


                    <?php
                    // Affiche le message associé à l'action
                    if (isset($_GET['effacé'])) {
                        echo '<h3>Utilisateur effacé</h3>';
                    }
                    if (isset($_GET['modifié'])) {
                        echo '<h3>Utilisateur modifié</h3>';
                    }
                    if (isset($_GET['ajouté'])) {
                        echo '<h3>Utilisateur ajouté</h3>';
                    }

                    foreach ($users_list as $list) : ?>

                        <div class="col-sm-12 col-md-12">
                            <div class="single-blog single-column">
                                <div class="post-content overflow">
                                    <h2 class="post-title bold">Pseudo de l'utilisateur
                                        : <?= $list['user_Pseudo'] ?> </h2>
                                    <h3 class="post-author">Email de l'utilisateur : <?= $list['user_Email'] ?> </h3>
                                    <br/>
                                    <p><i class="fa fa-pencil-square-o"></i><a
                                                href="<?= "index.php?action=users_modif&id=" . $list['user_ID'] ?>">
                                            Modifier cet utilisateur </a></p>
                                    <?php if ($list['user_ID'] != 1) { ?>
                                        <p><i class="fa fa-times"></i><a
                                                    href="javascript:deluser('<?= $list['user_ID'] ?>','<?= $list['user_Pseudo'] ?>')">
                                                Effacer cet utilisateur </a></p>
                                    <?php } ?>
                                    <hr style="height:3px" ; color="grey" ;>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>

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