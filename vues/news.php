<h1>Les news du site</h1>
<?php
foreach ($news as $uneNews)
{
echo '<div class="news"> <h2>' .$uneNews->titre
.'</h2><p>News postée le '.$uneNews->date_formatee
.' par '.$uneNews->auteur .'</p><p>' .$uneNews->contenu .'</p></div>';
}
?>