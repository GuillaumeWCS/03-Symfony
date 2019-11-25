<?php

namespace App\Repository;

use App\Entity\ShowByCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ShowByCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShowByCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShowByCategory[]    findAll()
 * @method ShowByCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShowByCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ShowByCategory::class);
    }

    // /**
    //  * @return ShowByCategory[] Returns an array of ShowByCategory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ShowByCategory
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
