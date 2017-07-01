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

    <section id="blog-details" class="padding-top">
        <div class="container">
        <p><h1 class="cl-3">Modification de l'utilisateur</h1></p><br />
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <div class="row">
 
                        <div class="col-md-12 col-sm-12">
                            
                            <div class="single-blog single-column">
                                <div class="post-thumb">

    <?php

    // quand le formulaire est envoye :
    if(isset($_POST['submit'])){

        // collecter les données du formulaire
        extract($_POST);

        if(!isset($error)){
            try {
                if(isset($user_Pass)){
                    $hashed_user_Pass = $user->create_hash($user_Pass);

                    $update_users->rowCount();

                } 
                else {
                    $update_users->rowCount();
                }
            } 

                catch(PDOException $e) {
                    echo $e->getMessage();
            }

             //redirection page principale
            header('Location: users.php?action=modifié');
            exit;
        }
    }

    //verif erreurs
    if(isset($error)){
        foreach($error as $error){
            echo $error.'<br />';
        }
    }

foreach($users_modif as $modif)
{
    ?>

                                <form action="" method="post">

                                    <p><label for="user_Pseudo">Pseudo</label><br />
                                    <input type="text" name="user_Pseudo" id="user_Pseudo" size="125" value="<?php echo $modif['user_Pseudo']; ?>"></p>

                                    <p><label for="user_Pass">Changement de mot de passe</label><br />
                                    <input type="password" name="user_Pass" id="user_Pass" size="125" value=""></p>

                                    <p><label for="$user_PassConfirm">Confirmation du mot de passe</label><br />
                                    <input type="password" name="user_PassConfirm" id="user_PassConfirm" size="125" value=""></p>

                                    <p><label for="user_Email">Email</label><br />
                                    <input type='text' name='user_Email' id="user_Email" value="<?php echo $modif['user_Email']; ?>"></p><br />

                                    <input type="hidden" name="user_ID" id="user_ID" value="<?php echo $modif['user_ID']; ?>" />

                                    <input type="submit" name="submit" id="submit" value="Modifier l'utilisateur">

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
