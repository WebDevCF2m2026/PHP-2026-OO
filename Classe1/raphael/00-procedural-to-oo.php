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
// le void indique qu'il n'y a pas de return
function afficherUser(array $user): void
{
    echo $user['name'] . ' (' . $user['email'] . ')';
}

afficherUser($user);


/*

Orienté objet


*/
echo ("</br>");

class User
{
    // méthode (fonction) publique appelée lors
    // d'une instanciation (new)
    public function __construct(
        // promotion de propritétés dans le constructeur
        // depuis php 8.0 => raccourci le code
        // private ne permet qu'a la classe actuel de
        // lire et modifier un paramètre
        private string $name,
        private string $email,
    ) {}

    // méthode publique qui va afficher une chaine de caractère
    // void car pas de retour
    public function afficher(): void
    {
        // le $this représente l'objet créé a partir de new user(...)
        // représente l'instance(objet) et pas l'usine (classe)
        echo $this->name . ' (' . $this->email . ')';
    }
}
echo ("</br>");
// instanciation d'un objet de type User
$user = new User('Aline', 'aline@example.com');
$user2 = new User('Alin', 'aline@example.com');
$user->afficher();
echo ("</br>");

$user2->afficher();