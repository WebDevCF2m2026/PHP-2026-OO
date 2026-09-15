<?php
require_once "chat.php";

$chat = new Chat();
$chat2 = new Chat("Grosminet",5);

$chat->setNom("Félix");
$chat->setAge(3);
echo $chat->getNom() . PHP_EOL;
echo $chat->getAge() . PHP_EOL;
echo $chat->miauler() . PHP_EOL;
echo $chat->sePresenter() . PHP_EOL;
?>
</br>
<?php
echo $chat2->getNom() . PHP_EOL;
echo $chat2->getAge() . PHP_EOL;