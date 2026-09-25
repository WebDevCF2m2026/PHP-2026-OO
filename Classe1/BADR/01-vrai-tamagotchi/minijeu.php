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

const COUT_ENERGIE = 10;
$choix = ['pierre' => '✊ Pierre', 'feuille' => '✋ Feuille', 'ciseaux' => '✌️ Ciseaux'];

$resultat = null;
$choixJoueur = null;
$choixOrdinateur = null;

if ($tamagotchi->estVivant() && isset($_POST['choix']) && array_key_exists($_POST['choix'], $choix)) {
    if ($tamagotchi->getEnergie() < COUT_ENERGIE) {
        $resultat = "⛔ Trop fatigué pour jouer (il faut au moins " . COUT_ENERGIE . " d'énergie).";
    } else {
        $choixJoueur = $_POST['choix'];
        $choixOrdinateur = array_rand($choix);
        $tamagotchi->modifierEnergie(-COUT_ENERGIE);

        if ($choixJoueur === $choixOrdinateur) {
            $tamagotchi->ajouterArgent(2);
            $resultat = '🤝 Égalité ! +2 pièces de consolation.';
        } elseif (
            ($choixJoueur === 'pierre' && $choixOrdinateur === 'ciseaux') ||
            ($choixJoueur === 'feuille' && $choixOrdinateur === 'pierre') ||
            ($choixJoueur === 'ciseaux' && $choixOrdinateur === 'feuille')
        ) {
            $tamagotchi->ajouterArgent(10);
            $tamagotchi->gagnerXp(15);
            $tamagotchi->modifierBonheur(10);
            $resultat = '🎉 Victoire ! +10 pièces et +15 XP.';
        } else {
            $resultat = '😅 Perdu ! Retente ta chance.';
        }
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
    <title>Mini-jeu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <div class="nav">
        <a href="index.php">🐾 Mon Tamagotchi</a>
        <a href="boutique.php">🛒 Boutique</a>
        <a href="minijeu.php" class="actif">🎮 Mini-jeu</a>
    </div>

    <div class="card">
        <p class="titre">Pierre - Feuille - Ciseaux</p>
        <h1 class="nom">contre <?= htmlspecialchars($tamagotchi->getNom()) ?></h1>
        <p class="sous-titre">Chaque partie coûte <?= COUT_ENERGIE ?> d'énergie (il lui en reste <?= $tamagotchi->getEnergie() ?>).</p>

        <?php if ($resultat !== null): ?>
        <p style="text-align:center; margin-bottom: 10px; font-size: 0.95em;">
            <?php if ($choixJoueur !== null): ?>
            Toi : <?= $choix[$choixJoueur] ?> — Lui : <?= $choix[$choixOrdinateur] ?><br>
            <?php endif; ?>
            <?= htmlspecialchars($resultat) ?>
        </p>
        <?php endif; ?>

        <?php if (!$tamagotchi->estVivant()): ?>
        <p style="text-align:center;">💀 Il n'est plus là pour jouer...</p>
        <?php else: ?>
        <div class="actions">
            <?php foreach ($choix as $id => $label): ?>
            <form method="post">
                <button type="submit" name="choix" value="<?= $id ?>" style="background: rgba(255,255,255,0.1)"><?= $label ?></button>
            </form>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
