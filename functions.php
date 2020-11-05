<?php

    include_once ("config/dbconnect.php");

    function getTheme() // Get une news avec l'id différent du news actuel
    {
        global $objPdo;
        $requete = $objPdo->prepare("
            SELECT *
            FROM theme t
            ORDER BY t.description ASC");

    $requete->execute();

    return $requete;
    }

    function getNewsMenu() // Get une news avec l'id différent du news actuel
    {
        global $objPdo;
        $requete = $objPdo->prepare("
            SELECT n.idnews, n.titrenews, n.visuel, n.textenews, n.datenews, CONCAT( r.nom,' ', r.prenom) AS redacteur
            FROM news n, redacteur r 
            WHERE n.idredacteur = r.idredacteur 
            ORDER BY n.datenews DESC
            LIMIT 5");

        $requete->execute();

        return $requete;
    }

/*
    function fetchNews() // Rapporte les news
    {

        $requete = $objPdo->prepare("
SELECT n.idnews, n.titrenews, CONCAT( r.nom,' ', r.prenom)
FROM news n, redacteur r 
WHERE n.idredacteur = r.idredacteur 
ORDER BY n.idnews DESC");

        return $requete->execute() ? $requete->fetchAll() : false; 
    }


    function getUneNews( $idnews  ) // Get une news
    {

        $requete = $objPdo->prepare("
SELECT n.idnews, n.titrenews, CONCAT( r.nom,' ', r.prenom) 
FROM news n, redacteur r 
WHERE n.idredacteur = r.idredacteur 
ORDER BY n.idnews DESC 
AND n.idnews = ? ");

        return $requete->execute(array($idnews)) ? $requete->fetchAll() : false; 
    }


    function getAutreNews( $differ_idnews  ) // Get une news avec l'id différent du news actuel
    {
        $requete = conn->prepare("
SELECT n.idnews, n.titrenews, CONCAT( r.nom,' ', r.prenom) 
FROM news n, redacteur r 
WHERE n.idredacteur = r.idredacteur 
ORDER BY n.idnews DESC 
AND n.idnews != ? ");

        return $requete->execute(array($differ_idnews)) ? $requete->fetchAll() : false; 
    }


function getGenre2( $differ_idnews  ) // Get une news avec l'id différent du news actuel
{
    global $objPdo;
    $requete = $objPdo->prepare("
SELECT n.idnews, n.titrenews, CONCAT( r.nom,' ', r.prenom) 
FROM news n, redacteur r 
WHERE n.idredacteur = r.idredacteur 
ORDER BY n.idnews DESC 
AND n.idnews != ? ");

    return $requete->execute(array($differ_idnews)) ? $requete->fetchAll() : false;
}*/

