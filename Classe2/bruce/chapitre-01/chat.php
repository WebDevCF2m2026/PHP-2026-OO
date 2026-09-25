<?php

class Chat
{
    public function __construct(
        public string $nom,
        private int $age,
    ) {}

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
        public function setAge(int $age): void
    {
        if ($age < 0) {
            echo '⛔ Un âge négatif ? Non. On garde ' . $this->age . '.' . PHP_EOL;
            return;
        }

        $this->age = $age;
    }

}

$chat = new Chat('Félix', 3);

$chat2 = new Chat('Grosminet', 5);
 $chat->miauler() .PHP_EOL;
 $chat->sePresenter().PHP_EOL;
  echo "$chat->nom" .PHP_EOL;
echo $chat->getAge() .'<br>';
  echo $chat->miauler() . '<br>';
 echo $chat->sePresenter() . '<br>';
echo $chat2->sePresenter() . '<br>';
echo  $chat->getAge() . '<br>';
$chat->setAge(4);
echo $chat->getAge() . '<br>' ;   // 4

$chat->setAge(-50);               // refusé !
echo $chat->getAge() . '<br>' ;   // toujours 4



 
class Tamagotchi
{
    public function __construct(
        private string $nom,
    ) {} 
    private int $faim = 50;

 public function getNom(): string
    {
        return $this->nom;

    }

         public function getFaim(): int
    {
        return $this->faim;
    }

    public function manger(): void
    {
        $this->faim = $this->borner($this->faim - 20);
    }

    public function jouer(): void
    {
        $this->faim = $this->borner($this->faim + 15);
    }

    private function borner(int $valeur): int
    {
        return max(0, min(100, $valeur));
    }

    public function __toString(): string
    {
        return '🐣 ' . $this->nom . ' a une faim de ' . $this->faim . '/100';
    }

}


$pixel = new Tamagotchi('Pixel');

echo $pixel . '<br>';

$pixel->manger();
echo $pixel . '<br>';

$pixel->jouer();
echo $pixel . '<br>';


for ($i = 0; $i < 10; $i++) {
    $pixel->jouer();
}
echo $pixel . '<br>'; 











