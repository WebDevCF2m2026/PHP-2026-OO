<?php

class Playlist
{
    public array $chansons = []; // tableau qui va contenir des chansons

    public function ajouter(Chanson $chanson): void
    {
        // On ajoute la chanson au tableau
        $this->chansons[] = $chanson;
    }

    public function afficher(): void
    {
        foreach ($this->chansons as $chanson) {
            echo $chanson->getTitre() . ' - ' . $chanson->getArtiste(). "({$chanson->getDuree()} seconde) <br>";
            echo ' (' . $this->formaterDuree($chanson->getDuree()) . ') <br>';
        }
    }

    public function dureeTotale(): int
    {
        $this->compteSecondes += $duree;
        // $total = 0;

        // foreach ($this->chansons as $chanson) {
        //     $total = $total + $chanson->getDuree();
        // }

        return $total;
    }

    public function formaterDuree(int $seconds): string
    {
        $minute = intdiv($seconds, 60);
        $resteSeconde = $seconds % 60;

        return sprintf('%d:%02d', $minute, $resteSeconde);
    }
}
