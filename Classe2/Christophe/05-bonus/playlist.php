<?php
class Playlist {
    //propriété publique, accessible depuis l'extérieur de la classe
    //tableau de chansons, initialisé à un tableau vide
    public array $chansons = [];

    //méthode publique, accessible depuis l'extérieur de la classe
    public function ajouter(Chanson $chanson): void {
        //on ajoute les chansons(type Chanson) au tableau de chansons
        $this->chansons[] = $chanson;
    }
}