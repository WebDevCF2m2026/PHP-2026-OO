<?php

class Chat
{
    // propriété
    public string $nom = "David";
    public int $age = 3;

    // méthodes
    public function miauler(): string
    {
        return "Miaou!";
    }

    public function sePresenter(): string
    {
        // avec les doubles guillemets ("") on peut afficher les propriétés sans les points (.)
        return "je suis $this->nom et j'ai $this->age an(s)";
    }
}