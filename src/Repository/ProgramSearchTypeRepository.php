<?php

namespace App\Repository;

use App\Entity\ProgramSearchType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ProgramSearchType|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProgramSearchType|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProgramSearchType[]    findAll()
 * @method ProgramSearchType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProgramSearchTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProgramSearchType::class);
    }

    // /**
    //  * @return ProgramSearchType[] Returns an array of ProgramSearchType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProgramSearchType
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
