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
                        <p>Authentification</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="blog-details" class="padding-top">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-7">
                <div class="row">
                    <div class="col-md-12 col-sm-12">

                        <?php if (isset($message)) {
                            echo $message;
                        } ?>
                        <h2><br/>Veuillez vous identifier<br/><br/></h2>

                        <form action="" method="post">
                            <p>

                                <label for="user_Pseudo">Votre pseudo </label><br/>
                                <input type="text" name="user_Pseudo" id="user_Pseudo" size="125"
                                       required="required"><br/><br/>

                                <label for="user_Pass">Votre mot de passe </label><br/>
                                <input type="password" name="user_Pass" id="user_Pass" size="125"
                                       required="required"><br/><br/><br/>

                                <input type="submit" name="submit" id="submit" value="Connexion">

                            </p>
                        </form>
                        <br/>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include("views/footer.php"); ?>
<!--/#footer-->


</body>
</html>