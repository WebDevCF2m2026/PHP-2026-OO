<?php
require_once 'Tamagotchi.php';
require_once 'Personnage.php';
require_once 'Personnalite.php';
require_once 'Objet.php';
require_once 'Evenement.php';
require_once 'Succes.php';
require_once 'Quete.php';
require_once 'Sauvegarde.php';

// Identifiant du joueur : un cookie longue durée pour retrouver sa sauvegarde
if (isset($_COOKIE['tamagotchi_id'])) {
    $idJoueur = $_COOKIE['tamagotchi_id'];
} else {
    $idJoueur = bin2hex(random_bytes(8));
    setcookie('tamagotchi_id', $idJoueur, time() + 60 * 60 * 24 * 365, '/');
}

// Nouvelle partie : choix de l'espèce + du prénom
if (isset($_POST['choisir'])) {
    $espece = Personnage::trouver($_POST['choisir']);

    if ($espece !== null) {
        $nom = trim($_POST['nom'] ?? '');
        $nom = $nom !== '' ? substr($nom, 0, 20) : $espece->nomEspece;

        Sauvegarde::sauvegarder($idJoueur, new Tamagotchi($espece->id, $nom));
    }
}

// Recommencer : supprime la sauvegarde et revient à la sélection
if (isset($_POST['reset'])) {
    Sauvegarde::supprimer($idJoueur);
}

$tamagotchi = Sauvegarde::charger($idJoueur);

// --- Écran 1 : aucune sauvegarde -> écran de création ---
if ($tamagotchi === null) {
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crée ton Tamagotchi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <div class="card">
        <div class="entete-select">
            <h1>Crée ton Tamagotchi</h1>
            <p>Choisis un prénom, puis une espèce. Sa personnalité sera tirée au sort !</p>
        </div>

        <form method="post" id="form-creation">
            <input type="text" name="nom" placeholder="Prénom de ton Tamagotchi (facultatif)" maxlength="20">
            <div class="grille">
                <?php foreach (Personnage::tous() as $p): ?>
                <button class="perso" type="submit" name="choisir" value="<?= htmlspecialchars($p->id) ?>">
                    <span class="emoji"><?= $p->emoji ?></span>
                    <strong><?= htmlspecialchars($p->nomEspece) ?></strong><br>
                    <span class="raccourcis" style="margin:4px 0 0">cri : touche "<?= strtoupper($p->touche) ?>"</span>
                </button>
                <?php endforeach; ?>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<?php
    exit;
}

// --- Écran 2 : partie en cours ---
$personnage = Personnage::trouver($tamagotchi->getPersonnageId());
$personnalite = Personnalite::trouver($tamagotchi->getPersonnaliteId());

$tamagotchi->appliquerDecroissance();

$action = null;
$messageAction = null;

if ($tamagotchi->estVivant()) {
    if (isset($_POST['manger'])) {
        $tamagotchi->manger();
        $action = 'manger';
    } elseif (isset($_POST['jouer'])) {
        $tamagotchi->jouer();
        $action = 'jouer';
    } elseif (isset($_POST['dormir'])) {
        $tamagotchi->dormir();
        $action = 'dormir';
    } elseif (isset($_POST['soigner'])) {
        $messageAction = $tamagotchi->soigner()
            ? '💊 Il est guéri !'
            : '⛔ Pas assez d\'argent (15 pièces) ni de médicament pour le soigner.';
    } elseif (isset($_POST['utiliser'])) {
        $idObjet = (string) $_POST['utiliser'];
        $nomObjet = Objet::trouver($idObjet)['nom'] ?? $idObjet;
        $messageAction = $tamagotchi->utiliserObjet($idObjet)
            ? "🎒 Objet utilisé : {$nomObjet}."
            : "⛔ Impossible d'utiliser cet objet maintenant.";
    }
}

// Un événement aléatoire ne se déclenche que sur un simple rechargement (pas après une action)
$messageEvenement = null;
if ($action === null && $messageAction === null) {
    $messageEvenement = Evenement::declencher($tamagotchi);
}

$nouveauxSucces = Succes::verifier($tamagotchi);
$quetesReclamees = Quete::verifierEtReclamer($tamagotchi);

Sauvegarde::sauvegarder($idJoueur, $tamagotchi);

$faim = $tamagotchi->getFaim();
$vivant = $tamagotchi->estVivant();
$malade = $tamagotchi->estMalade();
$stade = $tamagotchi->getStade();

if (!$vivant) {
    $humeur = 'Mort'; $couleur = '#ff5c5c';
} elseif ($malade) {
    $humeur = 'Malade'; $couleur = '#c084fc';
} elseif ($faim >= 80) {
    $humeur = 'Affamé'; $couleur = '#ff5c5c';
} elseif ($faim >= 50) {
    $humeur = 'Un peu faim'; $couleur = '#ffb454';
} elseif ($faim >= 20) {
    $humeur = 'Tranquille'; $couleur = '#6bcf63';
} else {
    $humeur = 'Repu'; $couleur = '#4ea1ff';
}

// La bulle de dialogue : priorité à la mort, puis à la faim critique, puis à l'action, puis à l'événement
$reaction = null;
$humeurAction = null;

if (!$vivant && $action !== null) {
    $reaction = $personnage->reactionMort;
    $humeurAction = 'inquiet';
} elseif ($vivant && $faim >= 80 && $action !== null) {
    $reaction = $personnage->reactionCritique;
    $humeurAction = 'inquiet';
} elseif ($action === 'manger') {
    $reaction = $personnage->reactionManger; $humeurAction = 'content';
} elseif ($action === 'jouer') {
    $reaction = $personnage->reactionJouer; $humeurAction = 'content';
} elseif ($action === 'dormir') {
    $reaction = 'Zzzzz... ça fait du bien !'; $humeurAction = 'content';
} elseif ($messageAction !== null) {
    $reaction = $messageAction;
} elseif (!empty($nouveauxSucces)) {
    $reaction = '🏆 Succès débloqué : ' . $nouveauxSucces[0]['nom'] . ' !';
    $humeurAction = 'content';
} elseif (!empty($quetesReclamees)) {
    $reaction = '📜 Quête accomplie : ' . $quetesReclamees[0]['nom'] . ' !';
    $humeurAction = 'content';
} elseif ($messageEvenement !== null) {
    $reaction = $messageEvenement;
}

$vitals = [
    ['label' => 'Faim',    'valeur' => $faim,                    'couleur' => '#ff8c42', 'inverse' => true],
    ['label' => 'Énergie', 'valeur' => $tamagotchi->getEnergie(), 'couleur' => '#4ea1ff', 'inverse' => false],
    ['label' => 'Bonheur', 'valeur' => $tamagotchi->getBonheur(), 'couleur' => '#ffd369', 'inverse' => false],
    ['label' => 'Santé',   'valeur' => $tamagotchi->getSante(),   'couleur' => '#6bcf63', 'inverse' => false],
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mon Tamagotchi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">

    <div class="nav">
        <a href="index.php" class="actif">🐾 Mon Tamagotchi</a>
        <a href="boutique.php">🛒 Boutique</a>
        <a href="minijeu.php">🎮 Mini-jeu</a>
    </div>

    <div class="card">
        <p class="titre">Tamagotchi · <?= htmlspecialchars($personnage->nomEspece) ?> · Jour <?= $tamagotchi->getAge() ?></p>
        <h1 class="nom"><?= $personnage->emojiPourStade($stade) ?> <?= htmlspecialchars($tamagotchi->getNom()) ?></h1>

        <div class="habitat">
            <div class="bulle<?= $reaction !== null ? ' visible' : '' ?>" id="bulle"><?= $reaction !== null ? htmlspecialchars($reaction) : '' ?></div>
            <div class="emoji<?= (!$vivant || $faim >= 80) ? ' danger' : '' ?><?= $humeurAction !== null ? ' ' . $humeurAction : '' ?>" id="emoji">
                <?= $vivant ? $personnage->emojiPourStade($stade) : '💀' ?>
            </div>
        </div>

        <div class="badges">
            <span class="badge" style="--c: <?= $couleur ?>"><?= $humeur ?></span>
            <span class="badge" style="--c: #9a95c9"><?= $personnalite['emoji'] ?> <?= $personnalite['nom'] ?></span>
            <span class="badge" style="--c: #ffd369">Niveau <?= $tamagotchi->getNiveau() ?></span>
            <span class="badge" style="--c: #ffd369">💰 <?= $tamagotchi->getArgent() ?></span>
        </div>

        <?php foreach ($vitals as $v): ?>
        <div class="stat">
            <div class="stat-label"><span><?= $v['label'] ?></span><span><?= $v['valeur'] ?>/100</span></div>
            <div class="jauge"><div style="width: <?= $v['valeur'] ?>%; background: <?= $v['couleur'] ?>"></div></div>
        </div>
        <?php endforeach; ?>

        <div class="stat">
            <div class="stat-label"><span>XP (niveau <?= $tamagotchi->getNiveau() ?>)</span><span><?= $tamagotchi->getXp() ?>/<?= $tamagotchi->getXpNecessaire() ?></span></div>
            <div class="jauge"><div style="width: <?= (int) round($tamagotchi->getXp() / $tamagotchi->getXpNecessaire() * 100) ?>%; background: #c084fc"></div></div>
        </div>

        <?php if (!$vivant): ?>
            <div class="mort-overlay">
                <p>💀 <?= htmlspecialchars($tamagotchi->getNom()) ?> n'a pas survécu, à l'âge de <?= $tamagotchi->getAge() ?> jour(s), niveau <?= $tamagotchi->getNiveau() ?>.</p>
                <form method="post">
                    <button class="reset" name="reset" type="submit">🔄 Recommencer une nouvelle partie</button>
                </form>
            </div>
        <?php else: ?>
            <p class="raccourcis">
                <kbd>N</kbd> nourrir · <kbd>J</kbd> jouer · <kbd>D</kbd> dormir · <kbd><?= strtoupper($personnage->touche) ?></kbd> <?= htmlspecialchars($personnage->cri) ?>
            </p>

            <div class="actions">
                <form method="post" id="form-manger">
                    <button class="manger" name="manger"><?= $personnage->labelManger ?></button>
                </form>
                <form method="post" id="form-jouer">
                    <button class="jouer" name="jouer"><?= $personnage->labelJouer ?></button>
                </form>
            </div>
            <div class="actions">
                <form method="post" id="form-dormir">
                    <button class="dormir" name="dormir">😴 Dormir</button>
                </form>
                <form method="post" id="form-soigner">
                    <button class="soigner" name="soigner" <?= $malade ? '' : 'disabled' ?>>💊 Soigner <?= $malade ? '' : '(pas malade)' ?></button>
                </form>
            </div>

            <?php if (!empty($tamagotchi->getInventaire())): ?>
            <p class="section-titre">🎒 Inventaire</p>
            <div class="actions">
                <?php foreach ($tamagotchi->getInventaire() as $id => $qte): $obj = Objet::trouver($id); if ($obj === null || $qte <= 0) continue; ?>
                <form method="post">
                    <input type="hidden" name="utiliser" value="<?= htmlspecialchars($id) ?>">
                    <button type="submit" style="background: rgba(255,255,255,0.1)"><?= $obj['emoji'] ?> <?= htmlspecialchars($obj['nom']) ?> ×<?= $qte ?></button>
                </form>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <form method="post" style="margin-top: 14px">
                <button class="reset" name="reset">🔄 Changer de Tamagotchi</button>
            </form>
        <?php endif; ?>
    </div>

    <div class="card">
        <p class="section-titre">📜 Quêtes</p>
        <div class="liste-quetes">
            <?php foreach (Quete::definitions() as $id => $q):
                $progres = min($q['cible'], ($q['progres'])($tamagotchi));
                $termine = $tamagotchi->aReclameQuete($id);
            ?>
            <div class="quete<?= $termine ? ' terminee' : '' ?>">
                <div class="quete-nom"><?= htmlspecialchars($q['nom']) ?></div>
                <div class="quete-desc"><?= htmlspecialchars($q['description']) ?> · récompense : 💰<?= $q['argent'] ?> ✨<?= $q['xp'] ?>XP</div>
                <div class="jauge"><div style="width: <?= (int) round($progres / $q['cible'] * 100) ?>%; background: #4ea1ff"></div></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="card">
        <p class="section-titre">🏆 Succès</p>
        <div class="grille">
            <?php foreach (Succes::definitions() as $id => $s): $debloque = $tamagotchi->aSucces($id); ?>
            <div class="item<?= $debloque ? '' : ' verrouille' ?>">
                <span class="emoji-mini"><?= $debloque ? $s['emoji'] : '🔒' ?></span>
                <?= htmlspecialchars($s['nom']) ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="card">
        <details>
            <summary class="section-titre">🕓 Historique</summary>
            <ul class="historique">
                <?php foreach ($tamagotchi->getHistorique() as $evt): ?>
                <li><time><?= date('H:i', $evt['temps']) ?></time><?= htmlspecialchars($evt['message']) ?></li>
                <?php endforeach; ?>
                <?php if (empty($tamagotchi->getHistorique())): ?>
                <li>Rien à signaler pour l'instant.</li>
                <?php endif; ?>
            </ul>
        </details>
    </div>
</div>

<?php if ($vivant): ?>
<script>
    const cri = <?= json_encode($personnage->cri) ?>;
    const toucheCri = <?= json_encode(strtolower($personnage->touche)) ?>;
    const bulle = document.getElementById('bulle');
    let timer = null;

    function afficherBulle(texte, duree = 1200) {
        bulle.textContent = texte;
        bulle.classList.add('visible');
        clearTimeout(timer);
        timer = setTimeout(() => bulle.classList.remove('visible'), duree);
    }

    <?php if ($reaction !== null): ?>
    timer = setTimeout(() => bulle.classList.remove('visible'), 2200);
    <?php endif; ?>

    document.addEventListener('keydown', (evenement) => {
        const touche = evenement.key.toLowerCase();

        if (touche === 'n') {
            document.getElementById('form-manger').requestSubmit();
        } else if (touche === 'j') {
            document.getElementById('form-jouer').requestSubmit();
        } else if (touche === 'd') {
            document.getElementById('form-dormir').requestSubmit();
        } else if (touche === toucheCri) {
            afficherBulle(cri);
        }
    });
</script>
<?php endif; ?>
</body>
</html>
