<?php

// ── Version 1 : avec un tableau (ce que vous savez déjà faire)
$chanson = [
    'titre' => 'PHP Anthem', 
    'artiste' => 'The Coders'
    ];

echo $chanson['titre'] . ' — ' . $chanson['artiste'] . '<br>';



// OO
// ── Version 2 : avec un objet (la nouveauté)
class Chanson
{
    // Propriétés publiques
    // Peuvent être lues et modifiées depuis
    // l'extérieur de la classe (instance de classe)
    public string $titre = '';
    public string $artiste = '';
    public int $duree = 0;
    
}

// Instanciation
$chanson2 = new Chanson();
// Modification des propriétés publiques 
$chanson2->titre = 'PHP Anthem';
$chanson2->artiste = 'The Coders';
$chanson2->duree = 210;

// Affichage de ses propriétés publiques 
echo $chanson2->titre . ' — ' . $chanson2->artiste . PHP_EOL;
echo ("</br>");
echo $chanson2->titre . ' — ' . $chanson2->artiste . ' ('.$chanson2->duree . ' secondes)' . PHP_EOL;



$chanson3 = new Chanson();
$chanson3->titre = 'Boucle infinie';
$chanson3->artiste ='While Trio';
$chanson3->duree ='240';

echo ("</br>");
echo $chanson3->titre . ' — ' . $chanson3->artiste . ' (' . $chanson3->duree . ' secondes)' . PHP_EOL;

// Procédural 0.4
// echo $chanson['titer'];       // tableau, avec une faute
// OO
// echo $chanson2->titer;       // objet, avec la même faute
// Erreur fatal
// $chanson2->afficher();       // cette méthode n'existe pas