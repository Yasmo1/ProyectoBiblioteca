<?php

namespace App\Repository;

use App\Entity\Resultados;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Resultados|null find($id, $lockMode = null, $lockVersion = null)
 * @method Resultados|null findOneBy(array $criteria, array $orderBy = null)
 * @method Resultados[]    findAll()
 * @method Resultados[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResultadosRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Resultados::class);
    }

//    /**
//     * @return Resultados[] Returns an array of Resultados objects
//     */

    public function findByanno($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.anno = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(100)
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?Resultados
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
