<?php

// On charge les classes depuis le dossier de ce fichier.
require_once __DIR__ . '/Chanson.php';
require_once __DIR__ . '/Playlist.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ma playlist</title>
</head>
<body>
    <h1>Ma playlist</h1>
    <pre><?php
$playlist = new Playlist();

$chanson1 = new Chanson('Bohemian Rhapsody', 'Queen', 355);
$chanson2 = new Chanson('Get Lucky', 'Daft Punk', 248);
$chanson3 = new Chanson('Redbone', 'Childish Gambino', 327);

$playlist->ajouter($chanson1);
$playlist->ajouter($chanson2);
$playlist->ajouter($chanson3);

$playlist->afficher();
echo 'Durée totale : ' . $playlist->formaterDuree($playlist->dureeTotale()) . PHP_EOL;
?></pre>
</body>
</html>
