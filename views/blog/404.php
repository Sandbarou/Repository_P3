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
    <script type="text/javascript" src="contents/js/wow.min.js"></script>
    <script type="text/javascript" src="contents/js/main.js"></script>  
    
<?php include("views/window_title.php"); ?>
    
    <link href="contents/css/bootstrap.min.css" rel="stylesheet">
    <link href="contents/css/font-awesome.min.css" rel="stylesheet"> 
    <link href="contents/css/main.css" rel="stylesheet">
    <link href="contents/css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
        <script src="contents/js/html5shiv.js"></script>
        <script src="contents/js/respond.min.js"></script>
    <![endif]-->       
    
<?php include("views/window_icon.php"); ?>

</head><!--/head-->

<body>
    <section id="error-page">
        <div class="error-page-inner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center">
                            <div class="bg-404">
                                <div class="error-image">                                
                                    <img class="img-responsive" src="contents/images/404.png" alt="">  
                                </div>
                            </div>
                            <h2>PAGE NON TROUVEE</h2>
                            <p>La page que vous cherchez n'existe plus.</p>
                            <a href="index.php" class="btn btn-error">RETOURNER A L'ACCUEIL</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>