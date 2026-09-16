<?php

// ── Version 1 : avec un tableau (ce que vous savez déjà faire)
$chanson = ['titre' => 'PHP Anthem', 'artiste' => 'The Coders'];

// echo "$chanson->titre - $chanson->artiste <br>" ;


// ── Version 2 : avec un objet (la nouveauté)
class Chanson
{
    // prpriétés => variables de la classe
    // elles sont publisques avec une valeur par défaut
    public string $titre = ''; // propriété publique de string
    public string $artiste = ''; // idem
    // 0.2 création d'une autre propriétés publique 
    public int $duree = 0; // 
}

// instanciation d'un objet de type Chanson avec un lien nommmé $chanson2
$chanson2 = new Chanson();
// comme les ^rp^riétés sontpubliques, on peut les modifier 
// n'importe où même en dehors de la classe
// c'est donc une pratique recommandé
$chanson2->titre = 'Thriller';
$chanson2->artiste = 'M.J.';

// 0.2 modification
$chanson2->duree = 202;

// on peut afficher les propriétes publiques uniquemeent en les nommants 
// nommant en utilisqant la concaténation de base
echo $chanson2->titre . ' — ' . $chanson2->artiste . PHP_EOL;

// concaténation pour l'OO, fonctionne pour les propriétés
echo "$chanson2->titre - $chanson2->artiste ($chanson2->duree secondes)<br>";

// 0.3 instanciation d'une nouvelle chanson
$chanson3 = new Chanson();

$chanson3->titre = 'Boucle infinie';
$chanson3->artiste = 'While Trio';
$chanson3->duree = 240;

echo "$chanson3->titre — $chanson3->artiste (chanson->duree secondes)<br>";

// pour faire des tests avec affichage
var_dump($chanson,$chanson2, $chanson3);


