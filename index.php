<html lang="fr">

<!-- /*http://wordpress.la-fin-du-film.com/ Faire leur barre de recherche*/ -->

<head>
    <title>Le twist du film</title>
    <meta content="text/html; charset=utf-8" />
    <link href="design/style.css" media="all" rel="stylesheet" type="text/css"/>
    <link rel="icon" href="medias/favicon.ico" />
    <?php
        include_once ("functions.php");
    ?>

</head>
<header>
    <h1>Le twist du film</h1>
    <img src="medias/logo.png">
</header>
<body>
<div >
    <div>
        <ul>
            <li><a href="index.php" >Menu</a></li>
            <li><a href="listearticles.php" >Tous les articles</a></li>
            <li>Par thème</li>
                <ul class='submenu'>
                    <?php
                    $theme = getTheme();
                    foreach($theme as $row)
            {
                echo '<li> <a href="listearticles.php?theme='.strtolower($row['description']).'">'.$row['description'].'</a> </li>';
            }
                    ?>

                </ul>
            <li><a href="#">Par années</a></li>
            <li><a href="#">S'inscrire / Se connecter</a></li>
            <li><a href="#">A propos ...</a></li>
        </ul>
        <img src="media/banner.jpg" alt="" /> </div>
<!--      http://wordpress.la-fin-du-film.com/buried-2010/585/ -->
        <h2>Les dernièrs articles</h2>

            <div></div>

                <?php
                    $news = getNewsMenu();
                    foreach($news as $row)
                    {
                        $previsutexte = $row['textenews'];
                        // we don't want new lines in our preview
                        $texte_espaces = preg_replace('/\s+/', ' ', $previsutexte);// truncates the text
                        $texte_tronque = mb_substr($texte_espaces, 0, mb_strpos($texte_espaces, ' ', 200));// prevents last word truncation
                        $previsutexte = trim(mb_substr($texte_tronque, 0, mb_strrpos($texte_tronque, ' '))).'...';
                        echo'<h3> <b>'.$row['titrenews'].'</b> </h3>';
                        echo'<img src="medias/affiches/'.$row['visuel'].'">  <img/>';
                        echo'<p>'.$previsutexte.' <a href="article.php?idnews=">Lire la suite...</a></p>';
                        echo'<p> Fait le '.$row['datenews'].' par '.$row['redacteur'].'</p>';

                    }
        //<h3></h3>
        //<p>This free  template was designed by the Template Tower and is licensed under a <a target="_blank" href="http://creativecommons.org/licenses/by/2.5/">Creative Commons Attribution 2.5 License</a>. Dark Grunge is free for any commercial or personal use provided you link back to <em>templatetower.com</em>.  All Free and Deluxe Templates on Template Tower are W3C standards compliant and valid CSS/XHTML. The Tower is focused on providing only the most creative, beautiful, and original table-free templates on the web.</p>
        //<div class="line"></div>
        ?>

        <div class="footer"></div>
        <p>Le twist du film &copy; <?= date("Y") ?> - GERARD / GIANGRECO </a></p>
        <p>&nbsp;</p>
    </div>
</div>
</body>
</html>

<?php

/*session_start();
include "config/dbconnect.php";

if ( !empty($_GET['page'] ) && is_file('controllers/'.$_GET['page'] .'.php'))
    {
        include 'controllers/'.$_GET['page '] .'.php';
    }
else
    {
        include 'controllers/accueil.php';
    }
$objPdo=NULL;

*/?>

