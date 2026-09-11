<?php
// le nom du fichier doit être le nom de la classe
// il n'y a qu'une classe par fichier
class Chanson{
    
    // Propriétés 
    // privées, ne peuvent être modifiées ou lues
    // que dans la classe
    private string $titre = '';
    private string $artiste = '';
    private int $duree = 0;

    // Constantes
    // conteneurs qui ne changent pas, sont généralement publique
    public const string GENRE = 'Musique';

    // Méthodes

     // on commence par le constructeur qui attend 3 paramètres
     // il est appelé avec le mot clef new
     public function __construct(string $title, string $artist, int $time)
     {
        // on remplit nos propriétés privée, on peut le faire car on est
        // à l'intérieur de la classe, $this représente l'instance
        $this->titre = $title;
        $this->artiste = $artist;
        $this->duree = $time;

     }

     // pour récupérer des propriétées privées, on doit créer
     // des getters
     public function getTitre():string
     {
        return $this->titre;
     }
     public function getArtiste():string
     {
        return $this->artiste;
     }
     public function getDuree():int
     {
        return $this->duree;
     }

}