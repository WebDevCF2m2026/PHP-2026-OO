<?php

// Le catalogue des objets utilisables, achetables à la boutique
class Objet {
    public static function catalogue(): array {
        return [
            'pomme' => [
                'nom' => 'Pomme',
                'emoji' => '🍎',
                'prix' => 5,
                'description' => 'Réduit la faim de 20.',
            ],
            'jouet' => [
                'nom' => 'Jouet',
                'emoji' => '🧸',
                'prix' => 8,
                'description' => 'Augmente le bonheur de 25, sans fatiguer.',
            ],
            'medicament' => [
                'nom' => 'Médicament',
                'emoji' => '💊',
                'prix' => 15,
                'description' => 'Guérit la maladie.',
            ],
            'gateau' => [
                'nom' => 'Gâteau magique',
                'emoji' => '🎂',
                'prix' => 20,
                'description' => 'Restaure toutes les statistiques.',
            ],
        ];
    }

    public static function trouver(string $id): ?array {
        return self::catalogue()[$id] ?? null;
    }

    // Applique l'effet d'un objet sur un Tamagotchi. Renvoie false si l'effet n'a servi à rien.
    public static function appliquer(string $id, Tamagotchi $tamagotchi): bool {
        return match ($id) {
            'pomme' => $tamagotchi->effetPomme(),
            'jouet' => $tamagotchi->effetJouet(),
            'medicament' => $tamagotchi->effetMedicament(),
            'gateau' => $tamagotchi->effetGateau(),
            default => false,
        };
    }
}
