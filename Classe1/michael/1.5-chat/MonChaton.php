<?php

class MonChaton{

    // constructeur avec promotion des propriétés
    public function __construct(
        // les propriétés sont déclarées depuis le constructeur (PHP 8.0)
        public string $nom,
        private int $age
    )
    {
        
    }

    /**
     * GETTER
     */

    // création d'un getter, c'est une méthode publique
    // permettant de récupérer une propriété private ou protected
    // règle de nommage get{NomPropriété} + la propriété avec la première
    // lettre en majuscule
    public function getAge():int
    {
        // retour de la propriété privée
        return $this->age;
    }

    /**
     * SETTER (MUTATOR)
     */
    // création d'un setter, c'est une méthode publique
    // permettant de modifier une propriété private ou protected
    // règle de nommage set{NomPropriété}(valeur) + la propriété avec la première
    // lettre en majuscule
    // Permet de sécuriser les données passée à la propriété
    public function setAge(int $i):void
    {
        // si l'age est inférieur à 0 on ne la change pas (version sans message d'erreurs) et
        // on arrête le script avec un return vide (void)
        if($i<0) return ;
        // erreur non silencieuse
        if($i>30){
            echo "Age trop élevé pour un chat !";
            return;
        }
        // on modifie l'age
        $this->age = $i;
    }

    // méthodes
    public function miauler(): string
    {
        return "Miaou !";
    }
    public function sePresenter(): string
    {
        return 'Je suis ' . $this->nom . ' et j\'ai ' . $this->age . ' ans.';
    }
}