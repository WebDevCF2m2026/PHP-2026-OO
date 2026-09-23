<?php
// VERSION rocédurale
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

// VERSION Orienté objet

// la classe est une usine à créer des User
class User
{
    // le constructeur est méthode magique (fonctin)
    // invoquée lors de l'instanciation (new)
    public function __construct(
        // on peut faire une promotion des 
        // propriétés (variantions) directement
        // dans le constructeur
        private string $name,
        private string $email,
    ) {}

    // méthode publique (fonction) qui permet d'afficher le nom
    // et le mail, ! echo n'est pas un retour valide d'ou le 
    //void, il faut un return pour avoir un retour valide
    public function afficher(): void //vois signifie vide
    {
        echo $this->name . ' (' . $this->email . ')';
    }
}

// instanciation d'un objet $user (pas une variable, mais un pointer (ou flag)
$user = new User('Aline', 'aline@example.com');
$user->afficher();