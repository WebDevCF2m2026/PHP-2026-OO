<?php
class playlist
{
    public array $chansons = [];
    private int $secondeTotal = 0; // conteneur de durée total en seconde
    public function ajouter(Chanson $chansons): void
    {
        $this->chansons[] = $chansons;
    }

    public function afficher(): void
    {
        // le $this représente l'objet créé a partir de new user(...)
        // représente l'instance(objet) et pas l'usine (classe)
        $content = "";
        foreach ($this->chansons as $chanson) {
            $content .= "$chanson->titre -  $chanson->titre  ";
            // on converti les seconde avec formaterduree
            $temps = $this->formaterDuree(($chanson->duree));
            // on le rajoute a $content
            $content .= "($temps)<br>";
            // on ajoute de temps en seconde avec dureeTotale
            $this->dureeTotale($chanson->duree);
        }
        echo $content;
    }
    // Compter en seconde le total de temps de la playlist et envoie
    // le total en seconde
    public function dureeTotale(int $seconde = 0) 
    {
        // on modifie la propriété $secondeTotal avec les secondes passée
        // en parametre, $this represente l'instance de playlist
        $this->secondeTotal += $seconde;
        // on retourne le total des morceaux en secondes
        return $this->secondeTotal;
    }

    public function formaterDuree(int $secondes):string
    {
        // récupèration des minutes en divisant par les secondes d'une minute
        $minutes = intdiv($secondes, 60);
        // conversion en string, si moins de 2 caractères ajout de 0 à gauche STR_PAD_LEFT
        $minutes = str_pad((string) $minutes, 2, '0', STR_PAD_LEFT);
        // Modulo des secondes sur 60 nous donne le nombre de secondes restantes
        $resteSecondes = $secondes % 60;
        // conversion en string, si moins de 2 caractères ajout de 0 à gauche STR_PAD_LEFT
        $resteSecondes = ($resteSecondes<10)? "0".$resteSecondes: (string) $resteSecondes;
        return "$minutes:$resteSecondes";
    }
}
