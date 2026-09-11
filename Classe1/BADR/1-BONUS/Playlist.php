<?php
class Playlist {
    // Liste des chansons de la playlist
    public array $chansons = [];

    // Ajoute une chanson à la playlist
    public function ajouter(Chanson $chanson): void {
        $this->chansons[] = $chanson;
    }

    // Affiche toutes les chansons avec leur durée formatée
    public function afficher(): void {
        foreach ($this->chansons as $chanson) {
            echo $chanson->titre . ' — ' . $chanson->artiste . ' (' . $this->formaterDuree($chanson->duree) . ')' . PHP_EOL;
        }
    }

    // Calcule la durée totale de la playlist (en secondes)
    public function dureeTotale(): int {
        $total = 0;
        foreach ($this->chansons as $chanson) {
            $total += $chanson->duree;
        }
        return $total;
    }

    // Convertit des secondes en format MM:SS
    public function formaterDuree(int $secondes): string {
        $minutes = intdiv($secondes, 60);
        $reste = $secondes % 60;
        return sprintf('%02d:%02d', $minutes, $reste);
    }
}
