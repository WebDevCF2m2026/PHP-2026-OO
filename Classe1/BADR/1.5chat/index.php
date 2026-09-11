<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Chaton</title>
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #1f1c2c, #928dab);
            color: #f4f4f4;
        }
        .card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 16px;
            padding: 40px 50px;
            max-width: 600px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4);
        }
        .card h3 {
            margin-top: 25px;
            color: #ffd369;
        }
        .card pre {
            background: rgba(0, 0, 0, 0.35);
            padding: 15px;
            border-radius: 10px;
            overflow-x: auto;
            text-align: left;
            font-size: 0.85em;
        }
        .emoji {
            font-size: 2em;
        }
    </style>
</head>
<body>
<div class="card">
    <div class="emoji"></div>
<?php
require_once 'MonChaton.php';

// Création de deux instances de MonChaton
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
$copie = $mon_premier_chaton = $chaton1; // Copie de l'objet $chaton1 dans $mon_premier_chaton
// Affichage du message de chaque chaton
echo $mon_premier_chaton->sePresenter();

//modification de lage a 8ans
$mon_premier_chaton->setAge(i:8);

echo "<br>";//impossible dafficher age directement car cest un attribut privé donc on utilise le getter pour recuperer la valeur de l'attribut age
echo "<h3>Accéder aux attributs privés via les getters :</h3><br>";
echo "getter de age : {$mon_premier_chaton->getAge()}<br>";

echo "getter de couleur : {$mon_premier_chaton->getCouleur()}<br>";

echo "<pre>";
var_dump($chaton1);
echo "</pre>";
?>
</div>
</body>
</html>