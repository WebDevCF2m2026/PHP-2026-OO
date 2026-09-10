<?php
class Playlist{
    // PROPRIÉTÉS
    public array $chansons = []; // tableau qui va contenir des chansons

    public function ajouter(Chanson $chanson): void // void = pas de return
    {
        // on ajoute les chnasons (type Chanson) au tableau
        $this->chansons[] = $chanson;
    }
}