<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">

    <!-- /*http://wordpress.la-fin-du-film.com/ Faire leur barre de recherche*/ -->


    <body onload="slideActuelle(1)">

    </br>

    <!--      http://wordpress.la-fin-du-film.com/buried-2010/585/ -->
    <div class="contenu">


        <div class="zigzag"></div>
        <p class="tag">Les <em><b>spoilers</b></em> à l'affiche</p>
        <div class="zigzag"></div>


        <div class="conteneur-slideshow">

            <a href="../controllers/controlleur_article.php?idnews='.$idnews.'"><div class="mesSlides fade">
                visuel($titre, $visuelchar, "bannieres", false);
                </div>
            <?php
                slide();
            ?>


            <a class="prec" onclick="plusSlides(-1)">&#10094;</a>
            <a class="sui" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>


        <div style="text-align:center">
            <span class="dot" onclick="slideActuelle(1)"></span>
            <span class="dot" onclick="slideActuelle(2)"></span>
            <span class="dot" onclick="slideActuelle(3)"></span>
        </div>

        <div class="zigzag"></div>
        <p class="tag">Nos <em><b>spoilers</b></em> les plus récents</p>
        <div class="zigzag"></div>

        </br>

        <?php
            article();
        ?>

    </div>

    </body>

</html>