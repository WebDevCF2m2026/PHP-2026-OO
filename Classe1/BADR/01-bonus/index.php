<?php
require_once 'Chanson.php';
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ma playlist</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<main>
    <a class="retour" href="../index.php">← Retour au site</a>
    <span class="badge">Chapitre 1 · Bonus</span>
    <h1>Ma playlist</h1>
    <p class="sous-titre">Une classe Playlist qui range des objets Chanson et calcule la durée totale.</p>

    <div class="carte">
        <h2>Titres</h2>
        <div class="resultat">
            <?php $playlist->afficher(); ?>
        </div>
        <p class="total">Durée totale : <?= $playlist->formaterDuree($playlist->dureeTotale()) ?></p>
    </div>
</main>
</body>
</html>
