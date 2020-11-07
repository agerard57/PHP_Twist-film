<!DOCTYPE html>

<html>

<head>

    <?php
    include_once(dirname(__FILE__) . '/../modeles/modele_accueil.php');

    global $title;
    ?>

    <title><?php echo $title; ?></title>
    <link href="assets/design/style.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="../design/style.css" media="all" rel="stylesheet" type="text/css"/>

    <meta charset=utf-8" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
    <link rel="icon" href="assets/medias/favicon.ico" />

</head>

<body>
    <header>

        <div id="bg-color-header">

            <img src="../medias/logo.png" src="assets/medias/logo.png">

            <h1 id="titre">Le twist du film</h1>

            <nav role="navigation">
                <ul>
                    <li><a href="../index/index.php" >Menu</a></li>
                    <li><a href="../../assets/controllers/controlleur_listearticles.php" >Tous les articles</a></li>
                    <li><a aria-haspopup="true">Par thème</a>
                    <ul class="dropdown" aria-label="submenu">
                        <?php
                        $table = getTheme();
                        $trie = "description";
                        foreach_liste($table, $trie);
                        ?>
                    </ul>
                    </li>
                    <li><a aria-haspopup="true">Par année de publication</a>
                    <ul class="dropdown" aria-label="submenu">
                        <?php
                        $table = getAnnee();
                        $trie = "annee";
                        foreach_liste($table, $trie);
                        ?>
                    </ul>
                    </li>
                    <li><a href="../../assets/controllers/sinscrire.php">S'inscrire</a></li>
                    <li><a href="../../assets/controllers/seconnecter.php">Se connecter</a></li>
                    <li><a href="../../assets/controllers/about.php">A propos ...</a></li>
                </ul>
            </nav>

        </div>

        <hr>

    </header>

</body>