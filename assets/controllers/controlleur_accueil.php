<?php

include_once(dirname(__FILE__) . '/../modeles/modele_accueil.php');

$news = getNewsMenu();

include_once(dirname(__FILE__) . '/../vues/vue_accueil.php');

?>