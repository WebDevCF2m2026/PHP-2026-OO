<?php
class Playlist{
    // propriétés
    public array $chansons = []; // tableau qui va contenir des chansons

    // Méthodes
    public function ajouter(Chanson $chanson): void
    {
        // on ajoute les chansons (type Chanson) au tableau
        $this->chansons[] = $chanson;
    }
}