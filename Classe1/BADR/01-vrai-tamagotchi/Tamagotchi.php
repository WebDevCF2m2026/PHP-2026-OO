<?php

// Le vrai Tamagotchi : statistiques en temps réel, âge, maladie, niveaux, inventaire, historique...
class Tamagotchi {
    private string $personnageId;
    private string $nom;
    private string $personnaliteId;

    private int $faim = 40;
    private int $energie = 100;
    private int $bonheur = 80;
    private int $sante = 100;
    private bool $malade = false;
    private bool $vivant = true;

    private int $xp = 0;
    private int $niveau = 1;
    private int $argent = 20;

    private array $inventaire = ['pomme' => 1];
    private array $succesDebloques = [];
    private array $quetesReclamees = [];
    private array $historique = [];

    private int $nbRepas = 0;
    private int $nbJeux = 0;
    private int $nbDodo = 0;
    private int $nbSoins = 0;
    private int $nbAchats = 0;

    private int $dateCreation;
    private int $derniereMaj;

    public function __construct(string $personnageId, string $nom, ?string $personnaliteId = null) {
        $this->personnageId = $personnageId;
        $this->nom = $nom;
        $this->personnaliteId = $personnaliteId ?? Personnalite::aleatoire();
        $this->dateCreation = time();
        $this->derniereMaj = time();
    }

    private function borner(int $valeur): int {
        return max(0, min(100, $valeur));
    }

    private function journaliser(string $message): void {
        $this->historique[] = ['temps' => time(), 'message' => $message];

        // On ne garde que les 15 derniers événements
        if (count($this->historique) > 15) {
            $this->historique = array_slice($this->historique, -15);
        }
    }

    // --- Écoulement du temps : à appeler à chaque chargement de page ---
    public function appliquerDecroissance(): void {
        if (!$this->vivant) {
            return;
        }

        $secondes = time() - $this->derniereMaj;
        $minutes = intdiv($secondes, 60);

        if ($minutes < 1) {
            return;
        }

        // On plafonne pour éviter qu'une longue absence ne tue le Tamagotchi d'un coup
        $minutes = min($minutes, 180);
        $this->derniereMaj = time();

        $ralentiEnergie = $this->personnaliteId === 'paresseux' ? 0.6 : 1;
        $ralentiBonheur = $this->personnaliteId === 'gentil' ? 0.5 : 1;

        $this->faim = $this->borner($this->faim + (int) round(2 * $minutes));
        $this->energie = $this->borner($this->energie - (int) round(1 * $minutes * $ralentiEnergie));
        $this->bonheur = $this->borner($this->bonheur - (int) round(1 * $minutes * $ralentiBonheur));

        if ($this->malade) {
            $this->sante = $this->borner($this->sante - 2 * $minutes);
        } elseif ($this->faim >= 90 || $this->energie <= 10) {
            $this->sante = $this->borner($this->sante - $minutes);

            if (random_int(1, 100) <= min(60, $minutes * 10)) {
                $this->malade = true;
                $this->journaliser('🤒 Il est tombé malade...');
            }
        } else {
            $this->sante = $this->borner($this->sante + (int) round(0.5 * $minutes));
        }

        if ($this->sante <= 0) {
            $this->vivant = false;
            $this->journaliser('💀 Il n\'a pas survécu...');
        }
    }

    // --- Actions ---
    public function manger(): void {
        if (!$this->vivant) {
            return;
        }

        $this->faim = $this->borner($this->faim - 25);
        $this->energie = $this->borner($this->energie + 2);
        $this->nbRepas++;
        $this->gagnerXp(5);
        $this->journaliser('🍽️ Repas terminé.');
    }

    public function jouer(): void {
        if (!$this->vivant) {
            return;
        }

        $penaliteEnergie = $this->personnaliteId === 'paresseux' ? 20 : 15;

        $this->bonheur = $this->borner($this->bonheur + 20);
        $this->faim = $this->borner($this->faim + 10);
        $this->energie = $this->borner($this->energie - $penaliteEnergie);
        $this->nbJeux++;
        $this->gagnerXp(8);
        $this->journaliser('🎾 Partie de jeu terminée.');
    }

    public function dormir(): void {
        if (!$this->vivant) {
            return;
        }

        $this->energie = $this->borner($this->energie + 40);
        $this->faim = $this->borner($this->faim + 5);
        $this->bonheur = $this->borner($this->bonheur + 5);
        $this->nbDodo++;
        $this->gagnerXp(3);
        $this->journaliser('😴 Bonne sieste !');
    }

    // Soigne la maladie avec un médicament si possible, sinon contre 15 pièces. Renvoie false si impossible.
    public function soigner(): bool {
        if (!$this->vivant || !$this->malade) {
            return false;
        }

        if ($this->retirerObjet('medicament', 1)) {
            // le médicament est gratuit puisqu'il vient de l'inventaire
        } elseif (!$this->retirerArgent(15)) {
            return false;
        }

        $this->malade = false;
        $this->sante = $this->borner($this->sante + 10);
        $this->nbSoins++;
        $this->gagnerXp(10);
        $this->journaliser('💊 Guéri !');

        return true;
    }

    // --- Effets des objets (appelés par Objet::appliquer) ---
    public function effetPomme(): bool {
        $this->faim = $this->borner($this->faim - 20);
        return true;
    }

    public function effetJouet(): bool {
        $this->bonheur = $this->borner($this->bonheur + 25);
        return true;
    }

    public function effetMedicament(): bool {
        if (!$this->malade) {
            return false;
        }

        $this->malade = false;
        $this->sante = $this->borner($this->sante + 10);

        return true;
    }

    public function effetGateau(): bool {
        $this->faim = 0;
        $this->energie = 100;
        $this->bonheur = 100;
        $this->sante = $this->borner($this->sante + 30);

        return true;
    }

    // --- Inventaire ---
    public function ajouterObjet(string $id, int $quantite = 1): void {
        $this->inventaire[$id] = ($this->inventaire[$id] ?? 0) + $quantite;
    }

    public function retirerObjet(string $id, int $quantite = 1): bool {
        if (($this->inventaire[$id] ?? 0) < $quantite) {
            return false;
        }

        $this->inventaire[$id] -= $quantite;

        if ($this->inventaire[$id] <= 0) {
            unset($this->inventaire[$id]);
        }

        return true;
    }

    public function utiliserObjet(string $id): bool {
        if (!$this->vivant || !$this->retirerObjet($id, 1)) {
            return false;
        }

        $ok = Objet::appliquer($id, $this);

        if (!$ok) {
            $this->ajouterObjet($id, 1);
            return false;
        }

        $this->gagnerXp(3);
        $nom = Objet::trouver($id)['nom'] ?? $id;
        $this->journaliser("🎒 Objet utilisé : {$nom}.");

        return true;
    }

    public function acheterObjet(string $id): bool {
        $article = Objet::trouver($id);

        if ($article === null || !$this->retirerArgent($article['prix'])) {
            return false;
        }

        $this->ajouterObjet($id, 1);
        $this->nbAchats++;
        $this->journaliser("🛍️ Achat : {$article['nom']}.");

        return true;
    }

    // --- Argent et expérience ---
    public function ajouterArgent(int $montant): void {
        $this->argent = max(0, $this->argent + $montant);
    }

    public function retirerArgent(int $montant): bool {
        if ($this->argent < $montant) {
            return false;
        }

        $this->argent -= $montant;

        return true;
    }

    public function gagnerXp(int $montant): void {
        $this->xp += $montant;

        while ($this->xp >= $this->niveau * 100) {
            $this->xp -= $this->niveau * 100;
            $this->niveau++;
            $this->sante = $this->borner($this->sante + 20);
            $this->journaliser("🎉 Niveau {$this->niveau} atteint !");
        }
    }

    public function modifierBonheur(int $delta): void {
        $this->bonheur = $this->borner($this->bonheur + $delta);
    }

    public function modifierEnergie(int $delta): void {
        $this->energie = $this->borner($this->energie + $delta);
    }

    // --- Succès et quêtes ---
    public function aSucces(string $id): bool {
        return in_array($id, $this->succesDebloques, true);
    }

    public function debloquerSucces(string $id): void {
        $this->succesDebloques[] = $id;
        $nom = Succes::definitions()[$id]['nom'] ?? $id;
        $this->journaliser("🏆 Succès débloqué : {$nom}.");
    }

    public function aReclameQuete(string $id): bool {
        return in_array($id, $this->quetesReclamees, true);
    }

    public function reclamerQuete(string $id): void {
        $this->quetesReclamees[] = $id;
        $nom = Quete::definitions()[$id]['nom'] ?? $id;
        $this->journaliser("📜 Quête accomplie : {$nom}.");
    }

    public function ajouterEvenement(string $message): void {
        $this->journaliser('🎲 ' . $message);
    }

    // --- Lecture de l'état ---
    public function estVivant(): bool { return $this->vivant; }
    public function estMalade(): bool { return $this->malade; }
    public function getFaim(): int { return $this->faim; }
    public function getEnergie(): int { return $this->energie; }
    public function getBonheur(): int { return $this->bonheur; }
    public function getSante(): int { return $this->sante; }
    public function getXp(): int { return $this->xp; }
    public function getNiveau(): int { return $this->niveau; }
    public function getArgent(): int { return $this->argent; }
    public function getNom(): string { return $this->nom; }
    public function getPersonnageId(): string { return $this->personnageId; }
    public function getPersonnaliteId(): string { return $this->personnaliteId; }
    public function getInventaire(): array { return $this->inventaire; }
    public function getHistorique(): array { return array_reverse($this->historique); }
    public function getNbRepas(): int { return $this->nbRepas; }
    public function getNbJeux(): int { return $this->nbJeux; }
    public function getNbDodo(): int { return $this->nbDodo; }
    public function getNbSoins(): int { return $this->nbSoins; }
    public function getNbAchats(): int { return $this->nbAchats; }

    // 1 jour de Tamagotchi = 10 minutes réelles
    public function getAge(): int {
        return intdiv(time() - $this->dateCreation, 600);
    }

    // Stade d'évolution : 1 = bébé, 2 = jeune, 3 = adulte
    public function getStade(): int {
        return $this->niveau >= 6 ? 3 : ($this->niveau >= 3 ? 2 : 1);
    }

    public function getXpNecessaire(): int {
        return $this->niveau * 100;
    }

    // --- Sérialisation pour la sauvegarde ---
    public function toArray(): array {
        return [
            'personnageId' => $this->personnageId,
            'nom' => $this->nom,
            'personnaliteId' => $this->personnaliteId,
            'faim' => $this->faim,
            'energie' => $this->energie,
            'bonheur' => $this->bonheur,
            'sante' => $this->sante,
            'malade' => $this->malade,
            'vivant' => $this->vivant,
            'xp' => $this->xp,
            'niveau' => $this->niveau,
            'argent' => $this->argent,
            'inventaire' => $this->inventaire,
            'succesDebloques' => $this->succesDebloques,
            'quetesReclamees' => $this->quetesReclamees,
            'historique' => $this->historique,
            'nbRepas' => $this->nbRepas,
            'nbJeux' => $this->nbJeux,
            'nbDodo' => $this->nbDodo,
            'nbSoins' => $this->nbSoins,
            'nbAchats' => $this->nbAchats,
            'dateCreation' => $this->dateCreation,
            'derniereMaj' => $this->derniereMaj,
        ];
    }

    public static function fromArray(array $donnees): self {
        $tamagotchi = new self($donnees['personnageId'], $donnees['nom'], $donnees['personnaliteId'] ?? null);

        $tamagotchi->faim = $donnees['faim'];
        $tamagotchi->energie = $donnees['energie'];
        $tamagotchi->bonheur = $donnees['bonheur'];
        $tamagotchi->sante = $donnees['sante'];
        $tamagotchi->malade = $donnees['malade'];
        $tamagotchi->vivant = $donnees['vivant'];
        $tamagotchi->xp = $donnees['xp'];
        $tamagotchi->niveau = $donnees['niveau'];
        $tamagotchi->argent = $donnees['argent'];
        $tamagotchi->inventaire = $donnees['inventaire'];
        $tamagotchi->succesDebloques = $donnees['succesDebloques'];
        $tamagotchi->quetesReclamees = $donnees['quetesReclamees'];
        $tamagotchi->historique = $donnees['historique'];
        $tamagotchi->nbRepas = $donnees['nbRepas'];
        $tamagotchi->nbJeux = $donnees['nbJeux'];
        $tamagotchi->nbDodo = $donnees['nbDodo'];
        $tamagotchi->nbSoins = $donnees['nbSoins'];
        $tamagotchi->nbAchats = $donnees['nbAchats'];
        $tamagotchi->dateCreation = $donnees['dateCreation'];
        $tamagotchi->derniereMaj = $donnees['derniereMaj'];

        return $tamagotchi;
    }
}
