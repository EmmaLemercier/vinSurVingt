<?php

namespace App\Repository;

use App\Entity\BouteilleMets;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BouteilleMets|null find($id, $lockMode = null, $lockVersion = null)
 * @method BouteilleMets|null findOneBy(array $criteria, array $orderBy = null)
 * @method BouteilleMets[]    findAll()
 * @method BouteilleMets[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BouteilleMetsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BouteilleMets::class);
    }

//    /**
//     * @return BouteilleMets[] Returns an array of BouteilleMets objects
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
    public function findOneBySomeField($value): ?BouteilleMets
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
