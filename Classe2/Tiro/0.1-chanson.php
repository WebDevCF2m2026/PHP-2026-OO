<?php
# Procédural 

// - Version 1 : avec un tableau (ce que vous savez déjà faire)
$chanson = ['titre' => 'PHP Anthem', 'artiste' => 'The Coders'];

echo $chanson['titre'] . ' - ' . $chanson['artiste'] . PHP_EOL;


# Orienté Objet


// - Version 2 :  avec un objet (la nouveauté)
class Chanson{
    // propriétés => variable de la classe 
    // elles sont publiques avec une valeur par défaut
    public string $titre = ''; // propriété publique de type string
    public string $artiste = ''; // idem

    // 0.2 créaition d'une autre propriété publique 
    public int $duree = 0;
}

// Instanciation 
$chanson2 = new Chanson();



// comme les propriétés sont publique on peut les modifier 
// depuis n'importe où, donc même en dehors de la classe

$chanson2->titre = "Thriller";
$chanson2->artiste = "Michael Jackson";
// 0.2
$chanson2->duree = 202;



// concaténation pour l'OO, fonctionne pour les propriétés
echo "$chanson2->titre - $chanson2->artiste ($chanson2->duree) <br>";

// 0.3
$chanson3 =  new Chanson();

$chanson3->titre = "Boucle infinie";
$chanson3->artiste = "John David";
$chanson3->duree = 240;

echo "$chanson3->titre - $chanson3->artiste ($chanson3->duree) <br>";

var_dump($chanson, $chanson2);