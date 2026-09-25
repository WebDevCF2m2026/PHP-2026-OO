<?php
// Exercice 2.1 : deux classes qui répètent le même code

class Chien
{
    public function __construct(public string $nom) {}

    public function manger(): string
    {
        return $this->nom . ' mange.';
    }

    public function crier(): string
    {
        return $this->nom . ' fait : Wouf !';
    }
}

class Chat
{
    public function __construct(public string $nom) {}

    public function manger(): string
    {
        return $this->nom . ' mange.';
    }

    public function crier(): string
    {
        return $this->nom . ' fait : Miaou !';
    }
}

/*
Réponses :
1. C'est manger() (et le constructeur) qui est écrit exactement pareil.
2. Il faudrait corriger manger() 2 fois, une fois dans chaque classe.
3. Avec 10 animaux, 10 fois : on risque d'en oublier un.
   => l'héritage permet de l'écrire une seule fois dans une classe parente.
*/
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Le code en double</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<main>
    <a class="retour" href="../index.php">← Retour au site</a>
    <span class="badge">Exercice 2.1</span>
    <h1>🐾 Le code en double</h1>
    <p class="sous-titre">Deux classes presque identiques : le problème que l'héritage va régler.</p>

    <div class="carte">
        <h2>Résultat</h2>
        <div class="resultat">
            <?php
            echo (new Chien('Rex'))->manger() . '<br>';
            echo (new Chat('Félix'))->crier();
            ?>
        </div>
    </div>

    <div class="carte">
        <h2>Mes réponses</h2>
        <p>1. La méthode <b>manger()</b> (et le constructeur) est écrite exactement pareil dans les deux classes.</p>
        <p>2. Pour la corriger, il faudrait le faire <b>2 fois</b>.</p>
        <p>3. Avec 10 animaux, <b>10 fois</b>, avec le risque d'en oublier un. L'héritage permet de ne l'écrire qu'une seule fois.</p>
    </div>
</main>
</body>
</html>
