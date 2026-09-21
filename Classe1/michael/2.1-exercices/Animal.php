<?php

abstract class Animal{

    // Propriétés
    protected ?string $nom = null;


    // Méthodes

    // constructeur
    public function __construct(string $name = 'Anonyme'){
        $this->nom = $name;
        // affiche la classe dans laquelle le constructeur est utilisé
        echo "Je me nomme ".$this->nom." et je suis de type ".self::class;
    }

    public function manger(): string
    {
        return $this->nom.' mange.';
    }
}