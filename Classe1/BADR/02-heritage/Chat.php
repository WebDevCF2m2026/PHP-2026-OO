<?php
class Chat extends Animal
{
    public function crier(): string
    {
        return $this->nom . ' fait : Miaou !';
    }

    // redéfinition : on complète la version du parent avec parent::
    #[\Override]
    public function manger(): string
    {
        return parent::manger() . ' Puis il fait sa toilette.';
    }
}
