<?php

namespace App\Repository;

use App\Entity\BouteilleCepage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BouteilleCepage|null find($id, $lockMode = null, $lockVersion = null)
 * @method BouteilleCepage|null findOneBy(array $criteria, array $orderBy = null)
 * @method BouteilleCepage[]    findAll()
 * @method BouteilleCepage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BouteilleCepageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BouteilleCepage::class);
    }

//    /**
//     * @return BouteilleCepage[] Returns an array of BouteilleCepage objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BouteilleCepage
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
