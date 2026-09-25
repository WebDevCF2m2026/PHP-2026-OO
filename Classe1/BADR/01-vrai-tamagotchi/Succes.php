<?php

// Les succès (trophées) que le joueur peut débloquer
class Succes {
    public static function definitions(): array {
        return [
            'gourmand' => [
                'nom' => 'Gourmand',
                'emoji' => '🍎',
                'condition' => fn (Tamagotchi $t): bool => $t->getNbRepas() >= 10,
            ],
            'joueur' => [
                'nom' => 'Joueur invétéré',
                'emoji' => '🎾',
                'condition' => fn (Tamagotchi $t): bool => $t->getNbJeux() >= 10,
            ],
            'marmotte' => [
                'nom' => 'Marmotte',
                'emoji' => '😴',
                'condition' => fn (Tamagotchi $t): bool => $t->getNbDodo() >= 10,
            ],
            'veteran' => [
                'nom' => 'Vétéran',
                'emoji' => '⭐',
                'condition' => fn (Tamagotchi $t): bool => $t->getNiveau() >= 5,
            ],
            'legende' => [
                'nom' => 'Légende',
                'emoji' => '🏆',
                'condition' => fn (Tamagotchi $t): bool => $t->getNiveau() >= 10,
            ],
            'petit_tresor' => [
                'nom' => 'Petit trésor',
                'emoji' => '💰',
                'condition' => fn (Tamagotchi $t): bool => $t->getArgent() >= 100,
            ],
            'increvable' => [
                'nom' => 'Increvable',
                'emoji' => '❤️',
                'condition' => fn (Tamagotchi $t): bool => $t->getAge() >= 5,
            ],
            'bonne_sante' => [
                'nom' => 'Bonne santé',
                'emoji' => '💊',
                'condition' => fn (Tamagotchi $t): bool => $t->getNbSoins() >= 1,
            ],
        ];
    }

    // Vérifie tous les succès et débloque les nouveaux. Renvoie la liste des succès fraîchement obtenus.
    public static function verifier(Tamagotchi $tamagotchi): array {
        $nouveaux = [];

        foreach (self::definitions() as $id => $succes) {
            if ($tamagotchi->aSucces($id)) {
                continue;
            }

            if (($succes['condition'])($tamagotchi)) {
                $tamagotchi->debloquerSucces($id);
                $nouveaux[] = $succes;
            }
        }

        return $nouveaux;
    }
}
