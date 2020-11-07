<?php
session_start();
include 'assets/config/dbconnect.php';

if ( !empty($_GET['page'] ) && is_file('assets/controllers/'.$_GET['page'] .'.php'))
{
    include 'assets/controllers/'.$_GET['page'] .'.php';
}
else
{
    include 'assets/controllers/controlleur_header.php';

    include 'assets/controllers/controlleur_accueil.php';

    include 'assets/controllers/controlleur_footer.php';
}

$objPdo=NULL;
?>