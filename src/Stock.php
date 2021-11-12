<?php

namespace App;

class Stock
{
    /** @var array */
    protected $produits = [];

    public function __construct(array $produits)
    {
        $this->produits = $produits;
    }

    public function produits() : array
    {
        return $this->produits;
    }
}
