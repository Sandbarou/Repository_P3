<?php

// si non connecte, retour à la page de login
if(!$user->is_logged_in()){ header('Location: login.php'); }

//message quand on ajoute ou modifie ou supprime un utilisateur
if(isset($_GET['deluser'])){ 

    //Toutes les ID autorisées sauf le 1 pour ne pas effacer l'admin principal
    if($_GET['deluser'] !='1'){

        $reponse = $bdd->prepare('DELETE FROM blog_user WHERE user_ID = :user_ID') ;
        $reponse->execute(array(':user_ID' => $_GET['deluser']));

        header('Location: users.php?action=effacé');
        exit;

    }
} 

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <script language="JavaScript" type="text/javascript">
        function deluser(user_ID, user_Pseudo)
        {
        if  (confirm("Etes-vous sûr de vouloir effacer l'utilisateur suivant de la base de données : " + user_Pseudo + ""))
            {
            window.location.href = 'users.php?deluser=' + user_ID;
            }
        }
  </script>

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
    //message quand on ajoute ou modifie ou supprime un utilisateur
    if(isset($_GET['action'])){ 
        echo '<h3>Utilisateur '.$_GET['action'].'.</h3>'; 
    } 
?>



<?php
foreach($users_list as $list)
{
?>

                         <div class="col-sm-12 col-md-12">
                            <div class="single-blog single-column">
                                 <div class="post-content overflow">
                                    <h2 class="post-title bold">Pseudo de l'utilisateur : <?php echo $list['user_Pseudo']; ?> </h2>
                                    <h3 class="post-author">Email de l'utilisateur : <?php echo $list['user_Email']; ?> </h3><br />
                                    <p><a href="users_modif.php?id=<?php echo $list['user_ID'];?>">Pour modifier un utilisateur, cliquez ici !</a></p>

                                    <?php if($list['user_ID'] != 1){?>
                                    <p><a href="javascript:deluser('<?php echo $list['user_ID'];?>','<?php echo $list['user_Pseudo'];?>')"> Effacer cet utilisateur </a></p>
                                    <?php } ?>
                                    <hr style="height:3px"; color="grey";>
                                </div>
                            </div>
                        </div>

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
