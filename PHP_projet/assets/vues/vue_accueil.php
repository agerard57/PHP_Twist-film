<html lang="fr" xmlns="http://www.w3.org/1999/html">
    <head>
        <link href="/~gerard326u/PHP_projet/assets/design/style.css" media="all" rel="stylesheet" type="text/css"/>
        <link rel="icon" href="assets/medias/favicon.ico" />
        <?php
        include_once (dirname(__FILE__).'/../config/dbconnect.php');
        include_once (dirname(__FILE__).'/../modeles/modele_header.php');
        ?>
    </head>

    <header>

        <div id="bg-color-header">

            <a href="index.php" class="logo">
                <img src="assets/medias/logo.png">
            </a>

            <h1 id="titre">Le twist du film</h1>

            <nav role="navigation">
                <ul>
                    <li><a href="index.php" >Menu</a></li>
                    <li><a href="/~gerard326u/PHP_projet/assets/controllers/controlleur_listearticles.php" >Tous les articles</a></li>
                    <li><a aria-haspopup="true">Par thème</a>
                        <ul aria-label="sousmenu">
                            <?php
                            $table = getTheme();
                            $trie = "description";
                            foreach_liste($table, $trie, 1);
                            ?>
                        </ul>
                    </li>
                    <li><a aria-haspopup="true">Par année de publication</a>
                        <ul aria-label="sousmenu">
                            <?php
                            $table = getAnnee();
                            $trie = "annee";
                            foreach_liste($table, $trie, 1);
                            ?>
                        </ul>
                    </li>
                    <?php
                        $connecte = false;

                        echo'<li><a href="assets/vues/vue_about.php">A propos</a></li>';

                        if($connecte == true)
                        {
                            echo'<li><a href="assets/controllers/controlleur_creerarticle.php">Faire un article</a></li>';
                            echo'<li><a href="assets/controllers/controlleur_logout.php">Se deconnecter</a></li>';
                        }
                        else {
                            echo'<li><a href="assets/controllers/controlleur_login.php">Se connecter</a></li>';
                            echo'<li><a href="assets/controllers/controlleur_signup.php">S\'inscrire</a></li>';
                        }

                    ?>
                </ul>
            </nav>

        </div>

        <hr>

    </header>

    <body>

        </br>

        <div class="contenu">
            <div class="zigzag"></div>
            <p class="tag">Les <em><b>spoilers</b></em> à l'affiche</p>
            <div class="zigzag"></div>

            <div class=slide>
                <?php
                slide();
                ?>
            </div>

            <div class="vide"></div>
            <div class="zigzag"></div>
            <p class="tag">Nos <em><b>spoilers</b></em> les plus récents</p>
            <div class="zigzag"></div>

            </br>

            <?php
            article();
            ?>

        </div>

    </body>

    <footer>
    <p>Le twist du film &copy; <?= date("Y") ?> - GERARD / GIANGRECO</p>
    </footer>


    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mesSlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}
            x[myIndex-1].style.display = "block";
            setTimeout(carousel, 9000);
        }
    </script>