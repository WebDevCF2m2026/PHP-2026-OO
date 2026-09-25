<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercices de 1.1 à 1.7</title>
</head>
<body>
    <h2>Exercices de 1.1 à 1.7</h2>
    <h3>Bonne pratique</h3>
    <p>On crée une classe dans un fichier portant le même nom que la classe, on met une classe unique dans le fichier, le nom de la classe (et donc du fichier) est en PascalCase</p>
    <pre><code>class Chat{} // dans Chat.php </code></pre>
    <?php
    // appel de la classe chat
    require "Chat.php";
    ?>
    <h3>1.1</h3>
    <h3>Appel de la classe manuellement</h3>
    <pre><code>require "Chat.php";</code></pre>
    <h3>Création de 2 propriétés publiques</h3>
    <p>Ce sont des 'variables' dans la classe</p>
    <pre><code>class Chat{

    // propriétés
    public string $nom = "Anonyme";
    public int $age = 0;

}</code></pre>
<h3>Instanciation de la classe</h3>
<pre><code>$chat1 = new Chat();</code></pre>
<?php
$chat1 = new Chat();
?>
<p>Les <strong>propriétés publiques peuvent être lues en dehors</strong> de l'instance de la classe</p>
<?php
echo 'echo $chat1->nom; // ' . $chat1->nom . "<br>";
echo 'echo $chat1->age; // ' . $chat1->age . "<br>";
?>
<p>Les <strong>propriétés publiques peuvent être modifiées en dehors</strong> de l'instance de la classe (objet)</p>
<?php
$chat1->nom = "Félix";
$chat1->age = 3;
?>
<pre><code>$chat1->nom = "Félix";
$chat1->age = 3;</code></pre>
<?php
echo 'echo $chat1->nom; // ' . $chat1->nom . "<br>";
echo 'echo $chat1->age; // ' . $chat1->age . "<br>";
?>
<h3>1.2</h3>
<p>Une méthode est un fonction dans la classe</p>
<pre><code>class Chat{

    // propriétés
    public string $nom = "Anonyme";
    public int $age = 0;

    // méthodes
    public function miauler(): string
    {
        return 'Miaou!';
    }
}</code></pre>
<p>Affichage des propriétés et de la méthode publique</p>
<?php
echo 'echo $chat1->nom; // ' . $chat1->nom . "<br>";
echo 'echo $chat1->age; // ' . $chat1->age . "<br>";
echo 'echo $chat1->miauler(); // '. $chat1->miauler() .'<br>';
?>
<h3>1.3</h3>
<h3>Utilisation du $this</h3>
<p>Le $this représente l'instance actuelle de la classe (l'objet $chat1)</p>
<pre><code>class Chat{

    // propriétés
    public string $nom = "Anonyme";
    public int $age = 0;

    // méthodes
    public function miauler(): string
    {
        return 'Miaou!';
    }
    public function sePresenter(): string
    {
        // avec les "" on peut concaténer les propriétés sans les .
        return "Je suis $this->nom et j'ai $this->age an(s)";
    }
}</code></pre>
<?php
echo '$chat1->sePresenter(); // '. $chat1->sePresenter()."<br>";
?>
<p>Pour prouver que $this repésente bien l'instance (objet) de la classe Chat</p>
<?php
echo '<pre><code>$chat2 = new Chat();
echo $chat2->sePresenter();</code></pre>';
$chat2 = new Chat();
echo $chat2->sePresenter();
?>
<h3>1.4</h3>
<p>Pour éviter les bugs des exercices 1.1 à 1.3</p>
<p>Je vais créer une nouvelle classe qui est une copie de Chat, nommée ChatRoux</p>
<?php
// appel de la classe chatRoux
require "ChatRoux.php";
// instanciation d'un ChatRoux
$chat3 =  new ChatRoux();
?>
<pre><code>// appel de la classe chatRoux
require "ChatRoux.php";
// instanciation d'un ChatRoux
$chat3 =  new ChatRoux(!!!);</code></pre>

<?php
var_dump($chat1,$chat2,$chat3);
?>
</body>
</html>