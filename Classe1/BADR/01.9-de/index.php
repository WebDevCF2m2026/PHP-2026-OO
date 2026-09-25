<?php
require_once 'De.php';

$d6 = De::classique();
$d20 = De::deDonjon();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Le dé parlant</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<main>
    <a class="retour" href="../index.php">← Retour au site</a>
    <span class="badge">Exercice 1.9 · Bonus 3</span>
    <h1>🎲 Le dé parlant</h1>
    <p class="sous-titre">Fabriques statiques, readonly, random_int() et __toString().</p>

    <div class="carte">
        <h2>Lancers</h2>
        <div class="resultat">
            <?php
            echo $d6 . '<br>';   // pas encore lancé
            $d6->lancer();
            echo $d6 . '<br>';   // affiche le résultat

            echo 'Initiative : ' . $d20->lancer() . '<br>';
            echo 'Jet avec avantage (d20) : ' . $d20->lancerAvantage();
            ?>
        </div>
    </div>

    <div class="carte">
        <h2>Best of 5 : d6 contre d20</h2>
        <div class="resultat">
            <?php
            $victoiresD6 = 0;
            $victoiresD20 = 0;

            for ($manche = 1; $manche <= 5; $manche++) {
                $a = $d6->lancer();
                $b = $d20->lancer();

                if ($a > $b) {
                    $victoiresD6++;
                    $gagnant = 'd6';
                } elseif ($b > $a) {
                    $victoiresD20++;
                    $gagnant = 'd20';
                } else {
                    $gagnant = 'égalité';
                }
                echo "Manche $manche : d6 = $a, d20 = $b → $gagnant<br>";
            }
            ?>
        </div>
        <p class="total">Score final : d6 <?= $victoiresD6 ?> — <?= $victoiresD20 ?> d20</p>
        <p class="note">Recharge la page pour relancer les dés.</p>
    </div>
</main>
</body>
</html>
