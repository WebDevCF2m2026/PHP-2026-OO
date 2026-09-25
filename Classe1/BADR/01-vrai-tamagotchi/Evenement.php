<?php

// Petits événements aléatoires (et blagues) qui peuvent arriver à chaque visite
class Evenement {
    private static function liste(): array {
        return [
            function (Tamagotchi $t): string {
                $t->ajouterArgent(5);
                return '🪙 Il a trouvé 5 pièces par terre !';
            },
            function (Tamagotchi $t): string {
                $t->ajouterObjet('pomme', 1);
                return '🍎 Une pomme est tombée d\'un arbre juste pour lui !';
            },
            function (Tamagotchi $t): string {
                $t->gagnerXp(10);
                return '✨ Un éclair de sagesse lui donne de l\'expérience !';
            },
            function (Tamagotchi $t): string {
                $t->modifierBonheur(-10);
                return '🌧️ Il s\'est fait surprendre par la pluie, un peu triste...';
            },
            function (Tamagotchi $t): string {
                return '😂 Il te raconte une blague : "Pourquoi les plongeurs plongent-ils en arrière ? Sinon ils tombent dans le bateau !"';
            },
            function (Tamagotchi $t): string {
                return '🃏 Il te raconte une blague : "Que dit un escargot qui croise une limace ? Regarde, un nudiste !"';
            },
        ];
    }

    // Tente de déclencher un événement. Renvoie le message à afficher, ou null si rien ne se passe.
    public static function declencher(Tamagotchi $tamagotchi): ?string {
        if (!$tamagotchi->estVivant()) {
            return null;
        }

        $chance = $tamagotchi->getPersonnaliteId() === 'aventurier' ? 25 : 15;

        if (random_int(1, 100) > $chance) {
            return null;
        }

        $evenements = self::liste();
        $choix = $evenements[array_rand($evenements)];

        return $choix($tamagotchi);
    }
}
