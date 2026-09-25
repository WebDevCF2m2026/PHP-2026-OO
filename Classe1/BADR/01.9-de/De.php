<?php
// Classe représentant un dé de jeu de rôle
class De
{
    // null tant que le dé n'a jamais été lancé
    private ?int $dernierLancer = null;

    // readonly : le nombre de faces ne peut plus changer après le new
    public function __construct(public readonly int $faces = 6) {}

    // fabrique statique : renvoie un dé déjà configuré à 6 faces
    public static function classique(): static
    {
        return new static(6);
    }

    // fabrique statique : le dé à 20 faces des donjons
    public static function deDonjon(): static
    {
        return new static(20);
    }

    // tire un nombre entre 1 et le nombre de faces
    public function lancer(): int
    {
        $this->dernierLancer = random_int(1, $this->faces);
        return $this->dernierLancer;
    }

    // lance deux fois et garde le meilleur résultat
    public function lancerAvantage(): int
    {
        return max($this->lancer(), $this->lancer());
    }

    // appelée automatiquement quand on fait echo $de
    public function __toString(): string
    {
        if ($this->dernierLancer === null) {
            return "🎲 Dé à {$this->faces} faces (jamais lancé)";
        }
        return "🎲 Dé à {$this->faces} faces → {$this->dernierLancer}";
    }
}
