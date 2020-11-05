<?php
// vérification des autorisations si nécessaire et inclusion du fichier modèle
include(dirname(__FILE__).'/../modeles/news.php');
$news = recuperer_news(); // récupération des news
include(dirname(__FILE__).'/../vues/news.php'); // inclusion du fichier vue
?>