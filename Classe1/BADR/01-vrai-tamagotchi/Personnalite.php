<?php

// Un petit trait de caractère tiré au sort à la naissance du Tamagotchi
class Personnalite {
    public static function tous(): array {
        return [
            'gentil' => [
                'nom' => 'Gentil',
                'emoji' => '💛',
                'description' => 'Retrouve le sourire plus vite que les autres.',
            ],
            'paresseux' => [
                'nom' => 'Paresseux',
                'emoji' => '💤',
                'description' => 'Perd son énergie moins vite, mais se fatigue plus en jouant.',
            ],
            'aventurier' => [
                'nom' => 'Aventurier',
                'emoji' => '🧭',
                'description' => 'Tombe plus souvent sur des événements surprises.',
            ],
        ];
    }

    public static function trouver(string $id): array {
        return self::tous()[$id] ?? self::tous()['gentil'];
    }

    public static function aleatoire(): string {
        $ids = array_keys(self::tous());

        return $ids[array_rand($ids)];
    }
}
