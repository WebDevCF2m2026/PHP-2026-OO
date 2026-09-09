<?php
// appel des dépendances 

require_once "Chanson.php";
require_once "Playlist.php";

// test d'une chanson hors liste
//$chanson_hors_liste = new Chanson("Stairway To Heaven","Led Zeppelin",483);
// affichage de celle-ci () grace 
//echo "$chanson_hors_liste->titre — $chanson_hors_liste->artiste ($chanson_hors_liste->duree secondes)<hr>";


$playlist = new Playlist();
$playlist->ajouter(new Chanson('Bohemian Rhapsody', 'Queen', 355));
$playlist->ajouter(new Chanson('Get Lucky', 'Daft Punk', 248));
$playlist->ajouter(new Chanson('Redbone', 'Childish Gambino', 327));

$playlist->afficher();

echo "<hr> {$playlist->dureeTotale()}<hr>";
echo 'Durée totale : ' . $playlist->formaterDuree($playlist->dureeTotale()) . PHP_EOL;


// 1. Créez une classe Playlist avec :

// une propriété public array $chansons = []; ;
// une méthode qui ajoute une chanson au tableau ;ajouter(Chanson $chanson): void
// une méthode qui parcourt le tableau avec un et affiche chaque chanson (afficher(): voidforeachtitre — artiste (mm:ss)) ;
// une méthode qui additionne les de toutes les chansons et renvoie le total en secondes ;dureeTotale(): intduree
// une méthode qui transforme un nombre de secondes en . Indice : donne les minutes, les secondes ; complétez à deux chiffres avec ou .formaterDuree(int $secondes): string"mm:ss"intdiv($secondes, 60)$secondes % 60str_pad((string) $s, 2, '0', STR_PAD_LEFT)sprintf('%02d', $s)