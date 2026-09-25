<?php
require_once 'ChaTon.php';

// Création de deux chatons
$chaton1 = new ChaTon('Michmich', 'blanc', 5);
$chaton2 = new ChaTon('Mimiche', 'noir', 3);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ma première classe</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<main>
    <a class="retour" href="../index.php">← Retour au site</a>
    <span class="badge">Exercice 1.1 → 1.4</span>
    <h1>🐱 Ma première classe</h1>
    <p class="sous-titre">Propriétés, méthode, $this et constructeur.</p>

    <div class="carte">
        <h2>Résultat</h2>
        <div class="resultat">
            <?php
            $chaton1->miauler();
            $chaton2->miauler();
            ?>
        </div>
    </div>
</main>
</body>
</html>
