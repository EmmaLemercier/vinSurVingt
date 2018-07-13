<?php

namespace App\Repository;

use App\Entity\Bouteille;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Bouteille|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bouteille|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bouteille[]    findAll()
 * @method Bouteille[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BouteilleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Bouteille::class);
    }

//    /**
//     * @return Bouteille[] Returns an array of Bouteille objects
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
    public function findOneBySomeField($value): ?Bouteille
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    
    public function getBouteillesForAdmin($appellationBouteille, $teinte, $millesime)
    {
        $query =  $this->createQueryBuilder('bouteille');
            
        if(!NULL == $appellationBouteille)
        {
            $query->andWhere('bouteille.appellationBouteille LIKE :appellationBouteille')
                  ->setParameter('appellationBouteille' , '%'.$appellationBouteille.'%');
        }
        
        if(!NULL == $teinte)
        {
            $query->andWhere('bouteille.teinte = :teinte')
                  ->setParameter('teinte' , $teinte);
        }    
            
        if(!NULL == $millesime)
        {
            $query->andWhere('bouteille.millesime = :millesime')
                  ->setParameter('millesime' , $millesime);
        }    
        return $query->getQuery()->getResult();
    }
}
