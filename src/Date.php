<?php
namespace App;

use InvalidArgumentException;

class Date implements DateInterface
{
    // TODO : gérer les années bissextile
    private $jourParMois = ['01' => 31, "02" => 28, '03' => 31, '04' => 30, '05' => 31, '06' => 30, '07' => 31, '08' => 31,
    '09' => 30, '10' => 31, '11' => 30, '12' => 31];

    private $annee;
    private $mois;
    private $jour;

    public function __construct(string $annee, string $mois, string $jour)
    {
        if (false == array_key_exists($mois, $this->jourParMois)) {
            throw new InvalidArgumentException('Le mois doit être compris entre 01 et 12. Sur deux caractères');
        }
        if ($this->jourParMois[$mois] < $jour) {
            throw new InvalidArgumentException('Le mois ' . $mois .' comprend ' . $this->jourParMois[$mois] . ' jours. ' .$jour . ' n\'est pas valide');
        }
        $this->annee = $annee;
        $this->mois = $mois;
        $this->jour = $jour;
    }

    public function formatFrancais(): string {
        return $this->jour . '/' . $this->mois . '/' . $this->annee;
    }

    public function formatAmericain(): string {
        return $this->annee . '-' . $this->mois . '-' . $this->jour;
    }

    public function __toString(): string
    {
        return $this->formatAmericain();
    }

    function getAnnee() :string  {
        return $this->annee;
    }

    function setAnnee(string $annee) {
        $this->annee = $annee;
    }

    function getMois(): string  {
            return $this->mois;
    }

    function setMois(string $mois)  {
        $this->mois = $mois;
    }

    function getJour(): string  {
        return $this->jour;
    }

    function setJour(string $jour) {
        $this->jour = $jour;
    }
}
