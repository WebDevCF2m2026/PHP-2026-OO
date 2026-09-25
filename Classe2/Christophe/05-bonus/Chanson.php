<?php
class Chanson {
    //propriétés privées, ne peuvent être modifiées ou lues que depuis la classe
    private string $titre = '';
    private string $artiste = '';
    private int $duree = 0;

    //Constants de classe
    // une constante de classe est une valeur qui ne change pas 
    // elle est publique et accessible depuis l'extérieur de la classe
    public const string GENRE = 'Musique';

    // Methode magique __construct() qui est appelée automatiquement lors de l'instanciation d'un objet
    public function __construct(string $title, string $artist, int $time)
    {
        //on remplit les propriétés privées avec les valeurs passées en paramètre
        //on peut le faire car on est dans la classe, donc on a accès aux propriétés privées
        //$this est une variable qui représente l'objet courant, donc l'objet qui est en train d'être instancié
        $this->titre = $title;
        $this->artiste = $artist;
        $this->duree = $time;
    }

    // pour récuperer les valeurs des propriétés privées, on crée des getters, qui sont des méthodes publiques qui retournent la valeur de la propriété privée
    public function getTitre(): string {
        return $this->titre;
    }

    public function getArtiste(): string {
        return $this->artiste;
    }

    public function getDuree(): int {
        return $this->duree;
    }
}