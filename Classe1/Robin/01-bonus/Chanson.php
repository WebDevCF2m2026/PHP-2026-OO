<?php
class Chanson
{
    public function __construct(

        public string $titre,
        public string $artiste,
        public int $duree,
    ){
        
    }

}