<?php

namespace App\Repository;

use App\Entity\Instansi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Instansi|null find($id, $lockMode = null, $lockVersion = null)
 * @method Instansi|null findOneBy(array $criteria, array $orderBy = null)
 * @method Instansi[]    findAll()
 * @method Instansi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InstansiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Instansi::class);
    }

    // /**
    //  * @return Instansi[] Returns an array of Instansi objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Instansi
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
