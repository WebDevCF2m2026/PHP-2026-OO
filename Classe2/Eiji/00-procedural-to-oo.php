<?php
// version procédural 
$user = [
    'name'  => 'Aline',
    'email' => 'aline@example.com',
];

// Une fonction qui travaille sur ce tableau
function afficherUser(array $user): void
{
    echo $user['name'] . ' (' . $user['email'] . ')<br>';
}

afficherUser($user);

// version orienté objet 
// la classe est un eusine a créer des User
class User
{
    // le constructeur est un méthode magique (fonction)
    // invoqué lors de l'instanciation (new)
    public function __construct(
        // depuis PHP 8.0, on peut faire une promotion 
        // des propriétés(variable) directement dans
        // le constructeur
        private string $name,
        private string $email,
    ) {}

    // méthode publique (fonction) qui permet d'afficher 
    // le nom et le mail, ! echo n'est pas un retour valide,
    // d'où le void, il faut un return pour avoir un retour valide
    public function afficher(): void // void = vide
    {
        echo $this->name . ' (' . $this->email . ')';
    }
}

// instanciation d'un objet $user (pas une variable, mais un pointeur(ou flag))
// les arguments passés entre () sont traités par le __construct()
$user = new User('Aline', 'aline@example.com');
// appel d'une méthode publique 
$user->afficher();