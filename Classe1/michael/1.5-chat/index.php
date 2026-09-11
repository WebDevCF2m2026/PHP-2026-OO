<?php

require_once 'MonChaton.php';


// instanciation (création d'un objet, nommé instance) de MonChaton dans $mon_premier_chaton (lien symbolique, qui pointe vers l'objet)

$mon_premier_chaton = new MonChaton(
    nom:"Grosminet ", 
    age: 5
);

// on vérifie public function sePresenter() qui affiche des propriétés public et private
echo $mon_premier_chaton->sePresenter();
echo "<br>";
// impossible d'afficher age directement car private
//echo $mon_premier_chaton->age;
echo "<h3>getter</h3><p>Pour récupérer une propriété non publique</p>";
// concaténation spéciale orientée objet
echo "Getter de age : {$mon_premier_chaton->getAge()}<br>";

echo "<h3>setter</h3><p>Pour modifier une propriété non publique</p>";

// modification de l'âge à 8 ans
$mon_premier_chaton->setAge(i: 8);
echo "Getter de age : {$mon_premier_chaton->getAge()}<br>";

// modification de l'âge à -5 ans
$mon_premier_chaton->setAge(i: -5);
echo "Getter de age : {$mon_premier_chaton->getAge()}<br>";

// modification de l'âge à 38 ans
$mon_premier_chaton->setAge(i: 38);
echo "Getter de age : {$mon_premier_chaton->getAge()}<br>";

// attention, copie ne clône pas l'instance, il rajoute un lien vers le même objet
$copie = $mon_premier_chaton;

//$copie->nom ="Titi"; // change l'instance les 2 liens, car même objet

var_dump(
    $mon_premier_chaton,
    //$copie,
    );