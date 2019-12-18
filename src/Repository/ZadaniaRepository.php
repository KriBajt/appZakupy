<?php

namespace App\Repository;

use App\Entity\Zadania;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Zadania|null find($id, $lockMode = null, $lockVersion = null)
 * @method Zadania|null findOneBy(array $criteria, array $orderBy = null)
 * @method Zadania[]    findAll()
 * @method Zadania[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ZadaniaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Zadania::class);
    }

    // /**
    //  * @return Zadania[] Returns an array of Zadania objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('z')
            ->andWhere('z.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('z.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Zadania
    {
        return $this->createQueryBuilder('z')
            ->andWhere('z.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
