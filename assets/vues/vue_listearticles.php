<!DOCTYPE html>

<html>

    <head>


        <?php
        global $title;
        include_once (dirname(__FILE__).'/../config/dbconnect.php');
        include_once (dirname(__FILE__).'/../modeles/modele_header.php');
        ?>
        <title><?php echo $title; ?></title>
        <meta charset=utf-8" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
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
                        <ul class="dropdown" aria-label="submenu">
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
                    <li><a href="../controllers/controlleur_signup.php">S'inscrire</a></li>
                    <li><a href="../controllers/controlleur_login.php">Se connecter</a></li>
                    <li><a href="../vues/vue_about.php">A propos ...</a></li>
                </ul>
            </nav>

        </div>

        <hr>

    </header>

    <body>
    <div class="contenu">

        <br>

        <div class="zigzag"></div>
        <?php

            if (!isset($_GET["description"])&&!isset($_GET["annee"]))
            {
                echo'<p class="tag"><b>Tous nos <em>articles</b></em></p>';
                echo'<div class="zigzag"></div>';
                echo'</br>';
                articles(null, 0);
            }
            else if(isset($_GET["description"]))
            {
                echo'<p class="tag"><b>Catégorie <em>'.$_GET["description"].'</b></em></p>';
                echo'<div class="zigzag"></div>';
                echo'</br>';
                articles($_GET["description"], 1);
            }
            else if(isset($_GET["annee"]))
            {
                echo'<p class="tag"><b>Année <em>'.$_GET["annee"].'</b></em></p>';
                echo'<div class="zigzag"></div>';
                echo'</br>';
                articles($_GET["annee"], 2);
            }
            else
            {
                echo'<p class="tag"><b>Année <em>'.$_GET["annee"].'</b></em></p>';
                echo'<div class="zigzag"></div>';
                echo'</br>';
                articles($_GET["annee"], 2);
            }
            
    
        ?>

    </div>

</body>

    <footer>
        <p>Le twist du film &copy; <?= date("Y") ?> - GERARD / GIANGRECO </a></p>
    </footer>


</html>