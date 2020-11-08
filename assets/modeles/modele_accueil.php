<?php

    $title="Le twist du film";

    include_once (dirname(__FILE__).'/../config/dbconnect.php');


    //GETTERS-----------------------------------------------------------------------------------------------------------

    function getNewsMenu($limite) // Get les news du menu principal ("banniere + contenu")
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



    //Autres focctions--------------------------------------------------------------------------------------------------

    function article()
    {

        $news = getNewsMenu(6);

        foreach($news as $row)
        {
            $titre = $row['titrenews'];
            $visuelchar = " (";
            $previsutexte = $row['textenews'];
            $idnews = $row['idnews'];

            echo'<div class="article-liste">';
            echo'<h3 class="artitres"> <b>'.$row['titrenews'].'</b> </h3>';
            echo visuel($titre, $visuelchar, "bannieres", true, $idnews);

            tronquer_texte($previsutexte, $idnews);

            echo'<p class="metarticle"> '.$row['datenews'].' - '.$row['redacteur'].'</p>';

            echo'<div style="clear:both;"></div>';
            echo'</div>';

        }
    }



    function tronquer_texte($previsutexte, $idnews) // Get une news avec l'id différent du news actuel
    {
        $texte_espaces = preg_replace('/\s+/', ' ', $previsutexte);// tronque le texte
        $texte_tronque = mb_substr($texte_espaces, 0, mb_strpos($texte_espaces, ' ', 200));//empèche de tronquer si il n'y a pas d'espace
        $previsutexte = trim(mb_substr($texte_tronque, 0, mb_strrpos($texte_tronque, ' '))).'...';

        echo'<p class="textedesc">'.$previsutexte.' <a href="../controllers/controlleur_article.php?idnews='.$idnews.'">Lire la suite...</a></p>';
    }



    function slide(){

        $news = getNewsMenu(4);

        foreach($news as $row)
        {
            $idnews = $row['idnews'];
            $visu=$row["titrenews"];
            $visuelchar = " (";

            echo'<a href="assets/controllers/controlleur_article.php?idnews='.$idnews.'">';
            echo visuel($visu, $visuelchar, "bannieres", false, null).'</a>';
        }
    }



function enleveaccents ($string) {
$table = array(
    'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
    'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
    'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
    'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
    'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
    'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
    'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
    'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r',
    );

return strtr($string, $table);
}


function visuel($str, $char, $type, $article, $idnews)
    {
        $visu = substr($str, 0, strrpos($str, $char));
        $visu = trim($visu);                                             // simple trim
        $visu = strtolower($visu);                                       // mise en minuscule
        $visu = str_replace(' ', '_', $visu);                            // les espaces deviennent _
        $visu = str_replace(str_split('\\/:\'`*?"<>|(),'), '', $visu);   // remplace \/:'`*?"<>|()
        $visu = enleveaccents($visu);                 // remplace tous les char spéciaux

        if($article == true)
        {
            str_replace("\\","/",dirname(__FILE__));
            echo'<a href="../controllers/controlleur_article.php?idnews='.$idnews.'"><img class='.$type.' src="assets/medias/'.$type.'/'.$visu.'.jpg">  <img/></a>';
        }
    else if($article == false && $idnews != null)
        {
            echo'<img class="imgbanniere" src="../medias/'.$type.'/'.$visu.'.jpg"> <img/>';
        }
    else{
        echo'<img class="mesSlides fading" src=" assets/medias/bannieres/'.$visu.'.jpg"> <img/>';

    }

    }



?>




<!--Scripts------------------------------------------------------------------------------------------------------------->

<script>

    var slideIndex = 0;
    showSlides(slideIndex);

    function plusSlides(n)
    {
        showSlides(slideIndex += n);
    }

    function slideActuelle()
    {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mesSlides");
        var dots = document.getElementsByClassName("points");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        setTimeout(slideActuelle, 2000); // Change image every 2 seconds
    }

</script>
