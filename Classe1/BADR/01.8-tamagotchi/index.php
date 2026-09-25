<?php
require_once 'Tamagotchi.php';

// Création du Tamagotchi
$pixel = new Tamagotchi('Pixel');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mini-Tamagotchi</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<main>
    <a class="retour" href="../index.php">← Retour au site</a>
    <span class="badge">Exercice 1.8</span>
    <h1>🐣 Le mini-Tamagotchi</h1>
    <p class="sous-titre">Une faim privée qui ne change qu'à travers manger() et jouer().</p>

    <div class="carte">
        <h2>Résultat</h2>
        <div class="resultat">
            <?php
            echo $pixel->etat() . '<br>';

            $pixel->manger();
            echo $pixel->etat() . '<br>';

            $pixel->jouer();
            echo $pixel->etat() . '<br>';
            ?>
        </div>
    </div>
</main>
</body>
</html>
