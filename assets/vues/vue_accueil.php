<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">

    <!-- /*http://wordpress.la-fin-du-film.com/ Faire leur barre de recherche*/ -->


    <body >

    </br>


    <!--      http://wordpress.la-fin-du-film.com/buried-2010/585/ -->
    <div id="contenu">

        <hr>

        <h2>Les derniers articles</h2>
        </br>

        <?php

        foreach($news as $row)
        {

            $titre = $row['titrenews'];
            $previsutexte = $row['textenews'];
            $visuelchar = " (2";

            echo nom_en_visuel($titre, $visuelchar);
            echo'<div class="line"></div>';
            echo'<h3> <b>'.$row['titrenews'].'</b> </h3>';
            echo'<p> Fait le '.$row['datenews'].' par '.$row['redacteur'].'</p>';
            tronquer_texte($previsutexte);
            echo'<div style="clear:both;"></div>';

        }

        ?>

    </div>

    </body>

</html>