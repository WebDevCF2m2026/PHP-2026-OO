<?php
require_once 'MonChaton.php';

// Création de deux instances de MonChaton (arguments nommés)
$chaton1 = new MonChaton(
    nom: "michmich",
    couleur: "blanc",
    age: 5
);
$chaton2 = new MonChaton(
    nom: "Mimiche",
    couleur: "noir",
    age: 3
);
$mon_premier_chaton = $chaton1; // même objet, pas une copie
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Getters et setters</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<main>
    <a class="retour" href="../index.php">← Retour au site</a>
    <span class="badge">Exercice 1.5 → 1.7</span>
    <h1>🔒 Getters et setters</h1>
    <p class="sous-titre">Des propriétés privées, lues avec des getters et modifiées avec un setter qui vérifie.</p>

    <div class="carte">
        <h2>Présentation</h2>
        <div class="resultat">
            <?= $mon_premier_chaton->sePresenter() ?>
        </div>
    </div>

    <div class="carte">
        <h2>Accéder aux attributs privés via les getters</h2>
        <div class="resultat">
            <?php
            // modification de l'âge à 8 mois
            $mon_premier_chaton->setAge(i: 8);
            // impossible d'afficher age directement car c'est un attribut privé
            // donc on utilise le getter pour récupérer la valeur
            echo "getter de age : {$mon_premier_chaton->getAge()}<br>";
            echo "getter de couleur : {$mon_premier_chaton->getCouleur()}<br>";
            // le setter refuse un âge négatif
            $mon_premier_chaton->setAge(i: -2);
            ?>
        </div>
    </div>

    <div class="carte">
        <h2>var_dump de l'objet</h2>
        <div class="resultat">
            <pre><?php var_dump($chaton1); ?></pre>
        </div>
    </div>
</main>
</body>
</html>
