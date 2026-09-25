<?php
class Perroquet extends Animal
{
    // deux paramètres : le nom part chez le parent, la phrase reste ici
    public function __construct(string $nom, private string $phrase)
    {
        parent::__construct($nom);
    }

    public function crier(): string
    {
        return "{$this->nom} fait : {$this->phrase} Croâ ! {$this->phrase}";
    }
}
