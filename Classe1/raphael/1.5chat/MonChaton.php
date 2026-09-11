<?php

class MonChaton
{

    // constructeur avec promotion des propriétés
    public function __construct(
        // les propriétés sont déclarées depuis le constructeur (PHP 8.0)
        public string $nom,
        private int $age
    ) {}

    // création d'un getter, c'est une méthode publique
    // permettant de récupérer une propriété private ou protected
    // règle de nommage get{NomPropriété} + la propriété avec la première lettre en majuscule
    public function getAge(): int
    {
        return $this->age;
    }


    // setter
    public function setAge(int $i): void
    {
        if ($i < 0) {
            echo '⛔ Un âge négatif ? Non. On garde ' . $this->age . '.';
            return;
        }

        if ($i > 38) {
            echo '⛔ Le plus vieu chat a 38 ans arrete de mentir ' . $this->age . '.';
            return;
        }


        $this->age = $i;
    }


    //méthodes

    public function miauler(): string
    {
        return "Miaou !";
    }
    public function sePresenter(): string
    {
        return 'Je suis ' . $this->nom . ' et j\'ai ' . $this->age . ' ans.';
    }


}
