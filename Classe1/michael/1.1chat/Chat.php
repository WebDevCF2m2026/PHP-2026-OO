<?php

class Chat{
    // propriétés
    public string $nom = "Sans nom";
    public int $age = 0;

    // méthodes

    // constructeur est appelé dès le mot clef new
    // il permet de passer des paramètres à la création
    // de l'instance : $chat = new Chat(nom:'Tom',age:5)
    public function __construct(string $nom, int $age)
    {
        $this->nom = $nom;
        $this->age = $age;
    }
    public function miauler(): string
    {
        return "Miaou !";
    }
    public function sePresenter(): string
    {
        return 'Je suis ' . $this->nom . ' et j\'ai ' . $this->age . ' ans.';
    }
}