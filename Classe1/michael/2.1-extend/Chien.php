<?php

// classe étendue de animal
class Chien extends Animal{

    // on hérite du constructeur et des méthodes publiques, ainsi que la propriété protected

    // 2.4 on va écraser la méthode manger, attention même visibilité (sauf vers public) et même arguments, même retour ! ?string ne fonctionne pas
    public function manger(): string
    {
        // le self devient Chien plutôt que Animal, et on ajoute 'c'est pas bien'
        return "{$this->name} mange sa classe:".self::class." c'est pas bien";
    }

    // 2.4 on veut overriding (redéfinir) et non pas surcharger
    public function crier(): ?string
    {

        return "Vient du parent : ". parent::crier()." Par contre le chien peut faire Wouf car il est redéfini dans ".self::class;
    }

    // On ajoute à chien la possibilité d'aboyer.
    public function aboyer(): string
    {
        // $this->name est accessible car protected
        return "{$this->name} : Wouf !";
    }
}