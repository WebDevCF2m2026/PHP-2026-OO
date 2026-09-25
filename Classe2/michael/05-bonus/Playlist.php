<?php
class Playlist{
    // propriétés
    public array $chansons = []; // tableau qui va contenir des chansons
    private int $compteSecondes = 0;

    // Méthodes
    public function ajouter(Chanson $chanson): void
    {
        // on ajoute les chansons (type Chanson) au tableau
        $this->chansons[] = $chanson;
    }
    public function afficher():void
    {
        // tant qu'on a des chansons
        foreach($this->chansons as $chanson){
            // affichage du morceau
            echo $chanson->getTitre()." — ".$chanson->getArtiste()
            ." (". $this->formaterDuree($chanson->getDuree()). " secondes) <br>";

            // on ajoute la durée avec la méthode dureeTotale
            $this->dureeTotale($chanson->getDuree());
        }
    }

    public function dureeTotale($duree = 0): int
    {
        return $this->compteSecondes += $duree;
    }

    public function formaterDuree(int $secondes):string
    {
        // initialisation du texte
        $text = "";

        // on divise et on met à l'inférieur (floor()) le nombre de
        // minutes du morceau équivaut à => floor($secondes/60);
        // sans danger lié aux numériques en base 8
        $minutes = intval($secondes/60);

        // on ajoute au texte avec le 0 si plus petit que 10
        // ternaire
        $text .= ($minutes>10)? (string) $minutes: '0'.$minutes;

        // ajout du :
        $text .= ":";
        // on prend le nombre de secondes restantes
        $secondesRestantes = $secondes % 60;

        // conversion en string puis si on a moins de 2 caractères
        // on ajoute '0' à gauche (STR_PAD_LEFT)
        $secondesRestantes = str_pad((string) $secondesRestantes, 2, '0', STR_PAD_LEFT);

        // ajout des secondes
        $text .= $secondesRestantes;

        // retour du texte
        return $text;

    }
}