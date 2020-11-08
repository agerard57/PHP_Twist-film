<?php

$db_config = array();
$db_config['SGBD'] = 'mysql';
$db_config['DB_NAME'] = 'gerard326u_projet_php';
$db_config['CHARSET'] = $options = array(
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

$db_config['HOST'] = 'devbdd.iutmetz.univ-lorraine.fr';
$db_config['USER'] = 'gerard326u_appli';
$db_config['PASSWORD'] = '3630';



try
{
    $objPdo = new PDO($db_config['SGBD'] .':host='. $db_config['HOST'] .';dbname='.$db_config['DB_NAME'], $db_config['USER'], $db_config['PASSWORD'], $db_config['CHARSET']);
}
catch( Exception $exception )
{
    die($exception->getMessage()) ;
}

?>