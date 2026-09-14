<?php
class Playlist
{
    public array $chansons = [];
    public string $artiste = '';
    private int $total = 0;

    //Méthodes
    public function ajouter(Chanson $chanson): void
    {
        $this->chansons[] = $chanson;
    }
    public function afficher(): void
    {
        
        $content = "";
        foreach($this->chansons as $chanson){
            // on ajoute le contenu du morceau à la playlist sans les secondes
            $content .= "$chanson->titre - $chanson->artiste ";
            // on convertit les secondes avec formaterDuree
            $temps = $this->formaterDuree($chanson->duree);
            // on le rajoute à $content
            $content .= "($temps)<br>";
            // on ajoute le temps en seconde via dureeTotale
            $this->dureeTotale($chanson->duree);
        }
        echo $content;
    }
    public function dureeTotale(int $seconde = 0): int
    {
        $this->total += $seconde;
        return $this->total;
    }
    public function formaterDuree(int $secondes): string {
        $minutes=intdiv($secondes,60);
         $minutes=str_pad((string) $minutes, 2, '0', STR_PAD_LEFT);
        $restSeconds=$secondes % 60;
         $restSeconds=($restSeconds<10)?"0".$restSeconds:(string)
         $restSeconds;
        return "$minutes:$restSeconds";
    }

 
}
