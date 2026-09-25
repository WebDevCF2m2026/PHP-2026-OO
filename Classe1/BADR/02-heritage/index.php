<?php
// autoload : charge automatiquement NomDeClasse.php quand on en a besoin
spl_autoload_register(function (string $classe) {
    $fichier = __DIR__ . '/' . $classe . '.php';
    if (file_exists($fichier)) {
        require_once $fichier;
    }
});

$rex = new Chien('Rex');
$felix = new Chat('Félix');

$animaux = [
    $rex,
    $felix,
    new Chien('Médor'),
    new Poisson('Nemo'),
    new Perroquet('Coco', "À l'abordage !"),
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>L'héritage</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<main>
    <a class="retour" href="../index.php">← Retour au site</a>
    <span class="badge">Exercices 2.2 → 2.8</span>
    <h1>👨‍👦 L'héritage</h1>
    <p class="sous-titre">extends, redéfinition, parent::, classe abstraite et polymorphisme.</p>

    <div class="carte">
        <h2>2.2 / 2.3 : Chien et Chat héritent d'Animal</h2>
        <div class="resultat">
            <?php
            echo $rex->manger() . '<br>';   // méthode héritée d'Animal
            echo $rex->crier() . '<br>';    // méthode propre à Chien
            echo $felix->crier();
            ?>
        </div>
    </div>

    <div class="carte">
        <h2>2.5 / 2.6 : le Chat redéfinit manger() avec parent::</h2>
        <div class="resultat">
            <?= $felix->manger() ?>
        </div>
    </div>

    <div class="carte">
        <h2>2.4 / 2.8 : une seule boucle, chacun crie à sa façon</h2>
        <div class="resultat">
            <?php
            foreach ($animaux as $animal) {
                echo $animal->crier() . '<br>';
            }
            ?>
        </div>
        <p class="note">Aucun if : c'est le polymorphisme.</p>
    </div>

    <div class="carte">
        <h2>2.7 : on ne peut pas créer un Animal tout court</h2>
        <div class="resultat">
            <?php
            try {
                $truc = new Animal('Truc');
            } catch (Error $e) {
                echo '⛔ ' . $e->getMessage();
            }
            ?>
        </div>
    </div>
</main>
</body>
</html>
