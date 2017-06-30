<?php

// si non connecte, retour à la page de login
if(!$user->is_logged_in()){ header('Location: login.php'); }?>

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
    <link href="css/lightbox.css" rel="stylesheet"> 
    <link href="css/animate.min.css" rel="stylesheet"> 
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

<?php include("vue/menu_admin.php"); ?> 

    <section id="blog" class="padding-top">
        <div class="container">
        <p><h1 class="cl-3">Modification d'un commentaire</h1></p><br />
            <div class="row">
               <div class="col-md-9 col-sm-7">
                    <div class="row">   
                        <ul class="media-list">
                            <li class="media">
                                <div class="post-comment">
                                    <div class="media-body">



    <?php

    if(isset($_POST['submit'])){

        $_POST = array_map( 'stripslashes', $_POST );

        // collecter les donnees du formulaire
        extract($_POST);

        if(!isset($error)){
            try {
                    $update_mod_modif->rowCount();
                }   
                    catch(PDOException $e) {
                       echo $e->getMessage();
                }
            header('Location: moderation.php?action=modifié');
            exit;    
        }

    }

    //verif erreurs
    if(isset($error)){
        foreach($error as $error){
            echo $error.'<br />';
        }
    }

    foreach($moderation_modif as $mod_modif)
    {
    ?>

                                <form action="" method="post">

                                    <p><label for="commentaire_Nom"> Nom</label><br />
                                    <input type="text" name="commentaire_Nom" id="commentaire_Nom" size="125" value="<?php echo $mod_modif['commentaire_Nom']; ?>"></p>

                                    <p><label for="commentaire_Message"> Commentaire</label><br />
                                    <input type="text" name="commentaire_Message" id="commentaire_Message" size="125" value="<?php echo $mod_modif['commentaire_Message']; ?>"></p>

                                    <p><label for="commentaire_Date"> Posté le</label><br />
                                    <input type="datetime" name="commentaire_Date" id="commentaire_Date" size="125" value="<?php echo $mod_modif['commentaire_Date']; ?>"></p>

                                    <input type="hidden" name="commentaire_ID" id="commentaire_ID" value="<?php echo $mod_modif['commentaire_ID']; ?>" />

                                    <p><input type="submit" name="submit" id="submit" value="Modifier"></p>

                                </form>
    <?php                       
    }
    ?>                            
                    </div>
                </div>
            </div>
        </div>  
    </section>


        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <img src="images/home/image_under2.jpg" class="img-responsive inline" alt="illustration">
                </div>
                <div class="col-sm-12">
                    <div class="copyright-text text-center">
                        <p>&copy; Blog de Jean Forteroche 2017. Tous droits réservés.</p>
                        <a href=login.php>Connexion</a>
                    </div>
                </div>
            </div>
        </div>

</body>
</html>
