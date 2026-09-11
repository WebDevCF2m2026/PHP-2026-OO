<?php
// Classe représentant une chanson (titre, artiste, durée en secondes)
class Chanson {
    public string $titre;
    public string $artiste;
    public int $duree;

    // Initialise une chanson à sa création (new Chanson(...))
    public function __construct(string $titre, string $artiste, int $duree) {
        $this->titre = $titre;
        $this->artiste = $artiste;
        $this->duree = $duree;
    }
}
