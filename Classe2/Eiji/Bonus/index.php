<?php
// Appel des classes utilisées
require_once "Chanson.php";
require_once "Playlist.php";

/* impossible car private ou protected
$chanson1 = new Chanson();
$chanson1->titre = "qq chose";

echo $chanson1->titre;

var_dump($chanson1);
*/

// affichage d'une constante de classe
echo "Constant de classe Chanson::GENRE : ". Chanson::GENRE."<br>";

// création d'une instance de Chanson
$morceau = new Chanson('Thriller','Michael Jackson',202);

// ne fonctionne pas car private ou protected
// echo $morceau->titre;

// utilisation des getters, on utilise la concaténation OO "{$obj->methode()}"

echo "{$morceau->getTitre()} — {$morceau->getArtiste()} ({$morceau->getDuree()} secondes) <br>";

/*
// plus possible car le constucteur veut 3 arguments
$chanson1 = new Chanson();
*/

// Enoncé

?>
<p>On utilise la classe Chanson qu'on va faire ensemble dans 'Chanson.php'</p>
<h2>1. Créez une classe Playlist avec :</h2>
<ul>
<li>une propriété public array $chansons = [];</li>
<li>une méthode ajouter(Chanson $chanson): void qui ajoute une chanson au tableau ;</li>
<li>une méthode afficher(): void qui parcourt le tableau avec un foreach et affiche chaque chanson (titre — artiste (mm:ss)) ;</li>
<li>une méthode dureeTotale(): int qui additionne les duree de toutes les chansons et renvoie le total en secondes ;</li>
<li>une méthode formaterDuree(int $secondes): string qui transforme un nombre de secondes en "mm:ss".<br> <i>Indice : intdiv($secondes, 60) donne les minutes, $secondes % 60 les secondes ; complétez à deux chiffres avec str_pad((string) $s, 2, '0', STR_PAD_LEFT) ou sprintf('%02d', $s).</i></li>
</ul>
<?php

// test de l'exercice

echo "<h2>2. Programme de test :<h2>";

$playlist = new Playlist();
$playlist->ajouter(new Chanson('Bohemian Rhapsody', 'Queen', 355));
$playlist->ajouter(new Chanson('Get Lucky', 'Daft Punk', 248));
$playlist->ajouter(new Chanson('Redbone', 'Childish Gambino', 327));

// on voit que ajouter() fonctionne
var_dump($playlist);

$playlist->afficher();
echo 'Durée totale : ' . $playlist->formaterDuree($playlist->dureeTotale()) . PHP_EOL;

?><h2>Résultat attendu :</h2>
<p>Bohemian Rhapsody — Queen (05:55)<br>
Get Lucky — Daft Punk (04:08)<br>
Redbone — Childish Gambino (05:27)<br>
Durée totale : 15:30
</p>