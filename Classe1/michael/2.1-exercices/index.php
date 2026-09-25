<?php
/*
require_once "Animal.php";
require_once "Chien.php";
require_once "Chat.php";
*/

// autoload local, valide que dans ce dossier.
spl_autoload_register(function (string $ClassName) {
    // crée le nom du fichier recherché avec le nom de la class
    $file = $ClassName . '.php';

    // si le fichier existe vraiment
    if (file_exists($file)) {
        // on la charge dans notre index.php
        require_once $file;
    }
});

// chargement seulement de la classe Animal
//$animal1 = new Animal();
echo "<br>";
// charge la classe Chien et la classe extends Animal
$chien = new Chien('Rex');
echo "<br>";
//echo $animal1->manger();
echo "<br>";
echo $chien->manger();
echo "<br>";
echo $chien->crier();