<?php

class Playlist
{
    private array $chansons = [];

    public function ajouter(Chanson $chanson): void
    {
        $this->chansons[] = $chanson;
    }

    public function afficher(): void
    {
        foreach ($this->chansons as $chanson) {
            echo $chanson->getTitre() . ' - ' . $chanson->getArtiste();
            echo ' (' . $this->formaterDuree($chanson->getDuree()) . ')';
            echo PHP_EOL;
        }
    }

    public function dureeTotale(): int
    {
        $total = 0;

        foreach ($this->chansons as $chanson) {
            $total = $total + $chanson->getDuree();
        }

        return $total;
    }

    public function formaterDuree(int $secondes): string
    {
        
        $minutes = intdiv($secondes, 60);
        $resteSecondes = $secondes % 60;

        
        $minutesFormatees = str_pad((string) $minutes, 2, '0', STR_PAD_LEFT);
        $secondesFormatees = str_pad((string) $resteSecondes, 2, '0', STR_PAD_LEFT);

        return $minutesFormatees . ':' . $secondesFormatees;
    }
}
