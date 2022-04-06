<?php

namespace App\Repository;

use App\Entity\Signaller;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Signaller|null find($id, $lockMode = null, $lockVersion = null)
 * @method Signaller|null findOneBy(array $criteria, array $orderBy = null)
 * @method Signaller[]    findAll()
 * @method Signaller[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SignallerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Signaller::class);
    }

    // /**
    //  * @return Signaller[] Returns an array of Signaller objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Signaller
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
