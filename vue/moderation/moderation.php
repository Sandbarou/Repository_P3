<?php 

// si non connecte, retour à la page de login
if(!$user->is_logged_in()){ header('Location: login.php'); }

//message quand on supprime un commentaire
if(isset($_GET['delcom'])){ 

    $delete_mod->rowCount();

    header('Location: moderation.php?action=effacé');
    exit;
} 

//message quand on valide un commentaire
if(isset($_GET['okcom'])){ 

    $update_mod->rowCount();

    header('Location: moderation.php?action=validé');
    exit;
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
        function delcom(commentaire_ID, commentaire_Nom)
        {
         if (confirm("Etes-vous sûr de vouloir effacer le commentaire de " + commentaire_Nom + " ?"))
            {
            window.location.href = 'moderation.php?delcom=' + commentaire_ID;
            }
        }
    </script>

    <script language="JavaScript" type="text/javascript">
        function okcom(commentaire_ID, commentaire_Nom)
        {
         if (confirm("Voulez-vous valider le commentaire de " + commentaire_Nom + " ?"))
            {
            window.location.href = 'moderation.php?okcom=' + commentaire_ID;
            }
        }
    </script>

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
        <p><h1 class="cl-3">Liste des commentaires signalés</h1></p><br />
            <div class="row">
               <div class="col-md-9 col-sm-7">
                    <div class="row">   

<?php 
//message quand on ajoute ou modifie ou supprime un commentaire
    if(isset($_GET['action'])){ 
    echo '<h3>Commentaire '.$_GET['action'].'.</h3>'; 
    } 
?>



<?php    
foreach($moderation_signal as $mod_signal)
{
?>

                        <div class="col-sm-12 col-md-12">
                            <div class="single-blog single-column">
                                    <img src="images/blog/<?php echo $chapitre['chapitre_ID']; ?>.jpg" class="img-responsive" width="30%" alt="illustration"><br />
                                    <h2 class="post-title bold-2"><a href="blogdetails.php?chapitre=<?php echo $mod_signal['commentaire_ID_chapitre']; ?>">Commentaire de <?php echo $mod_signal['commentaire_Nom']; ?> dans le chapitre <?php echo $mod_signal['commentaire_ID_chapitre']; ?> </a></h2>
                                    <h5>Posté le <?php echo $mod_signal['commentaire_Date_fr']; ?> </h5>
                                    <h3 class="post-author"><?php echo $mod_signal['commentaire_Message']; ?> </h3>
                                        <p><i class="fa fa-pencil-square-o"></i><a href="moderation_modif.php?id=<?php echo $mod_signal['commentaire_ID']; ?>"> Modifier ce commentaire </a></p>
                                        <p><i class="fa fa-check"></i><a href="javascript:okcom('<?php echo $mod_signal['commentaire_ID'];?>','<?php echo $mod_signal['commentaire_Nom'];?>')"> Valider ce commentaire </a></p>
                                        <p><i class="fa fa-times"></i><a href="javascript:delcom('<?php echo $mod_signal['commentaire_ID'];?>','<?php echo $mod_signal['commentaire_Nom'];?>')"> Effacer ce commentaire </a></p>
                                        <hr style="height:3px"; color="grey";>

                            </div>   
                        </div>                   
<?php
}
?>
     
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
