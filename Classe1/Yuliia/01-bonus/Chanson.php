<?php
class Chanson
{
    // propriétés publiques
    // peuvent etre lues et modofiées depuis l'extérieur
    // de la classe (instance de classe)
    public function __construct(
    public string $titre = '',
    public string $artiste = '',
    public int $duree = 0,
    ){}
   
}

