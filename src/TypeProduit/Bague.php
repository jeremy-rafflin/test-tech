<?php

namespace App\TypeProduit;

class Bague
{
    /** @var string */
    protected $nom;

    /** @var string */
    protected $taille;

    /** @var float */
    protected $prix;


    public function __construct(string $nom, string $taille, float $prix)
    {
        $this->nom = $nom;
        $this->taille = $taille;
        $this->prix = $prix;
    }

    public function nom():string {
        return $this->nom;
    }

    public function taille():float {
        return $this->taille;
    }

    public function couleur():string {
        return $this->couleur;
    }
}
