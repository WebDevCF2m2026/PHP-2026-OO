<?php

class De{
    // propriétés
    public readonly int $faces;
    private ?int $dernierLancer = null; 

    // méthodes
    // constructeur
    public function __construct(int $facedDe = 6)
    {
        $this->faces = $facedDe;
    }

    public function __toString():string
    {
        return (is_null($this->dernierLancer))? "🎲 Dé à {$this->faces} faces (jamais lancé)": "🎲 Dé à {$this->faces} faces  → {$this->dernierLancer} ";
    }

    public function lancer():int
    {
        return $this->dernierLancer = mt_rand(1,$this->faces);
    }


}