<?php

    $title="Le twist du film";

    include_once (dirname(__FILE__).'/../config/dbconnect.php');
    include_once (dirname(__FILE__).'/modele_header.php');



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



    //Autres focntions--------------------------------------------------------------------------------------------------

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



    function slide()
    {
        $news = getNewsMenu(4);
        $id = 0;
        global $idnews;

        foreach($news as $row)
        {
            $titre = $row['titrenews'];
            $visuelchar = " (";

                $id++;

            echo'<a href="../controllers/controlleur_article.php?idnews='.$idnews.'"><div class="mesSlides fade">';
                echo '<div class="nombretext">'.$id.' / 4</div>';
                echo visuel($titre, $visuelchar, "bannieres", false, null);
                echo '<div class="texte">'.$titre.'</div>';
            echo'</div></a>';


        }

    }



    function visuel($str, $char, $type, $article, $idnews)
    {
        $visu = substr($str, 0, strrpos($str, $char));
        $visu = trim($visu);                                             // simple trim
        $visu = strtolower($visu);                                       // mise en minuscule
        $visu = str_replace(' ', '_', $visu);                            // les espaces deviennent _
        $visu = str_replace(str_split('\\/:\'`*?"<>|(),'), '', $visu);   // remplace \/:'`*?"<>|()
        $visu = iconv('UTF-8','ASCII//TRANSLIT', $visu);                 // remplace tous les char spéciaux

        if($article == true)
        {
            echo'<a href="../controllers/controlleur_article.php?idnews='.$idnews.'"><img class='.$type.' src="assets/medias/'.$type.'/'.$visu.'.jpg">  <img/></a>';
        }
        else
        {
            echo'<img class="imgbanniere" src="assets/medias/'.$type.'/'.$visu.'.jpg"> <img/>';
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
