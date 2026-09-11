<?php

class Chat {
    public function __construct(
        public string $nom,
        private int $age,
    ) {}

    public function miauler():string {
        return 'Miaou !';
    }

    public function sePresenter():string {
        return 'Je suis ' . $this->nom . ' et j\'ai ' . $this->age . ' ans.';
    }

    public function getAge(): int {
        return $this->age;
    }

    public function setAge(int $age): void {
        if ($age < 0) {
            echo '⛔ Un âge négatif ? Non. On garde ' . $this->age . '.' . PHP_EOL;
            return;
        }
        $this->age= $age;
    }
}

