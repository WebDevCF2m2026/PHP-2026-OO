<?php
// Classe représentant un chaton avec ses caractéristiques de base
class ChaTon {
    public string $nom;
    public string $couleur;
    public int $age;

    // Initialise un chaton à sa création (new ChaTon(...))
    public function __construct(string $nom, string $couleur, int $age) {
        $this->nom = $nom;
        $this->couleur = $couleur;
        $this->age = $age;
    }

    public function miauler(): void {
        echo "Miaou ! Je suis {$this->nom}, un chaton de couleur {$this->couleur} et j'ai {$this->age} mois.<br>";
    }
}
