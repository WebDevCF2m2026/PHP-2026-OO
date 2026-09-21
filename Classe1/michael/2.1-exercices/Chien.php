<?php

class chien extends Animal{
    // propriétés et méthodes dont le constructeur sont hérités
    
    public function crier(): string
    {
        return $this->nom . ' fait : Wouf !';
    }
}