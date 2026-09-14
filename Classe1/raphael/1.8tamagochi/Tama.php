<?php

class Tama
{
    public function __construct(
        private string $nom,
        private int $faim = 50,
    ) {
        $this->nom = $nom;
    }

    public function getFaim(): int
    {
        return $this->faim;
    }

    public function manger()
    {
        return $this->borner($this->faim - 20);
    }

    public function jouer()
    {
        $this->borner($this->faim + 15);
    }

    public function etat()
    {
        $etat = "🐣 {$this->nom} a une faim de {$this->faim}/100";
        return $etat;
    }

    private function borner(int $valeur): int
    {
        return max(0, min(100, $valeur));
    }
}
