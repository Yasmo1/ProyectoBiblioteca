<?php

namespace App\Repository;

use App\Entity\Vguiada;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Vguiada|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vguiada|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vguiada[]    findAll()
 * @method Vguiada[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VguiadaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Vguiada::class);
    }

//    /**
//     * @return Vguiada[] Returns an array of Vguiada objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vguiada
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
