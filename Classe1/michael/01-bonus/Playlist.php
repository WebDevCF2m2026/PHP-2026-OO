<?php

class Playlist{
    // Propriétés
    public array $chansons = []; // conteneur de chanson
    private int $secondesTotal = 0; // conteneur de durée totale en seconde

    // Constantes

    // Méthodes

    // ajouter les chansons
    public function ajouter(Chanson $item):void
    {
        $this->chansons[] = $item;
    }
    // afficher les chansons
    public function afficher():void
    {
        $content = "";
        foreach($this->chansons as $chanson){
            // on ajoute le contenu du morceau à la playlist sans les secondes
            $content .= "$chanson->titre - $chanson->artiste ";
            // on convertit les secondes avec formaterDuree
            $temps = $this->formaterDuree($chanson->duree);
            // on le rajoute à $content
            $content .= "($temps)<br>";
            // on ajoute le temps en seconde via dureeTotale
            $this->dureeTotale($chanson->duree);
        }
        echo $content;
    }
    // compter en seconde le total de temps de la playlist et envoie
    // le total en seconde
    public function dureeTotale(int $seconde = 0): int
    {
        // on modifie la propriété $secondesTotal avec les secondes passée
        // en paramètre, $this représente l'instance de Playlist
        $this->secondesTotal += $seconde;
        // on retourne le total des morceaux en secondes
        return $this->secondesTotal;
    }

    public function formaterDuree(int $secondes): string
    {
        // récupération des minutes en divisant par 
        // les secondes d'une minute
        $minutes = intdiv($secondes, 60);
        // conversion en string, si moins de 2 caractères ajout de 0
        // à gauche (STR_PAD_LEFT)
        $minutes = str_pad((string) $minutes, 2, '0', STR_PAD_LEFT);
        // Modulo des secondes sur 60 nous donne le nombre de secondes
        // restantes
        $resteSecondes = $secondes % 60;
        // autre méthode, même résultat
        $resteSecondes = ($resteSecondes<10)? "0".$resteSecondes: (string) $resteSecondes;
        // retour de la chaîne de caractère
        return "$minutes:$resteSecondes";
    }
}