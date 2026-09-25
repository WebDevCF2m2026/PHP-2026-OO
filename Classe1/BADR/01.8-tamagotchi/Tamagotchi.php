<?php

// Classe représentant un mini-Tamagotchi avec un niveau de faim
class Tamagotchi {
    private string $nom;
    private int $faim = 50;

    // Le constructeur ne reçoit que le nom, la faim démarre toujours à 50
    public function __construct(string $nom) {
        $this->nom = $nom;
    }

    // Manger enlève 20 à la faim
    public function manger(): void {
        $this->faim -= 20;
    }

    // Jouer ajoute 15 à la faim
    public function jouer(): void {
        $this->faim += 15;
    }

    // Affiche l'état actuel du Tamagotchi
    public function etat(): string {
        return "🐣 {$this->nom} a une faim de {$this->faim}/100";
    }
}
