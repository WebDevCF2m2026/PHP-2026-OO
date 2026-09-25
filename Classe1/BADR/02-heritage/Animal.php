<?php
// Classe PARENTE : ce que tous les animaux ont en commun
// abstract : on ne peut pas faire new Animal(...), un "animal" tout court n'existe pas
abstract class Animal
{
    public function __construct(public string $nom) {}

    public function manger(): string
    {
        return $this->nom . ' mange.';
    }

    // méthode sans corps : chaque enfant DOIT l'écrire
    abstract public function crier(): string;
}
