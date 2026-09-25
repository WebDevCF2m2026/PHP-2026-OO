<?php
require_once 'Tamagotchi.php';
require_once 'Personnage.php';
require_once 'Personnalite.php';
require_once 'Objet.php';
require_once 'Succes.php';
require_once 'Quete.php';
require_once 'Sauvegarde.php';

if (!isset($_COOKIE['tamagotchi_id'])) {
    header('Location: index.php');
    exit;
}

$idJoueur = $_COOKIE['tamagotchi_id'];
$tamagotchi = Sauvegarde::charger($idJoueur);

if ($tamagotchi === null) {
    header('Location: index.php');
    exit;
}

$tamagotchi->appliquerDecroissance();

$message = null;
if ($tamagotchi->estVivant() && isset($_POST['acheter'])) {
    $idObjet = (string) $_POST['acheter'];
    $article = Objet::trouver($idObjet);

    if ($article === null) {
        $message = "Cet objet n'existe pas.";
    } elseif ($tamagotchi->acheterObjet($idObjet)) {
        $message = "✅ Tu as acheté : {$article['nom']} !";
    } else {
        $message = "⛔ Pas assez de pièces pour {$article['nom']} (il faut {$article['prix']} 💰).";
    }
}

Quete::verifierEtReclamer($tamagotchi);
Sauvegarde::sauvegarder($idJoueur, $tamagotchi);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Boutique</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <div class="nav">
        <a href="index.php">🐾 Mon Tamagotchi</a>
        <a href="boutique.php" class="actif">🛒 Boutique</a>
        <a href="minijeu.php">🎮 Mini-jeu</a>
    </div>

    <div class="card">
        <p class="titre">Boutique</p>
        <h1 class="nom">💰 <?= $tamagotchi->getArgent() ?> pièces</h1>

        <?php if ($message !== null): ?>
        <p style="text-align:center; margin-bottom: 16px; font-size: 0.9em;"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>

        <div class="grille">
            <?php foreach (Objet::catalogue() as $id => $article): ?>
            <form method="post">
                <button class="item" type="submit" name="acheter" value="<?= htmlspecialchars($id) ?>" <?= $tamagotchi->estVivant() ? '' : 'disabled' ?>>
                    <span class="emoji-mini"><?= $article['emoji'] ?></span>
                    <strong><?= htmlspecialchars($article['nom']) ?></strong><br>
                    <span style="font-size:0.72em; color:#b8b3d9;"><?= htmlspecialchars($article['description']) ?></span><br>
                    <span style="font-size:0.82em; font-weight:700;">💰 <?= $article['prix'] ?></span>
                </button>
            </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</body>
</html>
