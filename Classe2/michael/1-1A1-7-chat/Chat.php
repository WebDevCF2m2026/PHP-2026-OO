<?php

class Chat{

    // propriétés
    public string $nom = "Anonyme";
    public int $age = 0;

    // méthodes
    public function miauler(): string
    {
        return 'Miaou!';
    }
    public function sePresenter(): string
    {
        // avec les "" on peut concaténer les propriétés sans les .
        return "Je suis $this->nom et j'ai $this->age an(s)";
    }
}