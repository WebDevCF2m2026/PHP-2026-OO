<?php

// ── Version 1 : avec un tableau (ce que vous savez déjà faire)
$chanson = ['titre' => 'PHP Anthem', 'artiste' => 'The Coders'];

echo $chanson['titre'] . ' — ' . $chanson['artiste'] . PHP_EOL;


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
$chanson2->duree = 210;

echo $chanson2->titre . ' — ' . $chanson2->artiste . PHP_EOL . $chanson2->duree . ' ';

$chanson3 = new Chanson();
$chanson3->titre = 'Boucle infinie';
$chanson3->artiste = 'While Trio';
$chanson3->duree = 240;
echo $chanson3->titre . ' — ' . $chanson3->artiste . PHP_EOL . $chanson3->duree .' ';

echo $chanson['titre'];      // tableau, avec une faute
echo $chanson2->titre;       // objet, avec la même faute



