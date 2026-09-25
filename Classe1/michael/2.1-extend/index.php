<?php
// nécessaire avant chien
require_once "Animal.php";
// classe extend de Animal
require_once "Chien.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <pre><code>$animal = new Animal("LaChose");
echo "Mon animal se nomme ".$animal->getName();
echo $animal->manger();</code></pre>
    <?php
    $animal = new Animal("LaChose");
    echo "Mon animal se nomme ".$animal->getName();
    echo "<br>".$animal->manger();
    // 2.4
    echo "<br>".$animal->crier();
    // non possible echo $animal->aboyer();
?><br>
    <pre><code>$chien = new chien("Rex");
echo "Mon chien se nomme ".$chien->getName();
echo $chien->manger();
echo $chien->aboyer();</code></pre>
    <?php
    $chien = new Chien("Rex");
    echo "Mon chien se nomme ".$chien->getName();
    echo "<br>".$chien->manger();
    echo "<br>".$chien->aboyer();
    // 2.4
    echo "<br>".$chien->crier();
?><br>
<hr>
<?php
    var_dump($animal,$chien);
    ?>
</body>
</html>