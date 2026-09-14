<?php

require_once "chat.php";


$chat = new Chat('Félix', 3);
$chat2 = new Chat('Grosminet', 5);

echo "Nom : $chat->nom " . PHP_EOL;
echo "<br>";
echo "Âge : " . $chat->getAge() . " " . PHP_EOL;
echo "<br>";

echo $chat->miauler() . PHP_EOL;
echo "<br>";
echo $chat->sePresenter() . PHP_EOL;
echo "<br>";
echo $chat2->sePresenter() . PHP_EOL;

echo "<br>";
$chat->setAge(4);
echo $chat->getAge() . PHP_EOL;   

$chat->setAge(-50);               
echo $chat->getAge() . PHP_EOL;   

echo "<br>";


