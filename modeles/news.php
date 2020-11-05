<?php
function recuperer_news()
{
global $objPdo;
$req = "SELECT id, auteur, titre, DATE_FORMAT(date, '%d/%m/%Y à %Hh') AS
date_formatee, contenu FROM news ORDER BY date DESC";
$result=$objPdo->Prepare($req);
$result->execute();
$news = array();
foreach($result as $data)
{
$news [ ] = $data;
}
return $news;
}
?>