<?php

namespace App\Repository;

use App\Entity\Jawaban;
use App\Entity\Pertanyaan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\AST\Join;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Jawaban|null find($id, $lockMode = null, $lockVersion = null)
 * @method Jawaban|null findOneBy(array $criteria, array $orderBy = null)
 * @method Jawaban[]    findAll()
 * @method Jawaban[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JawabanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Jawaban::class);
    }

    // /**
    //  * @return Jawaban[] Returns an array of Jawaban objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Jawaban
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
//
//    public function getIKM(){
//        $queryBuilder = $this->createQueryBuilder('r');
//        return $queryBuilder->select('')
//    }

    public function getIKMperQuestion()
    {
        $queryBuilder = $this->createQueryBuilder('r');
        return $queryBuilder->select('p.deskripsi as desc, ROUND(SUM(r.jawaban)/COUNT(r.pertanyaan),1) as value')
            ->join('r.pertanyaan', 'p')
            ->groupBy('r.pertanyaan')
            ->getQuery()
            ->getResult();
    }
}
