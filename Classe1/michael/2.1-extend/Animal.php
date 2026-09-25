<?php


class Animal{
    // Propriétés
    private string $secret = 'je fais semblant de dormir'; // private ne peut être modifié ou vu dans les enfants sauf si on a crée des getters et setters public dans Animal
    protected ?string $name = null;// protected

    // Méthodes

    // constructeur
    public function __construct(string $lulu)
    {
        $this->setName($lulu);
    }

    // Méthodes utilisateur
    public function manger(): string
    {
        return "{$this->name} mange sa classe:".self::class;
    }
    // méthode faite pour être héritée, 
    public function crier(): ?string
    {
        return self::class." ne peut pas crier";
    }

    // setter (ou mutator)
    public function setName(string $nom):void
    {
        // protection de sécurite
        $nom = strip_tags(trim($nom));
        // longueur de chaîne
        $longueur = strlen($nom);
        // trop petit
        if($longueur < 2)
            // Exception
            throw new Exception("Votre nom est trop court");
        // trop long    
        if($longueur > 25)
            // Exception
            throw new Exception("Votre nom est trop long");

        // modification du name 
        $this->name = $nom;
    }

    // getter
    public function getName():string
    {
        // récupération du nom
        return $this->name;
    }
}