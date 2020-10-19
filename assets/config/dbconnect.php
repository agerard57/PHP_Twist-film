<?php // promis c'est pas de la triche : https://phpocean.com/tutorials/back-end/create-a-simple-news-site-with-php-and-mysql-using-pdo/11
        $pdo = null;
        function connect_to_db()
        {
            $dbengine   = 'mysql';
            $dbhost     = 'devbdd.iutmetz.univ-lorraine.fr';
            $dbuser     = 'gerard326u_appli';
            $dbpassword = '3630';
            $dbname     = 'gerard326u_PHP_projet';

            try{
                $pdo = new PDO("".$dbengine.":host=$dbhost; dbname=$dbname", $dbuser,$dbpassword);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                return $pdo;
            }  
            catch (PDOException $e){
                $e->getMessage();
            }
        }