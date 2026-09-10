
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

#orienté objects
// le constructeur est methode magique (fonction)
class User
{
    // invoque lors de l instanciation (new)
    public function __construct(
        //depuis php 8 on peut faire une promotion
        //des propriete (variable) directement dans 
        //le constructeur 
        private string $name,
        private string $email,
    ) {}
    //methode public  qui permet d afficher le nom
    // et le mail
    //et le mail et echo n est pas un retour valide d ou le 
    //void, il faut un return pour avoir un retour
    public function afficher(): void // void signifie vide
    {
        echo $this->name . ' (' . $this->email . ')';
    }
}

$user = new User('Aline', 'aline@example.com');
$user->afficher();