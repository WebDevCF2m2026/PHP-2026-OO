<?php

require_once 'MonChaton.php';


// instanciacion (création d'un objet, nommé instance) de Mon Chaton dans $mon_premier_chaton (lien symbolique, qui pointe vers l'objet)

$mon_premier_chaton = new MonChaton(
    nom :"Grosminet ",
    age : 5
);

// on verifie public function sePresenter() qui affiche des propriété public et private
echo $mon_premier_chaton->sePresenter();
echo "<hr>";
echo $mon_premier_chaton->getAge();
echo "<hr>";

var_dump($mon_premier_chaton);
echo "<hr>";
$mon_premier_chaton->setAge(4);
echo $mon_premier_chaton->getAge();   // 4
echo "<hr>";

$mon_premier_chaton->setAge(-50);               // refusé !
echo $mon_premier_chaton->getAge();   // toujours 4

echo "<hr>";

$mon_premier_chaton->setAge(50);               // refusé !
echo $mon_premier_chaton->getAge();   // toujours 4