<?php
class Chanson
{
    // Appel du constructeur (new Chanson(param1,param2,param3))
    public function __construct(
        // promotion des propriétés (PHP 8.0) ou attribution
        // sans getters ou setters ni en touchant les propriétés
        public string $titre,
        public string $artiste,
        public int $duree,
    ){

    }

}