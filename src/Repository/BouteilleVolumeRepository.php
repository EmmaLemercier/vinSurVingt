<?php

namespace App\Repository;

use App\Entity\BouteilleVolume;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BouteilleVolume|null find($id, $lockMode = null, $lockVersion = null)
 * @method BouteilleVolume|null findOneBy(array $criteria, array $orderBy = null)
 * @method BouteilleVolume[]    findAll()
 * @method BouteilleVolume[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BouteilleVolumeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BouteilleVolume::class);
    }

//    /**
//     * @return BouteilleVolume[] Returns an array of BouteilleVolume objects
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
    public function findOneBySomeField($value): ?BouteilleVolume
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
