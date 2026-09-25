<?php

// Sauvegarde/charge un Tamagotchi dans un fichier JSON, un fichier par joueur
class Sauvegarde {
    private static function dossier(): string {
        return __DIR__ . '/saves';
    }

    private static function fichier(string $idJoueur): string {
        // On ne garde que des caractères simples dans le nom de fichier, par sécurité
        $idPropre = preg_replace('/[^a-zA-Z0-9]/', '', $idJoueur);

        return self::dossier() . '/' . $idPropre . '.json';
    }

    public static function charger(string $idJoueur): ?Tamagotchi {
        $chemin = self::fichier($idJoueur);

        if (!file_exists($chemin)) {
            return null;
        }

        $donnees = json_decode(file_get_contents($chemin), true);

        if (!is_array($donnees)) {
            return null;
        }

        return Tamagotchi::fromArray($donnees);
    }

    public static function sauvegarder(string $idJoueur, Tamagotchi $tamagotchi): void {
        if (!is_dir(self::dossier())) {
            mkdir(self::dossier(), 0777, true);
        }

        file_put_contents(self::fichier($idJoueur), json_encode($tamagotchi->toArray(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    public static function supprimer(string $idJoueur): void {
        $chemin = self::fichier($idJoueur);

        if (file_exists($chemin)) {
            unlink($chemin);
        }
    }
}
