<?php
// Classe représentant un chaton (version simplifiée : nom + âge)
class MonChaton {
    public string $nom;
    public int $age;

    // Initialise un chaton à sa création (new MonChaton(...))
    public function __construct(string $nom, int $age) {
        $this->nom = $nom;
        $this->age = $age;
    }

    // Retourne un message présentant le chaton
    public function miauler(): string {
        return "Miaou ! Je suis " . $this->nom . " et j'ai " . $this->age . " ans.";
    }
}