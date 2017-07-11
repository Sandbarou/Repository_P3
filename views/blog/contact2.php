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
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD82pKhliFXHjlaXy7aacuq-CJiWLa__v0"></script>
    <script type="text/javascript" src="contents/js/gmaps.js"></script>
    <script type="text/javascript" src="contents/js/wow.min.js"></script>
    <script type="text/javascript" src="contents/js/main.js"></script>

<?php include("views/window_title.php"); ?>

    <link href="contents/css/bootstrap.min.css" rel="stylesheet">
    <link href="contents/css/font-awesome.min.css" rel="stylesheet">
    <link href="contents/css/prettyPhoto.css" rel="stylesheet"> 
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
                            <h1 class="title">Contactez-moi</h1>
                            <p>Restons en contact !</p>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#action-->

    <section id="map-section">
        <div class="container">
            <div id="gmap"></div>
            <div class="contact-info">
                <h2>Contacts</h2>
                <address>
                E-mail : <a href="mailto:sandbarou@gmail.com">jean.forteroche@gmail.com</a> <br> 
                Téléphone : +33 645789062 <br> 
                Fax : +33 147788059 <br> 
                </address>

                <h2>Adresse</h2>
                <address>
                Jean Forteroche <br> 
                15 rue des Lilas <br> 
                75004 PARIS <br> 
                FRANCE <br> 
                </address>
            </div>
        </div>
    </section> <!--/#map-section-->        


<?php include("views/footer.php"); ?>
    <!--/#footer-->


   
</body>
</html>
