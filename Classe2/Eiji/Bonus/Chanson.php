<?php
// le nom du ficher doit être le nom de la classe
// il n'y a qu'une classe par fichier
class Chanson{
    // propriétés 
    // privées, ne peuvent être modifiées ou lues
    // que dans la classe
    private string $titre = '';
    private string $artiste = '';
    private int $duree = 0;

    // constantes
    // conteneur qui ne change pas sont souvent publique 
    public const string GENRE = 'Musique';

    // MÉthodes
    // on commence par le constructeur qui attends 3 paramètres
    // il est aooelé avec le mot clef 'new'
    public function __construct(string $title, string $artist, int $time)
    {
        // on rempli nos propriétés privée, on peut le faire 
        // car in est a l'intérieur de la classe, 
        // $this représente l'instance
        $this->titre = $title;
        $this->artiste = $artist;
        $this->duree = $time;

        // pour récupérer des propriétées privées, on doit créer
        // des getters
        }
        public function getTitre():string
        {
            return $this->titre;
        }

        public function getDuree():string
        {
            return $this->duree;
        }

        public function getArtiste():string
        {
            return $this->artiste;
        }

        
    
}