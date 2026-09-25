<?php

class Chanson
{
    private string $titre = '';
    private string $artiste = '';
    private int $duree = 0;
    //constante
    //conteneurs qui sont souvent en public, et on peut mettre le typage
     public const string GENRE = 'Musique';
    // Le constructeur est appelé avec new Chanson(...).
    public function __construct(string $title, string $artist, int $dure)
    {
        // $this représente la chanson que l'on crée.
        $this->titre = $title;
        $this->artiste = $artist;
        $this->duree = $dure;
    }

    // pour recuperer des propriétés privées on doit creer des getters.
    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getArtiste(): string
    {
        return $this->artiste;
    }

    public function getDuree(): int
    {
        return $this->duree;
    }
}
