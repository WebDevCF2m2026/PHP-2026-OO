<?php


class Chat
{
    public string $nom = 'Sans nom';
    public int $age = 0;

    public function __construct(string $nom, int $age)
    {
        $this->nom = $nom;
        $this->age = $age;
    }

    public function miauler(): string
    {
       return "miaou !";
    }

    public function sePresenter(): string 
    {
        return 'Je suis ' . $this->nom . ' et j\'ai ' . $this->age . ' ans.';
    }
}


$chat = new Chat('Félix', 3);// exo 1.4 
$chat2 = new Chat('Grominet', 5);// exo 1.4 

echo $chat->nom = 'Felix' . PHP_EOL . '<br>';
echo $chat->age = 3 . PHP_EOL;// exo 1.1
echo $chat->miauler(). PHP_EOL;// exo 1.2
echo $chat->sePresenter(). PHP_EOL; // exo 1.3
echo $chat2->sePresenter(). PHP_EOL; // exo 1.4
