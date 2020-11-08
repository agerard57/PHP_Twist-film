<html>
    <head>

        <?php
        include_once (dirname(__FILE__).'/../config/dbconnect.php');
        include_once (dirname(__FILE__).'/../modeles/modele_header.php');
        ?>

        <link href="../design/style.css" media="all" rel="stylesheet" type="text/css"/>
        <link rel="icon" href="../medias/favicon.ico" />

    </head>

    <header>

        <div id="bg-color-header">

            <a href="../../index.php" class="logo">
                <img src="../medias/logo.png">
            </a>

            <h1 id="titre">Le twist du film</h1>

            <nav role="navigation">
                <ul>
                    <li><a href="../../index.php" >Menu</a></li>
                    <li><a href="../controllers/controlleur_listearticles.php" >Tous les articles</a></li>
                    <li><a aria-haspopup="true">Par thème</a>
                        <ul aria-label="sousmenu">
                            <?php
                            $table = getTheme();
                            $trie = "description";
                            foreach_liste($table, $trie, 2);
                            ?>
                        </ul>
                    </li>
                    <li><a aria-haspopup="true">Par année de publication</a>
                        <ul class="dropdown" aria-label="submenu">
                            <?php
                            $table = getAnnee();
                            $trie = "annee";
                            foreach_liste($table, $trie, 2);
                            ?>
                        </ul>
                    </li>
                    <li><a href="../vues/vue_signup.php">S'inscrire</a></li>
                    <li><a href="../vues/vue_login.php">Se connecter</a></li>
                    <li><a href="../vues/vue_about.php">A propos ...</a></li>
                </ul>
            </nav>

        </div>

        <hr>

    </header>

<body>
<div class="contenu">
    <div class="zigzag"></div>

    <p class="tag">A <em><b>propos</b></em> du site</p>

    <div class="zigzag"></div>
    <br><br><br><br>
    <p>Sur ce site, vous pourrez y retrouver le spoil de vos films favoris ! </p><br>
    <p>Tels que Inception, Split, ou encore Zombieland, ce site pourra vous en apprendre plus sur la fin d'un film, révélant notamment des informations que vous auriez peut-être loupées !</p>
    <p>Il y est aussi présent le nom des réalisateurs, une bannière ou bien même l'affiche du film. </p><br>
    <p>Ce site a été créé pour un sujet en PHP par deux étudiants en deuxième année de DUT informatique à Metz. </p>
    <p>Ceux-ci se nomment GIANGRECO Vincent (le magnifique) et GERARD Alexandre (le virtuose).</p><br>
    <p>Vous pourriez les contacter en utilisant cette adresse mail.</p>
    <p>Je vous offre aussi un lien vers leur github, pas besoin de me remercier !</p>
    <p>Github d'Alexandre:<a href = "https://github.com/agerard57" > présent ! </a> Github de Vincent: <a href = "https://github.com/clevinjuna%22%3E présent aussi !</a></p>
            <p>En espérant que notre site vous plaira !</p><br><br>
            <p>--Vos joyeux développeurs préférés :)--</p>

            </div>


        </body>


</html>