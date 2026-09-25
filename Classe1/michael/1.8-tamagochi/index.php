<?php
require 'Tamagotchi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 1.8 — Le mini-Tamagotchi</title>
</head>
<body>
    <h1>Exercice 1.8 — Le mini-Tamagotchi</h1>
    <p>$pixel = new Tamagotchi(); echo $pixel->etat()</p>
    <p><?php $pixel = new Tamagotchi("Pixel"); echo $pixel->etat()?></p>
    <p>$pixel->manger(); // -20 de faim</p>
    <p><?php $pixel->manger(); echo $pixel->etat()?></p>
    <p>$pixel->jouer(); // +15 de faim</p>
    <p><?php $pixel->jouer(); echo $pixel->etat()?></p>
    <h2>Bonus 1, entre 0 et 100</h2>
    <p>for($i=0;$i<10;$i++){ $pixel->jouer(); echo $pixel->etat(); }</p>
    <p><?php for($i=0;$i<10;$i++){ $pixel->jouer(); echo $pixel->etat()."<br>"; }?></p>
    <p>for($i=0;$i<10;$i++){ $pixel->manger(); echo $pixel->etat(); }</p>
    <p><?php for($i=0;$i<10;$i++){ $pixel->manger(); echo $pixel->etat()."<br>"; }?></p>
    <h2>Bonus 2, le __toString()</h2>
    <p>En cas d'affichage de l'instance</p>
    <p>echo $pixel</p>
    <p><?= $pixel ?></p>

    <?php var_dump($pixel) ?>
</body>
</html>