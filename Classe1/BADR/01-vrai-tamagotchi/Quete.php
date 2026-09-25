<?php

// Les quêtes : des objectifs avec une récompense, réclamée automatiquement une fois atteinte
class Quete {
    public static function definitions(): array {
        return [
            'q_repas' => [
                'nom' => 'Repas de bienvenue',
                'description' => 'Nourris-le 3 fois',
                'cible' => 3,
                'progres' => fn (Tamagotchi $t): int => $t->getNbRepas(),
                'argent' => 10,
                'xp' => 10,
            ],
            'q_jouer' => [
                'nom' => 'Ami fidèle',
                'description' => 'Joue avec lui 5 fois',
                'cible' => 5,
                'progres' => fn (Tamagotchi $t): int => $t->getNbJeux(),
                'argent' => 15,
                'xp' => 15,
            ],
            'q_niveau' => [
                'nom' => 'Montée en puissance',
                'description' => 'Atteins le niveau 3',
                'cible' => 3,
                'progres' => fn (Tamagotchi $t): int => $t->getNiveau(),
                'argent' => 25,
                'xp' => 0,
            ],
            'q_boutique' => [
                'nom' => 'Premier achat',
                'description' => 'Achète un objet à la boutique',
                'cible' => 1,
                'progres' => fn (Tamagotchi $t): int => $t->getNbAchats(),
                'argent' => 0,
                'xp' => 20,
            ],
        ];
    }

    // Vérifie toutes les quêtes et distribue automatiquement les récompenses. Renvoie les quêtes réclamées.
    public static function verifierEtReclamer(Tamagotchi $tamagotchi): array {
        $reclamees = [];

        foreach (self::definitions() as $id => $quete) {
            if ($tamagotchi->aReclameQuete($id)) {
                continue;
            }

            if (($quete['progres'])($tamagotchi) >= $quete['cible']) {
                $tamagotchi->ajouterArgent($quete['argent']);
                $tamagotchi->gagnerXp($quete['xp']);
                $tamagotchi->reclamerQuete($id);
                $reclamees[] = $quete;
            }
        }

        return $reclamees;
    }
}
