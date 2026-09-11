<?php
require_once 'chanson.php';
require_once 'Playlist.php';

$playlist = new Playlist();
$playlist->ajouter(new Chanson('Bohemian Rhapsody', 'Queen', 355));
$playlist->ajouter(new Chanson('Get Lucky', 'Daft Punk', 248));
$playlist->ajouter(new Chanson('Redbone', 'Childish Gambino', 327));
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Playlist</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <main>
        <h1> Ma playlist</h1>
        <p class="subtitle">Exercice bonus — chapitre 0, POO en PHP</p>

        <div class="card">
            <h2>Titres</h2>
            <?php $playlist->afficher(); ?>
            <p class="total">Durée totale : <?= $playlist->formaterDuree($playlist->dureeTotale()) ?></p>
        </div>
    </main>
</body>
</html>
