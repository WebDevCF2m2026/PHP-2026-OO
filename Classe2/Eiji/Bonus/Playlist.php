<?php
 
class Playlist
{
    private array $chansons = [];

    private 

    public function __construct()
    {
        $this->chansons = [];
    }
    public function ajouter(Chanson $chanson):void{
        array_push($this->chansons, $chanson);
    }
    public function afficher(): void{
        foreach ($this->chansons as $chanson) {
            echo $chanson->getTitre() . ' — ' . $chanson->getArtiste() . ' (' . $this->formaterDuree($chanson->getDuree()) . ') <br>';
        }
    }
 
    public function formaterDuree(int $duree): string{
        $minutes = intdiv($duree/60);
        // on prend le nimbre de secondes restantes
        $secondes = $duree % 60;
 
        return $minutes . ':' . sprintf('%02d', $secondes);
    }
    public function dureeTotale(): int{
        $dureeTotal = 0;
        foreach ($this->chansons as $chanson) {
            $dureeTotal += $chanson->getDuree();
        }
 
        return $dureeTotal;
    }
}
 
 