<?php

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

echo ("</br>");

/* Orienté Objet */

// Création d'une classe, c'est une "usine" à créer des Users

class User
{
    // Méthode (fonction) publique appelée lors 
    // d'une instanciation (new)
    public function __construct(
        // Promotion de propriétés dans le constructeur
        // depuis PHP 8.0 => raccourci le code 
        // Private ne permet qu'à la classe actuelle de 
        // lire et modifier un paramètre
        private string $name,
        private string $email,
    ) {}

    // Méthode publique qui va afficher une chaine de caractère
    // Void car pas de retour 
    public function afficher(): void
    {
        // le $this représente l'objet créé à partir de new User(...)
        // Réprésente l'instance (objet) et pas la classe
        echo $this->name . ' (' . $this->email . ')';
    }
}
echo ("</br>");
// Instanciation d'un objet de type User
$user = new User('Aline', 'aline@example.com');



$user->afficher();