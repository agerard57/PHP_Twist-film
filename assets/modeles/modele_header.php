<?php

    include_once (dirname(__FILE__).'/../config/dbconnect.php');


    //GETTERS-----------------------------------------------------------------------------------------------------------

    function getAnnee() // Get les années du sous menu "Par année de publication"
    {
        global $objPdo;

        $sql=
            "SELECT DISTINCT YEAR(datenews) as annee
                 FROM news
                 ORDER BY datenews DESC";

        $requete = $objPdo->prepare($sql);
        $requete->execute();

        return $requete;
    }



    function getTheme() // Get les thèmes du sous menu "Par thème"
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



//Autres focntions--------------------------------------------------------------------------------------------------




    function foreach_liste($table, $trie)
    {
        foreach($table as $row)
        {
            echo '<li> <a href="assets/controllers/controlleur_listearticles.php/?'.$trie.'='.strtolower($row[$trie]).'">'.$row[$trie].'</a> </li>';
        }
    }



?>