<?php

$title="Le twist du film";

include_once (dirname(__FILE__).'/../config/dbconnect.php');
include_once (dirname(__FILE__).'/modele_header.php');



//GETTERS-----------------------------------------------------------------------------------------------------------

function getNewsTheme($limite) // Get les news de la page qui ont le theme
{
    global $objPdo;

    $sql=
        "SELECT n.idnews, n.titrenews, n.textenews, n.datenews, CONCAT( r.nom,' ', r.prenom) AS redacteur
             FROM news n, redacteur r 
             WHERE n.idredacteur = r.idredacteur 
             ORDER BY n.datenews DESC
             LIMIT $limite";

    $requete = $objPdo->prepare($sql);
    $requete->execute();

    return $requete;
}



//Autres focntions--------------------------------------------------------------------------------------------------



?>



<!--Scripts------------------------------------------------------------------------------------------------------------->