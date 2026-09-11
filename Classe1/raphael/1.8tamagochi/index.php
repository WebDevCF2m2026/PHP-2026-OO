<?php
require_once "Tama.php";
$pixel = new Tama('Pixel');
echo $pixel->etat() . "<br>";

$pixel->manger();
echo $pixel->etat() . "<br>";

$pixel->jouer();
echo $pixel->etat() . "<br>";
$pixel->manger();
echo $pixel->etat() . "<br>";
$pixel->manger();
echo $pixel->etat() . "<br>";
$pixel->manger();
echo $pixel->etat() . "<br>";
$pixel->manger();
echo $pixel->etat() . "<br>";
$pixel->manger();
echo $pixel->etat() . "<br>";