<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Première classe : Chanson</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main>
    <a class="retour" href="index.php">← Retour au site</a>
    <span class="badge">Chapitre 1</span>
    <h1>Première classe : Chanson</h1>
    <p class="sous-titre">Un tableau associatif comparé à un objet avec des propriétés publiques.</p>

    <div class="carte">
        <h2>Résultat</h2>
        <div class="resultat">
<?php
// procédural

// ── Version 1 : avec un tableau (ce que vous savez déjà faire)
$chanson = ['titre' => 'PHP Anthem', 'artiste' => 'The Coders'];

echo $chanson['titre'] . ' — ' . $chanson['artiste'] . '<br>';

// OO

// ── Version 2 : avec un objet (la nouveauté)
class Chanson
{
    // propriété publiques
    // peuvent être lues et modifiées depuis l'extérieur
    // de la classe (instance de classe)
    public string $titre = '';
    public string $artiste = '';
    public int $duree = 0;
}

// instanciation
$chanson2 = new Chanson();
// modification des propriétés publiques
$chanson2->titre = 'PHP Anthem';
$chanson2->artiste = 'The Coders';
$chanson2->duree = 210;

$chanson3 = new Chanson();
// modification des propriétés publiques
$chanson3->titre = 'Boucle infinie';
$chanson3->artiste = 'While Trio';
$chanson3->duree = 240;
// affichage de ses propriétés publiques
echo $chanson2->titre . ' — ' . $chanson2->artiste . ' ('.$chanson2->duree.' secondes)'. '<br>';
echo $chanson3->titre . ' — ' . $chanson3->artiste . ' ('.$chanson3->duree.' secondes)'.'<br>';
?>
        </div>
    </div>
</main>
</body>
</html>
