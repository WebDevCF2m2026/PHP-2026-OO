<?php
// appel de la classe
require_once "Chat.php";

// instanciation d'un chat, attends 2 arguments dès la création
// du constructeur 1.4
$chat = new Chat("Tom",5);

// affichage de propriétés publiques
echo "Nom : $chat->nom | Age : $chat->age<br>";

// les propiétés publiques sont modifiables depuis l'extérieur de la classe
$chat->nom = "Félix";
$chat->age = 3;

echo "Nom : $chat->nom | Age : $chat->age<br>";

// appel d'une méthode publique 
echo "Nom : $chat->nom | Age : $chat->age | fait : {$chat->miauler()}<br>";

// appel d'une autre méthode publique qui affiche des propriétés
echo $chat->sePresenter()."<br>";

// 1.4
$chat2 = new Chat(
    age:4,
    nom: 'Jacques'
);

echo $chat2->sePresenter()."<br>";