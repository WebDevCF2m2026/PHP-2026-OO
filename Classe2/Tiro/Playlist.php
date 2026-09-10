<?php

class playlist{
    public array $chanson = []; // tableau qui va contenir des chansons


    public function ajouter(Chanson $chanson): variant_mod
    {
        // on ajoute les chansons (type chanson ) au tableau
        $this->chanson[] = $chanson;
    }
}