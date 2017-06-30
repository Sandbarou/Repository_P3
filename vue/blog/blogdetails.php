<?php

if(isset($_GET['modcom'])){ 

    $update_commentaires->rowCount();
 
    header('Location: blog.php?action=signalé');
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

    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "7e8eb33b-fbe0-4915-9b93-09490e3d10df", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

    <script language="JavaScript" type="text/javascript">
        function modcom(commentaire_ID, commentaire_Nom)
        {
         if (confirm("Voulez-vous signaler le commentaire de " + commentaire_Nom + " ?"))
            {
            window.location.href = 'blogdetails.php?modcom=' + commentaire_ID;
            }
        }
    </script>

</head><!--/head-->

<body>
	
<?php include_once('control/controleur_header.php'); ?>     
    <!--/#header-->


<?php
foreach($chapitres_blogdetails as $chapitre)
{
?>

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title"><i>Billet simple pour l'Alaska</i></h1>
                            <p>par Jean Forteroche</p>
                        </div>                                                                                
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#page-breadcrumb-->

    <section id="blog-details" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <div class="row">
                         <div class="col-md-12 col-sm-12">
                            <div class="single-blog blog-details two-column">
                                <div class="post-thumb">
                                    <a href="blogdetails.php?chapitre=<?php echo $chapitre['chapitre_ID']; ?>"><img src="images/blog/<?php echo $chapitre['chapitre_ID']; ?>.jpg" class="img-responsive" alt="illustration"></a>                                  
                                    <div class="post-overlay">
                                        <span class="uppercase"><a href="#"></a></span>
                                    </div>
                                </div>
                                <div class="post-content overflow">
                                    <h2 class="post-title bold"><a href="blogdetails.php?chapitre=<?php echo $chapitre['chapitre_ID']; ?>"><?php echo $chapitre['chapitre_Titre']; ?></a></h2>
                                    <h3 class="post-author"><a href="aboutus.php">Posté par <?php echo $chapitre['chapitre_Auteur']; ?> le <?php echo $chapitre['chapitre_Date_fr']; ?> </a></h3>
                                    <p><?php echo $chapitre['chapitre_Contenu']; ?>
                                    <div class="post-bottom overflow">
                                    </div>
                                    <div class="blog-share">
                                        <span class='st_facebook_hcount'></span>
                                        <span class='st_twitter_hcount'></span>
                                        <span class='st_linkedin_hcount'></span>
                                        <span class='st_pinterest_hcount'></span>
                                        <span class='st_email_hcount'></span>
                                    </div>
                                    <div class="author-profile padding">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <img src="images/blogdetails/1.png" alt="">
                                            </div>
                                            <div class="col-sm-10">
                                                <h3><a href="aboutus.php">Jean Forteroche</h3></a>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliq Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.</p>
                                            </div>
                                        </div>
                                    </div>

                                    

<?php
}
?>

                                    <div class="response-area">
                                    <h2 class="bold">Commentaires</h2>


<?php
foreach($commentaires_blogdetails as $commentaire)
{
?>

                                    
                                    <ul class="media-list">
                                        <li class="media">
                                            <div class="post-comment">
                                            <a class="pull-left">
                                                    <img class="media-object" src="images/blogdetails/2.png" alt="" width="100px">
                                                </a>
                                                <div class="media-body">
                                                    <span><i class="fa fa-user"></i>Posté par <?php echo $commentaire['commentaire_Nom']; ?></span>
                                                    <p><?php echo $commentaire['commentaire_Message']; ?></p>
                                                    <ul class="nav navbar-nav post-nav">
                                                        <li><i class="fa fa-clock-o"></i>  <?php echo $commentaire['commentaire_Date_fr']; ?></li>
                                                        <li><a href="javascript:modcom('<?php echo $commentaire['commentaire_ID'];?>','<?php echo $commentaire['commentaire_Nom'];?>')"> <i class="fa fa-bell-o"></i> Signaler ce commentaire </a></li>
                                                    </ul>
                                                </div>
                                            </div>


<?php
}
?>

<?php

    // quand le formulaire est envoyé :
    if(isset($_POST['submit'])){

        $_POST = array_map( 'stripslashes', $_POST );

        // collecter les données du formulaire
        extract($_POST);

        if(!isset($error)){
            try {        
                    $insert_commentaires->rowCount();
                } 
                    catch(PDOException $e) {
                        echo $e->getMessage();
                }
        }

    }

    if(isset($error)){
        foreach($error as $error){
            echo '<p class="error">'.$error.'</p>';
        }
    }

?>    

<?php
foreach($chapitres_blogdetails as $chapitre)
{
?>
                                </div>
                            
                                        <h2><br />Laisser un commentaire<br /></h2>

                                        <form action="" method="post">
                                            <p>
                                                <label for="commentaire_Nom">Votre nom </label><br />
                                                <input type="text" name="commentaire_Nom" id="commentaire_Nom" size="125" required="required" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['commentaire_Nom']);}?>"> <br />
                                                <label for="commentaire_Message">Votre texte </label><br />
                                                <textarea name="commentaire_Message" id="commentaire_Message" rows="6" cols="124" required="required" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['commentaire_Message']);}?>"> </textarea><br />
                                                <input type="hidden" name="commentaire_ID_chapitre" id="commentaire_ID_chapitre" value="<?php echo $chapitre['chapitre_ID']; ?>">
                                                <input type="hidden" name="commentaire_Niveau" id="commentaire_Niveau" value="<?php echo $_POST[0]; ?>">
                                                <input type="submit" name="submit" id="submit" value="Envoyer">
                                            </p>
                                        </form>
                                    </div>
                                </div>        
                            </div>
<?php
}
?>


                    </div>                             
                </div>
                <div class="col-md-3 col-sm-5">
                    <div class="sidebar blog-sidebar">
                        <div class="sidebar-item  recent">
                            <h3>Commentaires</h3>

<?php    
foreach($commentaires as $commentaire)
{
?>
   

                            <div class="media">
                                <div class="pull-left">
                                    <img src="images/portfolio/project1.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <h4>                                    
                                    <a href="blogdetails.php?chapitre=<?php echo $commentaire['commentaire_ID_chapitre']; ?>"><?php echo $commentaire['commentaire_Message']; ?></a>
                                    </h4>
                                    <p>posté le <?php echo $commentaire['commentaire_Date_fr']; ?></p>
                                </div>
                            </div>
<?php
}
?>

                        </div>

                        <div class="sidebar-item categories">
                            <h3>Tous les chapitres de<br /> <i>Billet simple pour l'Alaska</i></h3>
                        <ul class="nav navbar-stacked">
                        
<?php
foreach($chapitres_blog as $chapitre)
{
?>                          
                                <li><a href="blogdetails.php?chapitre=<?php echo $chapitre['chapitre_ID']; ?>"><?php echo $chapitre['chapitre_Titre']; ?></a></li>
<?php
}
?>
                            </ul>
                        </div>
                        <div class="sidebar-item tag-cloud">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#blog-->
 

<?php include("vue/footer.php"); ?> 
    <!--/#footer-->



    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>   




</body>
</html>
