<?php
require_once "De.php";

$testDe1 = new De();
$testDe2 = new De(20);

?>
<h1>readonly sans les statiques</h1>
// readonly permet la lecture <br>
echo $testDe1->faces;<br>
<?php
// readonly permet la lecture
echo $testDe1->faces;
?><br>
// readonly ne permet pas la modification<br>
// $testDe1->faces = 12;<br><br>
<?php 
echo $testDe1;
echo '<br>$testDe2->lancer();echo $testDe2;<br>';
$testDe2->lancer();
echo $testDe2;

echo "<hr>";
var_dump($testDe1,$testDe2);