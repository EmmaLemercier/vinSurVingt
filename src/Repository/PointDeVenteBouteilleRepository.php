<?php

namespace App\Repository;

use App\Entity\PointDeVenteBouteille;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PointDeVenteBouteille|null find($id, $lockMode = null, $lockVersion = null)
 * @method PointDeVenteBouteille|null findOneBy(array $criteria, array $orderBy = null)
 * @method PointDeVenteBouteille[]    findAll()
 * @method PointDeVenteBouteille[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PointDeVenteBouteilleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PointDeVenteBouteille::class);
    }

//    /**
//     * @return PointDeVenteBouteille[] Returns an array of PointDeVenteBouteille objects
//     */
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
    public function findOneBySomeField($value): ?PointDeVenteBouteille
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
