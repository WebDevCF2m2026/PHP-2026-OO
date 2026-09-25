<?php
class Chat
{
    public string $nom = "";
    public int $age = 0;
    public function __construct(string $nom = "sans nom", int $age = 0)
    {
        $this->nom = $nom;
        $this->age = $age;
    }
    public function setNom(string $nom)
    {
        $this->nom = $nom;
    }
    public function setAge(string $age)
    {
        if ($age < 0) {
            echo '⛔ Un âge négatif ? Non. On garde ' . $this->age . '.' . PHP_EOL;
            return;
        }
        $this->age = $age;
    }
    public function miauler(): string
    {
        return 'Miaou !';
    }
    public function sePresenter(): string
    {
        return 'Je suis ' . $this->nom . ' et j\'ai ' . $this->age . ' ans.';
    }
     public function getAge(): int
    {
        return $this->age;
    }
     public function getNom(): string
    {
        return $this->nom;
    }
}
