<?php

namespace App\TypeProduit;

class TShirt
{
    /** @var string */
    protected $nom;

    /** @var string */
    protected $couleur;

    /** @var string */
    protected $taille;

    /** @var float */
    protected $prix;


    public function __construct(string $nom, string $couleur, string $taille, float $prix)
    {
        $this->nom = $nom;
        $this->couleur = $couleur;
        $this->taille = $taille;
        $this->prix = $prix;
    }

    public function nom():string {
        return $this->nom;
    }

    public function prix():float {
        return $this->prix;
    }

    public function taille():float {
        return $this->taille;
    }

    public function couleur():string {
        return $this->couleur;
    }
}
