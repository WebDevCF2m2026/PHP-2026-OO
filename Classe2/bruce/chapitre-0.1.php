<?php

// ── Version 1 : avec un tableau (ce que vous savez déjà faire)
$chanson = ['titre' => 'PHP Anthem', 'artiste' => 'The Coders'];

echo $chanson['titre'] . ' — ' . $chanson['artiste'] . '<br>' . PHP_EOL;


// ── Version 2 : avec un objet (la nouveauté)
class Chanson
{
    public string $titre = '';
    public string $artiste = '';
    public int $duree = 0;
}

$chanson2 = new Chanson();
$chanson2->titre = 'PHP Anthem';
$chanson2->artiste = 'The Coders';
$chanson2->duree = 202;

// echo $chanson2->titre . ' - ' . $chanson2->artiste . ' (' . $chanson2->duree . ' secondes)'  . '<br>' . PHP_EOL;

// concatenation pour l OO fonctionne pour les proprietes 
echo "$chanson2->titre - $chanson2->artiste ($chanson2->duree secondes)" . '<br>' . PHP_EOL;

// 1.  les deux affichent PHP Anthem — The Coders
// 2. Pour un tableau, on utilise les crochets : ['titre'].
//    Pour un objet, on utilise la flèche : ->titre.



//0.3
$chanson3 = new Chanson();
$chanson3->titre = 'boucle infinie';
$chanson3->artiste = 'while trio';
$chanson3->duree = 240;

echo "$chanson3->titre - $chanson3->artiste ($chanson3->duree secondes)" . '<br>';


// 0.4
 // tableau, avec la même faute sa affiche undifined array key
 // objet, avec la même faute sa affiche undifined property
 // cette méthode n'existe pas   Call to undefined method Chanson



