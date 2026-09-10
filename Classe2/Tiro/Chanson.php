<?php

//le nom du fichier doit etre le nom de classe
// il n'y a q'une classe par fichier 

class Chanson{

    // Propriétés 
    // privées, ne peuvent être modifiées ou lues
    // que dans la classe 
    private string $titre  = '';
    private string $artiste = '';
    private int $duree = 0;

    // constante 
    public const string GENRE = 'Musique';


    // Méthodes 
        // on commence par le constructeur 
        public function __construct(string $title, string $artist, int $time)
        {
            // on remplit nos prorpriété privée, on peut le faire car on est
            // a l'interieur de la classe, $this represente l'instance 
            $this->titre = $title;
            $this->artiste = $artist;
            $this->duree = $time;
        }

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