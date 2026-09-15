<?php

// appel des class utilisées

require_once "Chanson.php";
require_once "Playlist.php";
/* impossible car pricvate ou protected
$chanson = new Chanson();
$chanson -> titre = "quelque chose"
var_dump($chanson)
*/

?>
<p>
    On réutilise la classe Chanson des exercices précédents (une chanson a un titre, un artiste et une duree en secondes).

    1. Créez une classe Playlist avec :

    une propriété public array $chansons = []; ;
    une méthode ajouter(Chanson $chanson): void qui ajoute une chanson au tableau ;
    une méthode afficher(): void qui parcourt le tableau avec un foreach et affiche chaque chanson (titre — artiste (mm:ss)) ;
    une méthode dureeTotale(): int qui additionne les duree de toutes les chansons et renvoie le total en secondes ;
    une méthode formaterDuree(int $secondes): string qui transforme un nombre de secondes en "mm:ss". Indice : intdiv($secondes, 60) 
    donne les minutes, $secondes % 60 les secondes ; complétez à deux chiffres avec str_pad((string) $s, 2, '0', STR_PAD_LEFT) ou 
    sprintf('%02d', $s).
</p>




<?php
$playlist = new Playlist();
$playlist->ajouter(new Chanson('Bohemian Rhapsody', 'Queen', 355));
$playlist->ajouter(new Chanson('Get Lucky', 'Daft Punk', 248));
$playlist->ajouter(new Chanson('Redbone', 'Childish Gambino', 327));

$playlist->afficher();
echo 'Durée totale : ' . $playlist->formaterDuree($playlist->dureeTotale()) . PHP_EOL;
