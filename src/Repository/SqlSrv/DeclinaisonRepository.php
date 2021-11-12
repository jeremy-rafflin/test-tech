<?php

namespace App\Repository\SqlSrv;

use App\Entity\SqlSrv\Declinaison;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Declinaison|null find($id, $lockMode = null, $lockVersion = null)
 * @method Declinaison|null findOneBy(array $criteria, array $orderBy = null)
 * @method Declinaison[]    findAll()
 * @method Declinaison[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeclinaisonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Declinaison::class);
    }
}
