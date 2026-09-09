<?php

// appel des dépendances
require_once "Chanson.php";
require_once "Playlist.php";


$playlist = new Playlist();
$playlist->ajouter(new Chanson('Bohemian Rhapsody', 'Queen', 355));
$playlist->ajouter(new Chanson('Get Lucky', 'Daft Punk', 248));
$playlist->ajouter(new Chanson('Redbone', 'Childish Gambino', 327));

$playlist->afficher();
echo "<hr>{$playlist->dureeTotale()}<hr>";
echo 'Durée totale : ' . $playlist->formaterDuree($playlist->dureeTotale()) . PHP_EOL;