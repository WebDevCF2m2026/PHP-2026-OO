<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Tamagotchi</title>
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
     
    </style>
</head>
<body>
<div class="card">
    <div class="emoji"></div>
<?php
require_once 'Tamagotchi.php';

// Création du Tamagotchi
$pixel = new Tamagotchi('Pixel');

echo "<p>{$pixel->etat()}</p>";

$pixel->manger();
echo "<p>{$pixel->etat()}</p>";

$pixel->jouer();
echo "<p>{$pixel->etat()}</p>";
?>
</div>
</body>
</html>
