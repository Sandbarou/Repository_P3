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
            <div class="row">
               <div class="col-md-9 col-sm-7">
                    <div class="row">   

<?php

    // quand le formulaire est envoye :
    if(isset($_POST['submit'])){

        $_POST = array_map( 'stripslashes', $_POST );

        // collecter les donnees du formulaire
        extract($_POST);

        // validations
        if($commentaire_ID ==''){
            $error[] = "L'ID de ce commentaire n'est pas valide !";
        }

        if($commentaire_Nom ==''){
            $error[] = "Merci d'écrire un nom";
        }

        if($commentaire_Message ==''){
            $error[] = "Merci d'ajouter un contenu";
        }

        if(!isset($error)){

            try {


                //maj base de donnees
                $reponse = $bdd->prepare('UPDATE blog_commentaire SET commentaire_Nom = :commentaire_Nom, commentaire_Message = :commentaire_Message, commentaire_Date = :commentaire_Date WHERE commentaire_ID = :commentaire_ID') ;
                $reponse->execute(array(
                    ':commentaire_Nom' => $commentaire_Nom,
                    ':commentaire_Message' => $commentaire_Message,
                    ':commentaire_Date' => $commentaire_Date,
                    ':commentaire_ID' => $commentaire_ID
                ));

                //redirection page principale
                header('Location: moderation.php?action=modifié');
                exit;

            } catch(PDOException $e) {
                echo $e->getMessage();
            }

        }

    }

    ?>

                        <ul class="media-list">
                            <li class="media">
                                <div class="post-comment">
                                    <div class="media-body">



    <?php
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




    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>  

        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <img src="images/home/image_under2.jpg" class="img-responsive inline" alt="">
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
