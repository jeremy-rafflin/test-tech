<?php

namespace App\TypeProduit;

use App\Entity\SqlSrv\Declinaison;
use App\Entity\SqlSrv\Produit;
use App\Repository\SqlSrv\DeclinaisonRepository;
use App\Repository\SqlSrv\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;

class TShirtRepository
{
    /** @var EntityManagerInterface */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function rechercheTShirt($id) {
        $query = $this->em->createQueryBuilder()
            ->select('produit')
            ->from(Produit::class, 'produit')
            ->where("produit.id = :id ");

        $result = $query->getQuery()->setParameter('id', $id)->getResult();

        $query2 = $this->em->createQueryBuilder()
            ->select('declinaison')
            ->from(Declinaison::class, 'declinaison')
            ->join("declinaison.produits", "produit")
            ->where("produits = :id ");

        $result2 = $query2->getQuery()->setParameter('id', $result['id'])->getResult();

        return new TShirt($result['nom'], $result2['couleur'], $result2['taille'], $result['prix']);
    }






    public function persist($tShirt): void {
        // produit
        $produitRepository = $this->em->getRepository(Produit::class);
        $p = $produitRepository->findBy(['nom' => $tShirt->nom()]);
        if (null === $p) {
            $pAP = new Produit();
        } else {
            $pAP = $p;
        }
        $pAP->setPrix($tShirt->prix());
        $pAP->setType('tshirt');

        // declinaison
        $declinaisonRepository = $this->em->getRepository(Declinaison::class);
        $d = $declinaisonRepository->findBy(['taille' => $tShirt->taille(), 'couleur' => $tShirt->couleur(),]);
        if (null === $d) {
            $dAP = new Declinaison();
            $dAP->setCouleur($tShirt->couleur());
            $dAP->setTaille($tShirt->taille());
        } else {
            $dAP = $d;
        }
        $dAP->addProduit($pAP);
        $pAP->addDeclinaison($dAP);

        $this->em->persist($dAP);
        $this->em->persist($pAP);
        $this->em->flush();
    }
}
