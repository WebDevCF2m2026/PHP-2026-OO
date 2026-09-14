<?php
// Un utilisateur représenté par un tableau associatif
$user = [
    'name'  => 'Aline',
    'email' => 'aline@example.com',
];

// Une fonction qui travaille sur ce tableau
// le void indique qu'il n'y a pas de return
function afficherUser(array $user): void
{
    echo $user['name'] . ' (' . $user['email'] . ')';
}

afficherUser($user);
/*

Orienté objet

*/
// Creation d'un eclasse, c'est un "usine" a créer des Users
class User
{
    // Méthode (fonction) publique appelée lors
    // d'une instanciation (new)
    // private ne permet qu'à la classe actuelle de 
    // lire et modifier un paramètre
    public function __construct(
        // promotion de propiétés dans le constructeur
        // depuis PHP 8.0 => raccouci le code 
        private string $name,
        private string $email,
    ) {}

    //Méthode publique qui va afficher une chaine de caractère
    // void car pas de retour 
    public function afficher(): void
    {
        // le $this représante l'objet créé à partie de new User(...)
        // représante l'instance (objet) et pas la classe
        echo $this->name . ' (' . $this->email . ')';
    }
}
echo "<br>";
// instanciation d'une objet de type User
$user = new User('Aline', 'aline@example.com');
$user2 = new User('Yuliia', 'yuliia.25@example.com');
$user->afficher();
echo "<br>";
$user2->afficher();
// si private
// $user->name="Alain";
