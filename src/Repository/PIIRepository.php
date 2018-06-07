<?php

namespace App\Repository;

use App\Entity\PII;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PII|null find($id, $lockMode = null, $lockVersion = null)
 * @method PII|null findOneBy(array $criteria, array $orderBy = null)
 * @method PII[]    findAll()
 * @method PII[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PIIRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PII::class);
    }

//    /**
//     * @return PII[] Returns an array of PII objects
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
    public function findOneBySomeField($value): ?PII
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
