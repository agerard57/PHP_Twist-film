<?php

$title="Le twist du film";

include_once (dirname(__FILE__).'/../config/dbconnect.php');



//GETTERS-----------------------------------------------------------------------------------------------------------

function getNews()
{
    global $objPdo;

    $sql=
        "SELECT n.idnews, n.titrenews, n.textenews, n.datenews, CONCAT( r.nom,' ', r.prenom) AS redacteur
             FROM news n, redacteur r 
             WHERE n.idredacteur = r.idredacteur 
             ORDER BY n.datenews DESC";

    $requete = $objPdo->prepare($sql);
    $requete->execute();

    return $requete;
}

function getByDesc($mode)
{
    global $objPdo;

    $sql=
        "SELECT n.idnews, n.titrenews, n.textenews, n.datenews, CONCAT( r.nom,' ', r.prenom) AS redacteur
         FROM news n, redacteur r, theme t
         WHERE n.idredacteur = r.idredacteur
         AND n.idtheme=t.idtheme
         AND t.description=:description
         ORDER BY n.datenews DESC";

    $requete = $objPdo->prepare($sql);
    $requete->execute(array("description"=> $mode));

    return $requete;
}

function getByAnnee($mode)
{
    global $objPdo;

    $sql=
        "SELECT n.idnews, n.titrenews, n.textenews, n.datenews, CONCAT( r.nom,' ', r.prenom) AS redacteur
         FROM news n, redacteur r
         WHERE YEAR(datenews) = :annee
         AND n.idredacteur=r.idredacteur
         ORDER BY n.datenews DESC";

    $requete = $objPdo->prepare($sql);
    $requete->execute(array("annee"=> $mode));

    return $requete;
}

//Autres fonctions--------------------------------------------------------------------------------------------------


    function articles($mode,$type)
    {
        $news = null;

        if($type == 0)
        {
            $news = getNews();
        }
        else if($type == 1)
        {
            $news = getByDesc($mode);
        }
        else if($type == 2)
        {
            $news = getByAnnee($mode);
        }


        foreach($news as $row)
        {
            $titre = $row['titrenews'];
            $visuelchar = " (";
            $previsutexte = $row['textenews'];
            $idnews = $row['idnews'];

            echo'<div class="article-liste">';
            echo'<h3 class="artitres"> <b>'.$row['titrenews'].'</b> </h3>';
            echo visuels($titre, $visuelchar, $idnews);

            tronquertexte($previsutexte, $idnews);

            echo'<p class="metarticle"> '.$row['datenews'].' - '.$row['redacteur'].'</p>';

            echo'<div style="clear:both;"></div>';
            echo'</div>';

        }
    }

    function tronquertexte($previsutexte, $idnews) // Get une news avec l'id différent du news actuel
    {
        $texte_espaces = preg_replace('/\s+/', ' ', $previsutexte);// tronque le texte
        $texte_tronque = mb_substr($texte_espaces, 0, mb_strpos($texte_espaces, ' ', 200));//empèche de tronquer si il n'y a pas d'espace
        $previsutexte = trim(mb_substr($texte_tronque, 0, mb_strrpos($texte_tronque, ' '))).'...';

        echo'<p class="textedesc">'.$previsutexte.' <a href="../controllers/controlleur_article.php?idnews='.$idnews.'">Lire la suite...</a></p>';
    }

    function visuels($str, $char, $idnews)
    {
        $visu = substr($str, 0, strrpos($str, $char));
        $visu = trim($visu);                                             // simple trim
        $visu = strtolower($visu);                                       // mise en minuscule
        $visu = str_replace(' ', '_', $visu);                            // les espaces deviennent _
        $visu = str_replace(str_split('\\/:\'`*?"<>|()’,'), '', $visu);   // remplace \/:'`*?"<>|()
        //$visu = enleventaccents($visu);                 // remplace tous les char spéciaux


        str_replace("\\","/",dirname(__FILE__));
        echo'<a href="../controllers/controlleur_article.php?idnews='.$idnews.'"><img class="bannieres" src="../medias/bannieres/'.$visu.'.jpg">  <img/></a>';
    }

//function enleventaccents($stripAccents){
    //return strtr($stripAccents,'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ','aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');




