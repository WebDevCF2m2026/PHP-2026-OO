<?php
class Poisson extends Animal
{
    // sans cette méthode, PHP refuse la classe (crier() est abstraite)
    public function crier(): string
    {
        return $this->nom . ' fait : Blub.';
    }
}
