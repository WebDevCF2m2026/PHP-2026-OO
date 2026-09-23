<?php

class Chat
{
    public string $nom = 'Sans nom';
    public int $age = 0;
}

$chat = new Chat();

echo $chat->nom . PHP_EOL;
echo $chat->age . PHP_EOL;