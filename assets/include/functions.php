<?php 
    require __DIR__.'/../config/dbconnect.php'; 

    function fetchNews( $conn ) // Rapporte les news
    {

        $requete = $conn->prepare("SELECT n.idnews, n.titrenews, CONCAT( r.nom,' ', r.prenom) FROM news n, redacteur r WHERE n.idredacteur = r.idredacteur ORDER BY n.idnews DESC");
        return $requete->execute() ? $requete->fetchAll() : false; 
    }


    function getUneNews( $idnews, $conn ) // Get une news
    {

        $requete = $conn->prepare("SELECT n.idnews, n.titrenews, CONCAT( r.nom,' ', r.prenom) FROM news n, redacteur r WHERE n.idredacteur = r.idredacteur ORDER BY n.idnews DESC AND n.idnews = ? ");
        return $requete->execute(array($idnews)) ? $requete->fetchAll() : false; 
    }


    function getAutreNews( $differ_idnews, $conn ) // Get une news avec l'id différent du news actuel 
    {
        $requete = $conn->prepare("SELECT n.idnews, n.titrenews, CONCAT( r.nom,' ', r.prenom) FROM news n, redacteur r WHERE n.idredacteur = r.idredacteur ORDER BY n.idnews DESC AND n.idnews != ? ");
        return $requete->execute(array($differ_idnews)) ? $requete->fetchAll() : false; 
    }