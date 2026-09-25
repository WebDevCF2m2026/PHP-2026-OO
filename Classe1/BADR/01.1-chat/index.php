<?php
require_once 'ChaTon.php';

// Création de deux chatons
$chaton1 = new ChaTon('Michmich', 'blanc', 5);
$chaton2 = new ChaTon('Mimiche', 'noir', 3);

$chaton1->miauler();
$chaton2->miauler();
