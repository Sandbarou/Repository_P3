<?php 

// si non connecte, retour à la page de login
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=myg94mec9havyrgyxlz8z8mrwxa5biz29t3qlf1lq4db79u3"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

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

    <section id="blog-details" class="padding-top">
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
        if($chapitre_ID ==''){
            $error[] = "L'ID de ce chapitre n'est pas valide !";
        }

        if($chapitre_Titre ==''){
            $error[] = "Merci d'écrire un titre";
        }

        if($chapitre_Contenu ==''){
            $error[] = "Merci d'ajouter un contenu";
        }

        if(!isset($error)){

            try {

                //maj base de donnees
                $reponse = $bdd->prepare('UPDATE blog_chapitre SET chapitre_Auteur = :chapitre_Auteur, chapitre_Titre = :chapitre_Titre, chapitre_Contenu = :chapitre_Contenu, chapitre_Date = :chapitre_Date WHERE chapitre_ID = :chapitre_ID') ;
                $reponse->execute(array(
                    ':chapitre_Auteur' => $chapitre_Auteur,
                    ':chapitre_Titre' => $chapitre_Titre,
                    ':chapitre_Contenu' => $chapitre_Contenu,
                    ':chapitre_Date' => $chapitre_Date,
                    ':chapitre_ID' => $chapitre_ID
                ));

                //redirection page principale
                header('Location: admin.php?action=modifié');
                exit;

            } catch(PDOException $e) {
                echo $e->getMessage();
            }

        }

    }

    ?>

                        <div class="col-md-12 col-sm-12">
                            
                            <div class="single-blog single-column">
                                <div class="post-thumb">

    <?php
    //verif erreurs
    if(isset($error)){
        foreach($error as $error){
            echo $error.'<br />';
        }
    }

    foreach($chapitres_admin as $chapitre)
    {
    ?>

                                <form action="" method="post">

                                    <p><label for="chapitre_Titre">Titre du chapitre</label><br />
                                    <input type="text" name="chapitre_Titre" id="chapitre_Titre" size="125" value="<?php echo $chapitre['chapitre_Titre']; ?>"></p>

                                    <p><label for="chapitre_Auteur">Auteur</label><br />
                                    <input type="text" name="chapitre_Auteur" id="chapitre_Auteur" size="125" value="<?php echo $chapitre['chapitre_Auteur']; ?>"></p>

                                    <p><label for="chapitre_Date">Date</label><br />
                                    <input type="date" name="chapitre_Date" id="chapitre_Date" size="125" value="<?php echo $chapitre['chapitre_Date']; ?>"></p>

                                    <p><label for="chapitre_Contenu">Contenu du chapitre</label><br />
                                    <textarea name="chapitre_Contenu" id="chapitre_Contenu"><?php echo $chapitre['chapitre_Contenu']; ?></textarea></p><br />

                                    <input type="hidden" name="chapitre_ID" id="chapitre_ID" value="<?php echo $chapitre['chapitre_ID']; ?>" />

                                    <p><input type="submit" name="submit" id="submit" value="Modifier"></p>

                                </form>
                           
<?php                       
    }
?>                            
                                </div>
                            </div>
                        </div>
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
