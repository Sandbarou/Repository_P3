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
                    <h1><img src="contents/images/logo_new.png" alt="logo"></h1>
                </a>

            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php"> ACCUEIL</a></li>
                    <li class="dropdown"><a href="index.php?action=apropos">Qui suis-je ?<i
                                    class="fa fa-angle-down"></i></a>
                        <ul role="menu" class="sub-menu">
                            <li><a href="index.php?action=apropos"> Jean Forteroche</a></li>
                            <li><a href="index.php?action=contact"> Contactez-moi</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="index.php?action=blog">Billet simple pour l'Alaska<i
                                    class="fa fa-angle-down"></i></a>
                        <ul role="menu" class="sub-menu">
                            <li><a href="index.php?action=blog">Tous les chapitres</a></li>
                            <?php foreach ($chapitres_header as $chapitre) : ?>
                                <li><a href="<?= "index.php?action=billet&id=" . $chapitre['BIL_ID'] ?>">Dernier
                                        chapitre</a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
            </div>


        </div>

    </div>
</header>

