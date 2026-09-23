<?php


class Playlist
{
    public array $chansons = [];
    
}

$playlist = new Playlist();
$playlist->ajouter(new Chanson('Bohemian Rhapsody', 'Queen', 355));
$playlist->ajouter(new Chanson('Get Lucky', 'Daft Punk', 248));
$playlist->ajouter(new Chanson('Redbone', 'Childish Gambino', 327));

$playlist->afficher();
echo 'Durée totale : ' . $playlist->formaterDuree($playlist->dureeTotale()) . PHP_EOL;