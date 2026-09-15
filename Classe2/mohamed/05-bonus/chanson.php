<?php

//le nom du fichier doit etre le nom de la class
//il n'y a qu'une class par fichier

class Chanson{
    private string $titre = "";
    private string $nartiste = "";
    private int $duree = 0;

    // constante
    // conteneur qui ne change pas sont generalement public
    public const string GENRE = "Musique";

    // methode
    // on commence par les methode magique/contructeur
    // il est appelé avec le mot clé new
    public function __construct(string $title, string $artiste, int $time)
    {
        // on remplie no propriétés privé, on peut le faire car on est a l'interieur de la calss; $this représente l'instance
        $this->titre = $title; 
        $this->nartiste = $artiste; 
        $this->duree = $time;
    }
    public function getTitre():string
    {
        return $this->titre;
    }
    public function getArtiste():string
    {
        return $this->nartiste;
    }
    public function getDuree():int
    {
        return $this->duree;
    }
}