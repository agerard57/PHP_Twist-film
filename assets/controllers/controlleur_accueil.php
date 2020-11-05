<?php

include(dirname(__FILE__) . '/../modeles/modele_accueil.php');

$news = getNewsMenu();

include(dirname(__FILE__) . '/../vues/vue_accueil.php');
?>