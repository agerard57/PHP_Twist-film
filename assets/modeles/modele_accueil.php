<?php

    $title="Le twist du film";

    include_once (dirname(__FILE__).'/../config/dbconnect.php');

    function article(){

        $news = getNewsMenu(6);

        foreach($news as $row)
        {
            $titre = $row['titrenews'];
            $visuelchar = " (";
            $previsutexte = $row['textenews'];

            echo'<div class="article-liste">';
            echo'<h3> <b>'.$row['titrenews'].'</b> </h3>';
            echo visuel($titre, $visuelchar, "bannieres", true);

            echo'<p> Fait le '.$row['datenews'].' par '.$row['redacteur'].'</p>';

            tronquer_texte($previsutexte);

            echo'<div style="clear:both;"></div>';
            echo'</div>';

        }
    }

    function slide(){

        $news = getNewsMenu(3);
        $id = 0;

        foreach($news as $row)
        {
            $titre = $row['titrenews'];
            $visuelchar = " (";
    //
                $id++;

            echo'<div class="mesSlides fade">';
                echo '<div class="nombretext">'.$id.' / 4</div>';
                visuel($titre, $visuelchar, "bannieres", false);
                echo '<div class="texte">'.$titre.'</div>';
            echo'</div>';


        }

    }
    function tronquer_texte($previsutexte) // Get une news avec l'id différent du news actuel
    {
        $texte_espaces = preg_replace('/\s+/', ' ', $previsutexte);// tronque le texte
        $texte_tronque = mb_substr($texte_espaces, 0, mb_strpos($texte_espaces, ' ', 200));//empèche de tronquer si il n'y a pas d'espace
        $previsutexte = trim(mb_substr($texte_tronque, 0, mb_strrpos($texte_tronque, ' '))).'...';

        echo'<p>'.$previsutexte.' <a href="../controllers/controlleur_article.php?idnews=">Lire la suite...</a></p>';
    }






function visuel($str, $char, $type, $article)
    {
        $visu = substr($str, 0, strrpos($str, $char));
        $visu = trim($visu);                                             // simple trim
        $visu = strtolower($visu);                                       // mise en minuscule
        $visu = str_replace(' ', '_', $visu);                            // les espaces deviennent _
        $visu = str_replace(str_split('\\/:\'`*?"<>|(),'), '', $visu);   // remplace \/:'`*?"<>|()
        $visu = iconv('UTF-8','ASCII//TRANSLIT', $visu);                 // remplace tous les char spéciaux

        if($article == true)
        {
            echo'<img class='.$type.' src="assets/medias/'.$type.'/'.$visu.'.jpg">  <img/>';
        }
            else
        {
            echo'<img class="imgbanniere" src="assets/medias/'.$type.'/'.$visu.'.jpg"> <img/>';
        }

    }

    function foreach_liste($table, $trie)
    {
        foreach($table as $row)
        {
            echo '<li> <a href="assets/controllers/controlleur_listearticles.php?'.$trie.'='.strtolower($row[$trie]).'">'.$row[$trie].'</a> </li>';
        }
    }



//GETTERS

function getNewsMenu($limite) // Get une news avec l'id différent du news actuel
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


function getTheme() // Get une news avec l'id différent du news actuel
{
    global $objPdo;

    $sql=
        "SELECT *
         FROM theme t
         ORDER BY t.description ASC";

    $requete = $objPdo->prepare($sql);
    $requete->execute();

    return $requete;
}


function getAnnee() // Rapporte les news
{
        global $objPdo;

    $sql=
        "SELECT DISTINCT YEAR(datenews) as annee
         FROM news
         ORDER BY datenews DESC";

    $requete = $objPdo->prepare($sql);
    $requete->execute();

    return $requete->execute();
}

/*
        function getAutreNews( $differ_idnews  ) // Get une news avec l'id différent du news actuel
        {
            $requete = conn->prepare("
SELECT idnews
FROM news
WHERE idnews != ?
AND idtheme= ?
ORDER BY RAND()
LIMIT 4 ");

            return $requete->execute(array($differ_idnews)) ? $requete->fetchAll() : false;
        }
    }*/

?>
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function slideActuelle(n) {
        showSlides(slideIndex = n);
    }

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mesSlides");
        for (i = 1; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        slides[slideIndex-1].style.display = "block";
        setTimeout(showSlides, 10000); // Change image every 2 seconds
    }
</script>
