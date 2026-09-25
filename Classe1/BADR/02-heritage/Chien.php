<?php
// Un Chien EST un Animal : il récupère le constructeur et manger()
class Chien extends Animal
{
    public function crier(): string
    {
        return $this->nom . ' fait : Wouf !';
    }
}
