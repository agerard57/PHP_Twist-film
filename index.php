<?php
session_start();
include 'assets/config/dbconnect.php';

if ( !empty($_GET['page'] ) && is_file('assets/controllers/'.$_GET['page'] .'.php'))
{ // inclusion du fichier s’il existe et s’il est spécifié
    include 'assets/controllers/'.$_GET['page'] .'.php';
}
else
{ // Sinon on appelle une page d’accueil
    include 'assets/controllers/controlleur_accueil.php';
}
//On ferme la connexion à MySQL
$objPdo=NULL; // fermeture connexion
?>