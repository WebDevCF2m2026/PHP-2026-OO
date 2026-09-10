<?php
// Un utilisateur représenté par un tableau associatif
$user = [
    'name'  => 'Aline',
    'email' => 'aline@example.com',
];

// Une fonction qui travaille sur ce tableau
function afficherUser(array $user): void
{
    echo $user['name'] . ' (' . $user['email'] . ')';
}

afficherUser($user);

#Orienté objet

// la calsse est une usine à créer des User
class User
{
    //le constructeur est une méthode magique (fonction)
    //invoquée lors de l'instanciation (new)
    public function __construct(
        //depuis PHP 8.0, on peu faire une promotion
        //des propriétés (variables) directmeent dans 
        //le constructeur 
        private string $name,
        private string $email,
    ) {}

    //method publique qui permet d'afficher le nom
    // et le mail, ! echo n'est pas un retour valid, d'où le 
    // void, iml faut un  
    public function afficher(): void // void signifie vide 
    {
        echo $this->name . ' (' . $this->email . ')';
    }
}

$user = new User('Aline', 'aline@example.com');
$user->afficher();