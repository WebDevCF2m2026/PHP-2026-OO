<?php 

class Tamagotchi {

    private string $nom = "";
    private int $faim = 50;

    public function __construct(string $nom)
    {
        $this->nom = $nom;
    }

    private function borner(int $valeur): int
    {
        return max(0, min(100, $valeur));
    }

    public function manger(): void 
    {
        $this->faim = $this->borner($this->faim - 20);
    }

    public function jouer(): void 
    {
        $this->faim = $this->borner($this->faim + 15);
    }

    public function __toString(): string 
    {
    return "🐣 {$this->nom} a une faim de {$this->faim}/100";
    }

}



