<?php 

require_once "tamagotchi.php";


$pixel = new Tamagotchi('Pixel');

// echo $pixel->etat() . PHP_EOL;

// $pixel->manger();
// echo $pixel->etat() . PHP_EOL;


echo $pixel . PHP_EOL;


for ($i = 0; $i < 10; $i++) {
    $pixel->jouer();
}

echo "<br>";

echo $pixel . PHP_EOL;