<?php

// si non connecte, retour à la page d'accueil
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
        <p>
        <h1 class="cl-3">Modification d'un commentaire</h1></p><br/>
        <div class="row">
            <div class="col-md-9 col-sm-7">
                <div class="row">
                    <ul class="media-list">
                        <li class="media">
                            <div class="post-comment">
                                <div class="media-body">


                                    <?php

                                    //verif erreurs
                                    if (isset($error)) {
                                        foreach ($error as $error) {
                                            echo $error . '<br />';
                                        }
                                    }
                                    foreach ($moderation_modif as $mod_modif) : ?>

                                        <form action="" method="post">

                                            <p><label for="COM_AUTEUR"> Nom</label><br/>
                                                <input type="text" name="COM_AUTEUR" id="COM_AUTEUR" size="125"
                                                       value="<?= $mod_modif['COM_AUTEUR'] ?>"></p>

                                            <p><label for="COM_CONTENU">Commentaire</label><br/>
                                                <textarea name="COM_CONTENU" id="COM_CONTENU" rows="6"
                                                          cols="124"> <?= $mod_modif['COM_CONTENU'] ?> </textarea></p>

                                            <p><label for="COM_DATE"> Posté le</label><br/>
                                                <input type="datetime" name="COM_DATE" id="COM_DATE" size="125"
                                                       value="<?= $mod_modif['COM_DATE'] ?>"></p>

                                            <input type="hidden" name="COM_ID" id="COM_ID"
                                                   value="<?= $mod_modif['COM_ID'] ?>"/>

                                            <input type="submit" name="submit" id="submit" value="Modifier">

                                        </form>
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
