    
<header id="header">      

        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Basculer navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="index.php">
                    	<h1><img src="images/logo_new.png" alt="logo"></h1>
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php">  ACCUEIL</a></li>
                        <li class="dropdown"><a href="aboutus.php">Qui suis-je ?<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="aboutus.php">  Jean Forteroche</a></li>
                                <li><a href="contact2.php">  Contactez-moi</a></li>
                            </ul>
                        </li>                  
                        <li class="dropdown"><a href="blog.php">Billet simple pour l'Alaska<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="blog.php">Tous les chapitres</a></li>


<?php
foreach($chapitres_header as $chapitre)
{
?>


                                <li><a href="blogdetails.php?chapitre=<?php echo $chapitre['chapitre_ID']; ?>">Dernier chapitre</a></li>
                        
                </div>

                </div>
            </div>
        </div>
    </header>

<?php
}
?> 