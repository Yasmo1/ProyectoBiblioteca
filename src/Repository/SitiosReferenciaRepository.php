<?php

namespace App\Repository;

use App\Entity\SitiosReferencia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SitiosReferencia|null find($id, $lockMode = null, $lockVersion = null)
 * @method SitiosReferencia|null findOneBy(array $criteria, array $orderBy = null)
 * @method SitiosReferencia[]    findAll()
 * @method SitiosReferencia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SitiosReferenciaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SitiosReferencia::class);
    }

//    /**
//     * @return SitiosReferencia[] Returns an array of SitiosReferencia objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SitiosReferencia
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
