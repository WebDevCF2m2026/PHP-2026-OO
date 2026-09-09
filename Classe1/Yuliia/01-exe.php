<?php
// Procédural
// ── Version 1 : avec un tableau (ce que vous savez déjà faire)
$chanson = [
    'titre' => 'PHP Anthem',
    'artiste' => 'The Coders'
];

echo $chanson['titre'] . ' — ' . $chanson['artiste'] . '<br>';

//OO
// ── Version 2 : avec un objet (la nouveauté)
class Chanson
{
    // propriétés publiques
    // peuvent etre lues et modofiées depuis l'extérieur
    // de la classe (instance de classe)
    public string $titre = '';
    public string $artiste = '';
    public int $duree = 0;
}

//instanciation
$chanson2 = new Chanson();
//modification des propriétés publiques
$chanson2->titre = 'PHP Anthem';
$chanson2->artiste = 'The Coders';
$chanson2->duree = 210;

$chanson3 = new Chanson();
$chanson3->titre = 'Boucle infinie';
$chanson3->artiste = 'While Trio';
$chanson3->duree = 240;
// affichage de ses proprié
echo $chanson2->titre . ' — ' . $chanson2->artiste . ' (' .$chanson2->duree.' secondes ) <br>';

//afifichage via la concatenation pour l'OO

echo "$chanson2->titre -  $chanson2->artiste ($chanson2->duree secondes) <br>";
echo "$chanson3->titre -  $chanson3->artiste ($chanson3->duree secondes)";
  


