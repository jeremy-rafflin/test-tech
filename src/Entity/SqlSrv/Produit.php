<?php

namespace App\Entity\SqlSrv;

use App\Repository\SqlSrv\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\ManyToMany(targetEntity=declinaison::class, inversedBy="produits")
     */
    private $declinaisons;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $type;

    public function __construct()
    {
        $this->declinaisons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * @return Collection|declinaison[]
     */
    public function getDeclinaisons(): Collection
    {
        return $this->declinaisons;
    }

    public function addDeclinaison(declinaison $declinaison): self
    {
        if (!$this->declinaisons->contains($declinaison)) {
            $this->declinaisons[] = $declinaison;
        }

        return $this;
    }

    public function removeDeclinaison(declinaison $declinaison): self
    {
        $this->declinaisons->removeElement($declinaison);

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
