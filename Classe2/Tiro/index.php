<?php

require_once "Chanson.php";
require_once "Playlist.php";

// affichage de la constante de classe 
echo "Constante de classe Chanson::GENRE: " . Chanson::GENRE."<br>";

// création de 
$morceau = new Chanson('Thriller', 'Michael Jackson', 202);


echo "{$morceau->getTitre()} - {$morceau->getArtiste()} - {$morceau->getDuree()} seconde <br>";

// Enoncé

?>
<p>On réutilise la classe Chanson des exercices précédents (une chanson a un titre, un artiste et une duree en secondes).</p>

<h2>1. Créez une classe Playlist avec :</h2>
<ul>
    <li>une propriété public array $chansons = []; ;</li>
    <li>une méthode ajouter(Chanson $chanson): void qui ajoute une chanson au tableau ;</li>
    <li>une méthode afficher(): void qui parcourt le tableau avec un foreach et affiche chaque chanson (titre — artiste (mm:ss)) ;</li>
    <li>une méthode dureeTotale(): int qui additionne les duree de toutes les chansons et renvoie le total en secondes ;</li>
    <li>une méthode formaterDuree(int $secondes): string qui transforme un nombre de secondes en "mm:ss". Indice : intdiv($secondes, 60) donne les minutes, $secondes % 60 les secondes ; complétez à deux chiffres avec str_pad((string) $s, 2, '0', STR_PAD_LEFT) ou sprintf('%02d', $s).</li>
</ul>


<?php
// test de l'exercice

echo "<h2>2. Programme de test :</h2>";

$playlist = new Playlist();
$playlist->ajouter(new Chanson('Bohemian Rhapsody', 'Queen', 355));
$playlist->ajouter(new Chanson('Get Lucky', 'Daft Punk', 248));
$playlist->ajouter(new Chanson('Redbone', 'Childish Gambino', 327));

var_dump($playlist);

$playlist->afficher();
echo 'Durée totale : ' . $playlist->formaterDuree($playlist->dureeTotale()) . PHP_EOL;