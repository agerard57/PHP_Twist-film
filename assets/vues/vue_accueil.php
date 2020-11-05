<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">

<!-- /*http://wordpress.la-fin-du-film.com/ Faire leur barre de recherche*/ -->

<head>
    <title>Le twist du film</title>
    <meta content="text/html; charset=utf-8" />
    <link href="assets/design/style.css" media="all" rel="stylesheet" type="text/css"/>
    <link rel="icon" href="assets/medias/favicon.ico" />
    <?php
    include_once(dirname(__FILE__) . '/../modeles/modele_accueil.php');
    ?>

</head>
<header>
    <h1>Le twist du film</h1>
    <img src="assets/medias/logo.png">
</header>
<body>
<br >
<div>
    <ul>
        <li><a href="index.php" >Menu</a></li>
        <li><a href="assets/controllers/controlleur_listearticles.php" >Tous les articles</a></li>
        <li>Par thème</li>
        <ul class='submenu'>
            <?php
            $table = getTheme();
            $trie = "description";
            foreach_liste($table, $trie);
            ?>

        </ul>
        <li>Par année de publication</li>
        <ul class='submenu'>
            <?php
            $table = getAnnee();
            $trie = "annee";
            foreach_liste($table, $trie);
            ?>
        </ul>
        <li><a href="assets/controllers/controlleur_log.php">S'inscrire / Se connecter</a></li>
        <li><a href="assets/controllers/controlleur_about.php">A propos ...</a></li>
    </ul>
    <img src="assets/medias/banner.jpg" alt="" />
</div>

<!--      http://wordpress.la-fin-du-film.com/buried-2010/585/ -->

<h2>Les derniers articles</h2>

</br>

<div class="line"></div>

</br>

<div></div>

<?php

foreach($news as $row)
{
    $titre = $row['titrenews'];
    $previsutexte = $row['textenews'];
    $visuelchar = " (2";

    echo'<h3> <b>'.$row['titrenews'].'</b> </h3>';
    echo nom_en_visuel($titre, $visuelchar);
    tronquer_texte($previsutexte);
    echo'<p> Fait le '.$row['datenews'].' par '.$row['redacteur'].'</p>';
    echo'<div class="line"></div>';

}

?>

</body>

<footer>
    <p>Le twist du film &copy; <?= date("Y") ?> - GERARD / GIANGRECO </a></p>
    <p>&nbsp;</p>
</footer>

</html>