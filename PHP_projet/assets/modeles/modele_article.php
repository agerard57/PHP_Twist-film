<?php

$title="Le twist du film";

include_once (dirname(__FILE__).'/../config/dbconnect.php');


//GETTERS-----------------------------------------------------------------------------------------------------------

function getNewsById($idnews,$idtheme) // Get les news du menu principal ("banniere + contenu")
{
    global $objPdo;

    $sql=
        "SELECT DISTINCT n.idnews, n.titrenews, n.datenews, n.textenews, t.description, CONCAT(r.nom,' ', r.prenom) AS redacteur
         FROM news n, theme t, redacteur r
         WHERE n.idtheme = t.idtheme
         AND n.idredacteur = r.idredacteur
         AND n.idnews <>:=$idnews
         AND t.idtheme:=$idtheme
         ORDER BY RAND()
         LIMIT 4";

    $requete = $objPdo->prepare($sql);
    $requete->execute();

    return $requete;
}


//Autres fonctions--------------------------------------------------------------------------------------------------

