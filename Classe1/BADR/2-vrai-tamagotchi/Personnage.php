<?php

// Représente une espèce de Tamagotchi que l'on peut choisir
class Personnage {
    public function __construct(
        public readonly string $id,
        public readonly string $nomEspece,
        public readonly string $emoji,
        public readonly array $emojisEvolution, // [1 => bébé, 2 => jeune, 3 => adulte]
        public readonly string $cri,
        public readonly string $touche,
        public readonly string $labelManger,
        public readonly string $labelJouer,
        public readonly string $couleur,
        public readonly string $reactionManger,
        public readonly string $reactionJouer,
        public readonly string $reactionCritique,
        public readonly string $reactionMort,
    ) {}

    // L'émoji change selon le stade d'évolution (1 = bébé, 2 = jeune, 3 = adulte)
    public function emojiPourStade(int $stade): string {
        return $this->emojisEvolution[$stade] ?? $this->emoji;
    }

    // La liste de toutes les espèces disponibles au choix
    public static function tous(): array {
        return [
            new self(
                id: 'chat',
                nomEspece: 'Chat',
                emoji: '🐱',
                emojisEvolution: [1 => '🐾', 2 => '🐱', 3 => '🐈'],
                cri: 'Miaou !',
                touche: 'm',
                labelManger: '🍗 Donner à manger',
                labelJouer: '🧶 Jouer avec la pelote',
                couleur: '#ffb454',
                reactionManger: 'Ronron... miam, merci !',
                reactionJouer: 'Miaou, encore une fois !',
                reactionCritique: 'Miaaaou... j\'ai trop faim...',
                reactionMort: 'Le chat s\'est endormi pour toujours...',
            ),
            new self(
                id: 'chien',
                nomEspece: 'Chien',
                emoji: '🐶',
                emojisEvolution: [1 => '🐾', 2 => '🐶', 3 => '🐕'],
                cri: 'Wouf !',
                touche: 'w',
                labelManger: '🦴 Donner un os',
                labelJouer: '🎾 Lancer la balle',
                couleur: '#6bcf63',
                reactionManger: 'Wouf wouf, trop bon !',
                reactionJouer: 'Wouf ! Encore, encore !',
                reactionCritique: 'Wouf... j\'ai tellement faim...',
                reactionMort: 'Le chien n\'a plus la force de remuer la queue...',
            ),
            new self(
                id: 'dragon',
                nomEspece: 'Dragon',
                emoji: '🐉',
                emojisEvolution: [1 => '🥚', 2 => '🐲', 3 => '🐉'],
                cri: 'Grrraaaw !',
                touche: 'f',
                labelManger: '🔥 Nourrir de braises',
                labelJouer: '🛫 Voler ensemble',
                couleur: '#ff5c5c',
                reactionManger: 'Miam, ces braises étaient délicieuses !',
                reactionJouer: 'Grraaaw, on revole tout de suite !',
                reactionCritique: 'Grrr... mes flammes s\'éteignent...',
                reactionMort: 'Le dragon s\'est éteint pour de bon...',
            ),
            new self(
                id: 'renard',
                nomEspece: 'Renard',
                emoji: '🦊',
                emojisEvolution: [1 => '🐾', 2 => '🦊', 3 => '🦊'],
                cri: 'Ring-ding-ding !',
                touche: 'r',
                labelManger: '🍇 Donner des baies',
                labelJouer: '🍂 Sauter dans les feuilles',
                couleur: '#ff8c42',
                reactionManger: 'Miam, des baies bien sucrées !',
                reactionJouer: 'Hihi, encore un saut dans les feuilles !',
                reactionCritique: 'J\'ai la tête qui tourne, j\'ai trop faim...',
                reactionMort: 'Le renard a fermé les yeux pour toujours...',
            ),
            new self(
                id: 'robot',
                nomEspece: 'Robot',
                emoji: '🤖',
                emojisEvolution: [1 => '🔩', 2 => '🤖', 3 => '🦾'],
                cri: 'Bip bip !',
                touche: 'b',
                labelManger: '🔋 Recharger',
                labelJouer: '🕹️ Jouer aux jeux vidéo',
                couleur: '#4ea1ff',
                reactionManger: 'Bip, batterie rechargée à fond !',
                reactionJouer: 'Bip bip, mode fun activé !',
                reactionCritique: 'Bip... batterie critique...',
                reactionMort: 'ERROR 404 : énergie introuvable.',
            ),
            new self(
                id: 'fantome',
                nomEspece: 'Fantôme',
                emoji: '👻',
                emojisEvolution: [1 => '🫧', 2 => '👻', 3 => '👻'],
                cri: 'Bouh !',
                touche: 'o',
                labelManger: '🍬 Offrir des bonbons',
                labelJouer: '🌙 Hanter la maison',
                couleur: '#c084fc',
                reactionManger: 'Hihi, merci pour les bonbons !',
                reactionJouer: 'Bouh, c\'était trop amusant !',
                reactionCritique: 'Bouhouhou... je m\'évanouis...',
                reactionMort: 'Le fantôme a disparu pour toujours...',
            ),
        ];
    }

    // Retrouve une espèce à partir de son identifiant
    public static function trouver(string $id): ?self {
        foreach (self::tous() as $personnage) {
            if ($personnage->id === $id) {
                return $personnage;
            }
        }

        return null;
    }
}
