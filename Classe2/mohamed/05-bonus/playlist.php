<?php

class Playlist
{
    private array $chansons = [];
    public function __construct()
    {
        $this->chansons = [];
    }
    public function ajouter(Chanson $chanson):void{
        array_push($this->chansons, $chanson);
    }
    public function afficher(): void{
        foreach ($this->chansons as $chanson) {
            echo $chanson->getTitre() . ' — ' . $chanson->getArtiste() . ' (' . $this->formaterDuree($chanson->getDuree()) . ')' . PHP_EOL;
        }
    }

    public function formaterDuree(int $duree): string{
        $minutes = intdiv($duree, 60);
        $secondes = $duree % 60;

        return $minutes . ':' . sprintf('%02d', $secondes);
    }
    public function dureeTotale(): int{
        $durreTotal = 0;
        foreach ($this->chansons as $chanson) {
            $durreTotal += $chanson->getDuree();
        }

        return $durreTotal;
    }
}
