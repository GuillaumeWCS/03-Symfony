<?php

namespace App\Repository;

use App\Entity\WildController;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method WildController|null find($id, $lockMode = null, $lockVersion = null)
 * @method WildController|null findOneBy(array $criteria, array $orderBy = null)
 * @method WildController[]    findAll()
 * @method WildController[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WildControllerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WildController::class);
    }

    // /**
    //  * @return WildController[] Returns an array of WildController objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WildController
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
