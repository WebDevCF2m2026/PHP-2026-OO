<?php

// la classe est écrite en PascalCase
// elle n'est pas un objet en tant que tel
// mais plutôt une fabrique à créer des objets
class MyFirstClass{

    // Propriétés (variables de la classe), plus souvant du camelCase
        // publique (accessible et modifiable en dehors de la classe)
        public string $name ='';
        // private (accessible et modifiable que dans la classe ou son instance)
        private string $surName='';
        // protected (accessible et modifiable 
        // que dans la classe ou son instance ET/OU dans
        // ses enfants => "héritage")
        protected ?int $identifiant = null; // null ou int ?int


    // Constantes (Conteneurs invariables de la classe)
        const IS_ALIVE = true; // par défaut publique, typage autorisé à partir de PHP 8.3


    // Méthodes (fonctions de la classe)
        // constructeur => passer des arguments à l'instance de classe
        // est toujours publique et utilise la méthode magique __construct(arg)
        // est invoqué lors de l'instanciation (new)
        public function __construct()
        {
            // self::class représente le nom de la class, donc de la fabrique
            echo "on a crée une instance de ".self::class;
        }

        // méthode publique
        public function methodePublique(): string
        {
            // on peut l'utiliser pour afficher ou modifier 
            // les propriétés

            // modification des propriétés (set)
            $this->name ="Pitz";
            $this->surName = "Michaël";
            $this->identifiant = mt_rand(1000000, 9999999);

            // affichage de celles-ci (get)
            return $this->name." ".$this->surName. " a comme identifiant ".$this->identifiant. " et commence à avoir faim";

        }
}

// instanciation de $first
$first = new MyFirstClass();
echo "<hr>";
// appel d'une constante de classe
// echo $first::IS_ALIVE; // partir de l'instance n'est recommendé
echo MyFirstClass::IS_ALIVE;
echo "<hr>";
echo $first->methodePublique();
echo "<hr>";
var_dump($first);