<?php
$title="Le twist du film";

    include_once (dirname(__FILE__).'/../config/dbconnect.php');

    function tronquer_texte($previsutexte) // Get une news avec l'id différent du news actuel
    {
        $texte_espaces = preg_replace('/\s+/', ' ', $previsutexte);// tronque le texte
        $texte_tronque = mb_substr($texte_espaces, 0, mb_strpos($texte_espaces, ' ', 200));//empèche de tronquer si il n'y a pas d'espace
        $previsutexte = trim(mb_substr($texte_tronque, 0, mb_strrpos($texte_tronque, ' '))).'...';

        echo'<p>'.$previsutexte.' <a href="../controllers/controlleur_article.php?idnews=">Lire la suite...</a></p>';
    }


    function getNewsMenu() // Get une news avec l'id différent du news actuel
    {
        global $objPdo;
        $requete = $objPdo->prepare("
            SELECT n.idnews, n.titrenews, n.textenews, n.datenews, CONCAT( r.nom,' ', r.prenom) AS redacteur
            FROM news n, redacteur r 
            WHERE n.idredacteur = r.idredacteur 
            ORDER BY n.datenews DESC
            LIMIT 5");

        $requete->execute();

        return $requete;
    }

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
function getAnnee() // Rapporte les news
    {
        global $objPdo;
        $requete = $objPdo->prepare("
            SELECT DISTINCT YEAR(datenews) as annee
            FROM news
            ORDER BY datenews DESC");

        return $requete->execute() ? $requete->fetchAll() : false;
    }



    function nom_en_visuel($str, $char)
    {
        $visu = substr($str, 0, strrpos($str, $char));
        $visu = trim($visu);
        $visu = strtolower($visu);                                         // mise en minuscule
        $visu = str_replace(' ', '_', $visu);                 // remplace tous les espaces par des _
        $visu = iconv('UTF-8','ASCII//TRANSLIT',$visu);  // remplace tous les char spéciaux
        echo'<img src="assets/medias/affiches/'.$visu.'.jpg">  <img/>';
    }

    function foreach_liste($table, $trie)
    {
        foreach($table as $row)
        {
            echo '<li> <a href="assets/controllers/controlleur_listearticles.php?'.$trie.'='.strtolower($row[$trie]).'">'.$row[$trie].'</a> </li>';
        }
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


        function getNews( $idnews  ) // Get une news
        {

            $requete = $objPdo->prepare("
    SELECT n.idnews, n.titrenews, CONCAT( r.nom,' ', r.prenom)
    FROM news n, redacteur r
    WHERE n.idredacteur = r.idredacteur
    ORDER BY n.idnews DESC
    AND n.idnews = ? ");
function getNews() // Get une news avec l'id différent du news actuel
    {
        global $objPdo;
        $requete = $objPdo->prepare("
                SELECT n.idnews, n.titrenews, n.textenews, n.datenews, CONCAT( r.nom,' ', r.prenom) AS redacteur
                FROM news n, redacteur r
                WHERE n.idredacteur = r.idredacteur
                ORDER BY n.datenews DESC
                LIMIT 5");

        $requete->execute();

        return $requete;
    }
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

?>