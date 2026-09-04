<?php

class Playlist
{
    // Propriétés
    public array $chansons = [];

    // ajouter
    public function ajouter (Chanson $chanson): void {
        $this->chansons[] = $chanson;
    }

    
    // afficher ()

    public function afficher(): void {
        foreach ($this->chansons as $i){
            {
            echo "{$i->titre} — {$i->artiste} ({$this->formaterDuree($i->duree)})<br>";
        }
    }; 
   }

   // durée totale
     public function dureeTotale(): int {
        $res = 0;
        foreach ($this->chansons as $i){
            $res += $i->duree;
        }
        return $res;
    }

    // formaterDuree
   public function formaterDuree(int $secondes): string
    {
       return sprintf('%02d:%02d', intdiv($secondes, 60), $secondes % 60);
    }
}
