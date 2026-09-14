<?php
/*
Procédural
*/

// Un utilisateur représenté par un tableau associatif
$user = [
    'name'  => 'Aline',
    'email' => 'aline@example.com',
];

// Une fonction qui travaille sur ce tableau
// Le void indique qu'il n'y a pas de return 
function afficherUser(array $user): void
{
    echo $user['name'] . ' (' . $user['email'] . ')';
}

afficherUser($user);

/*
Orienté Objets
*/

// Création d'une classe, c'est une "usine" a créer des Users

class User
{
    // Méthode (fonction) public appelée lors d'une instanciation (new)    
    public function __construct(
        // Promotion de propriétés dans le constructeur
        // ne fonctionne qu'à partir de PHP 8.0 = raccourci le code
        // Private ne permet qu'à la classe actuelle de lire et modifier un paramètre 
        private string $name,
        private string $email,
    ) {}

    // Méthode public qui va afficher une chaine de cara 
    // void car pas de retour 
    public function afficher(): void
    {
        // Le this représente l'objet créer à partir de new User(...)
        // Représente l'instance (objet) et pas la classe 
        echo $this->name . ' (' . $this->email . ')';
    }
}

echo "<br>";

//Instanciation d'un objet de type User
$user = new User('Aline', 'aline@example.com');
// Si private 

$user->afficher();

// var_dump($user);