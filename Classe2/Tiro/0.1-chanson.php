<?php
# Procédural

// ── Version 1 : avec un tableau (ce que vous savez déjà faire)
$chanson = ['titre' => 'PHP Anthem', 'artiste' => 'The Coders'];

echo $chanson['titre'] . ' — ' . $chanson['artiste'] . '<br>';

# Orienté Objet

// ── Version 2 : avec un objet (la nouveauté)
// utilisez le PascalCase
class Chanson{

    // propriétés => variables de la classe
    // elles sont publiques avec une valeur par défaut
    public string $titre = ''; // propriété publique de type string
    public string $artiste = ''; // idem
    // 0.2 création d'une autre propriété publique
    public int $duree = 0; // type int avec 0 comme valeur par défaut 

}

// Instanciation d'un objet de type Chanson avec un lien nommé $chanson2
$chanson2 = new Chanson();

// comme les propriétés sont publiques, on peut les modifier
// depuis n'importe où, donc même en dehors de la classe
// c'est donc une pratique non recommandée
$chanson2->titre = "Thriller";
$chanson2->artiste = "Michael Jackson";
// 0.2 modification
$chanson2->duree = 202;

// on peut afficher les propriétés publiques uniquement en les 
// nommant en utilisant la concaténation de base
echo $chanson2->titre . ' — ' . $chanson2->artiste . '<br>';

// 0.2 concaténation pour l'OO, fonctionne pour les propriétés 
echo "$chanson2->titre — $chanson2->artiste ($chanson2->duree secondes) <br>";

// 0.3 Instanciation d'une nouvelle chanson
$chanson3 = new Chanson();
// modification
$chanson3->titre = "Boucle infinie";
$chanson3->artiste = "John David";
$chanson3->duree = 240;

// 0.3 affichage
echo "$chanson3->titre — $chanson3->artiste ($chanson3->duree secondes) <br>";

// 0.4 Méthode qui n'existe pas

// $chanson3->afficher(); // crée une erreur fatale


var_dump($chanson,$chanson2,$chanson3);
