<?php

namespace App\Repository;

use App\Entity\Responden;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Responden|null find($id, $lockMode = null, $lockVersion = null)
 * @method Responden|null findOneBy(array $criteria, array $orderBy = null)
 * @method Responden[]    findAll()
 * @method Responden[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RespondenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Responden::class);
    }

    // /**
    //  * @return Responden[] Returns an array of Responden objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Responden
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
