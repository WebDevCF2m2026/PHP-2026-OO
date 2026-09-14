<?php 

// La classe est écrite en PascalCase
// Elle n'est pas un objet en tant que tel
// Mais plutôt une factory à créer des objets

class MyFirstClass{

    // Propriétés (variables de la classe), plus souvent du camelCase
        // Publique (accessible et modifiable en dehors de la classe)
        public string $name ='';
        // Publique (accessible et modifiable que dans la classe)
        private string $surName ='';
        // protected (accessible et modifiable
        // que dans la classe ou son instance ET/ ou
        // dans ses enfants => "héritage")
        protected ? int $identifiant = null; // null ou int ?int

    // Constantes (conteneur invariable de la classe)
    const IS_ALIVE = true; // par défaut publique, typage autorisé à partir de php 8.3


    // Méthodes (fonctions de la classe)
        // Constructeur => passer des arguments à l'instance de classe
        // Toujours publique et utilise la méthode magique __construct()
        // est invoque l'instanciation de (new)
        public function __construct()
        {
            // self::class représente le nom de la class, donc de la fabrique
            echo "on a crée une instance de ".self::class;
        }


}

// instanciation de $first
$first = new MyFirstClass();
echo "<hr>";
// Appel d'une constance de classe
// echo $first::IS_ALIVE; // Partir de l'instance n'est pas recommandé
echo MyFirstClass::IS_ALIVE;
echo "<hr>";
var_dump($first);