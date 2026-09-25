<?php

// Classe représentant un chaton avec ses caractéristiques de base
class MonChaton {
    private string $nom;
    private string $couleur;
    private int $age;

    // Initialise un chaton à sa création (new MonChaton(...))
    public function __construct(string $nom, string $couleur, int $age) {
        $this->nom = $nom;
        $this->couleur = $couleur;
        $this->age = $age;
    }
// creation d'un getter cest une methode publique permettant de recuperer la valeur d'un attribut privé ou protégé de la classe.
    public function getNom(): string {
        return $this->nom;
    }
    // regle de nommage get(Nom de l'attribut) pour recuperer la valeur d'un attribut privé ou protégé de la classe.
    public function getCouleur(): string {
        return $this->couleur;
    }
    // creation d'un getter pour l'âge
    public function getAge(): int {
        return $this->age;
    }
    public function setAge(int $i): void {
        if($i >= 0) {
            $this->age = $i;
        } else {
            echo "L'âge ne peut pas être négatif.<br>";
        }
    }
    // Affiche un message présentant le chaton
    public function sePresenter(): string {
        return "salam alaykoum ! Je suis {$this->nom}, Je suis de couleur {$this->couleur} et j'ai {$this->age} mois.<br>";
    }
}