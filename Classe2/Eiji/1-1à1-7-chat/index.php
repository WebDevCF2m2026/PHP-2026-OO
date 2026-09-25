<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Chapitre 1 — Les classes et les objets (de 1.1 à 1.7)</h1>
    <h2>Exercice 1.1</h2>
    <p>On crée une class sans un fichier portant même nom que la class, on met une classe unique dan ske fichier, le
        nom de la classe (et donc du fichier) est en PascalCase.</p>
    <pre><code>class Chat{} // dans Chat.php</code></pre>
    <?php
    // appel de la classe chat
    require "Chat.php";
    ?>
    <pre><code>
            class Chat{
        // propriété
        public string $nom ="Anonyme";
        public int $age = 0;
        }       
        </code></pre>
    <h3>Instanciation de la classe</h3>
    <pre><code>$chat1 = new Chat();</code></pre>
    <?php
    $chat1 = new Chat();
    ?>
    <p>Les propriétés publique peuvent être lues en dehors de l'instance de la classe</p>

    <?php
    echo 'echo $chat1 -> nom // ' . $chat1->nom . "<br>";
    echo 'echo $chat1 -> age // ' . $chat1->age;
    ?>

    <h2>Exercice 1.2</h2>
    <p>Ce sont des 'variables' dasn la classe</p>
    <pre><code>
        class Chat{
        // propriété
        public string $nom ="David";
        public int $age = 3;

        // méthodes
        public function miauler(): string
        {
        return "Miaou!";
        }
    }
        </code></pre>

    <p>Affichage des propriétés et de la méthode publique</p>

    <?php
    echo 'echo $chat1 -> nom // ' . $chat1->nom . "<br>";
    echo 'echo $chat1 -> age // ' . $chat1->age . "<br>";
    echo 'echo $miauler() -> age // ' . $chat1->miauler() . "<br>";
    ?>

    <h2>Exercice 1.3</h2>

    <pre><code>
        class Chat
        {
        // propriété
        public string $nom = "David";
        public int $age = 3;

        // méthodes
        public function miauler(): string
        {
            return "Miaou!";
        }

        public function sePresenter(): string
        {
            // avec les doubles guillemets ("") on peut afficher les propriétés sans les points (.)
            return "je suis $this->nom et j'ai $this->age an(s)";
        }
    }
        </code></pre>

    <?php
    echo '$chat1->sePresenter(); // ' . $chat1->sePresenter()
    ?>
    <p>Pour prouver que $this représente bien l'instance (objet) de la classe Chat</p>
    <?php
    echo'<pre><code>$chat2 = new Chat();
    echo $chat2->sePresenter()</pre></code>';
    $chat2 = new Chat();
    echo $chat2->sePresenter();
    ?>
    

</body>

</html>